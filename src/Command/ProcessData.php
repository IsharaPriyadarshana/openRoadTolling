<?php



namespace App\Command;
use App\Controller\ApiController;
use App\Entity\HighwayVehicle;
use App\Entity\TransactionHistory;
use App\Entity\User;
use App\Entity\Vehicle;
use App\Entity\Violation;
use Symfony\Component\Console\Command\Command;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use \DateTime;
use \DateTimeZone;


class ProcessData extends Command
{
    // the name of the command (the part after "bin/console")
    protected static $defaultName = 'app:process-data';

    private $em;

    public function __construct(EntityManagerInterface $em)
    {
        parent::__construct();
        $this->em = $em;
    }

    protected function configure()
    {
        $this
            // the short description shown while running "php bin/console list"
            ->setDescription('Process Camera Data to Obtain Misuses or Violations ')

            // the full command description shown when running the command with
            // the "--help" option
            ->setHelp('No additional arguments required...')
            ->addArgument('from',InputArgument::OPTIONAL,"Start Time of Duration")
            ->addArgument('to',InputArgument::OPTIONAL,"End Time of Duration")
        ;
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $from = $input->getArgument('from');
        $to = $input->getArgument('to');
        if(($from)and($to)){
            $duration[0] = $from;
            $duration[1] = $to;
        }else{
            $dateNow = new DateTime("now", new DateTimeZone('Asia/Colombo') );
            $to = $dateNow->format('Y-m-d H:i:s');
            $dateNow->modify('-1 day');
            $from =  $dateNow->format('Y-m-d H:i:s');
            $duration[0]= $from;
            $duration[1]=$to;
        }

       $vehicles = $this->em->getRepository(Violation::class)->findAllInDateRange($duration[0],$duration[1]);
        $pendingTransactions= $this->em->getRepository(HighwayVehicle::class)->findAllInDateRange($duration[0],$duration[1]);
        $vehicles = array_values($this->unregisteredVehicles($vehicles)[1]);

        $k=0;
      if(sizeof($pendingTransactions)!=0){
          for($j=0;$j<sizeof($vehicles);$j++){
              if($vehicles[$j]->getVehicleNo() == $pendingTransactions[$k]->getVehicle()->getVehicleNo()){
                  $vehicles[$j]->setDate($pendingTransactions[$k]->getExitTime());
                  $vehicles[$j]->setViolationType(2);
                  $vehicles[$j]->setToll($pendingTransactions[$k]->getToll());
                  $vehicles[$j]->setUser($this->em->getRepository(User::class)->find($pendingTransactions[$k]->getDrivedBy()));
                  $this->em->flush();
                  unset($vehicles[$j]);
                  $k++;
              }
          }
      }

      $vehicles = array_values($vehicles);
      $api = new ApiController();
      for ($x=0;$x<sizeof($vehicles);$x++){
          $vehicleObj = $this->em->getRepository(Vehicle::class)->findByVehicleNo($vehicles[$x]->getVehicleNo())[0];
          $user =  $vehicleObj->getUser()[0];
          $vehicles[$x]->setUser($user);
          $inHW = $this->em->getRepository(HighwayVehicle::class);
          if($inHW->findByVehicle($vehicleObj)){
              /**
               * @var HighwayVehicle $hWVehicle
               */
              $hWVehicle = $inHW->findByVehicle($vehicleObj)[0];
              $hWVehicle->setExitTime($vehicles[$x]->getDate());
              $hWVehicle->setEgress($vehicles[$x]->getInterchange());
              $hWVehicle->setIsCurrentlyIn(0);
              $hWVehicle->setDrivedBy($vehicles[$x]->getUser()->getId());
              $hWVehicle->setUser(null);
              $toll = $api->calculateToll($hWVehicle);
              $hWVehicle->setToll($toll);
              $user->setPendingTransaction(1);
              $vehicles[$x]->setViolationType(3);
              $vehicles[$x]->setToll($toll);
              $this->em->flush();
              unset($vehicles[$x]);
          }

          $vehicles= array_values($vehicles);
          foreach ($vehicles as $vehicle){
              $vehicle->setViolationType(4);
              $this->em->flush();
          }

      }

    }

    public function unregisteredVehicles( $vehicles){

        $unregistered = array();
        $vehicleDirectory = $this->em->getRepository(Vehicle::class);
        $arrVehicles=$vehicles;
        for ($i=0;$i<sizeof($arrVehicles);$i++){
            if(sizeof($vehicleDirectory->findByVehicleNo($arrVehicles[$i]->getVehicleNo())) ==0){
                $vehicles[$i]->setViolationType(1);
                $this->em->flush();
                unset($vehicles[$i]);
            }
        }
        unset($arrVehicles);
        return array($unregistered,$vehicles);
    }
}