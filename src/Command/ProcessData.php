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

        // Get all vehicles from camera (Violation)
        $vehicles = $this->em->getRepository(Violation::class)->findAllInDateRange($duration[0],$duration[1]);

        //Get unpaid pending transactions
        $pendingTransactions= $this->em->getRepository(HighwayVehicle::class)->findAllInDateRange($duration[0],$duration[1],0);

        //remove unregistered vehicles after setting their violation no to 1
        $vehicles = array_values($this->unregisteredVehicles($vehicles));

        //remove unpaid vehicles after setting their violation no to 2
        $vehicles = array_values($this->unpaidVehicles($vehicles,$pendingTransactions));

        // remove vehicles that have not exited properly by app setting their violation type to 3
        $vehicles = array_values($this->unExitVehicles($vehicles,$duration));

        // The vehicles that are left neither entered nor exited properly but are registered on the system
        foreach ($vehicles as $vehicle){
            /**
             * @var Vehicle $veh
             */
            $veh  = $this->em->getRepository(Vehicle::class)->findByVehicleNo($vehicle->getVehicleNo())[0];
            $user = $veh->getUser()[0];
            $vehicle->setUser($user);
            $vehicle->setViolationType(4);
            $this->em->flush();
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
        return $vehicles;
    }

    public function unpaidVehicles($vehicles,$pendingTransactions){
        $no = sizeof($vehicles);

        if(sizeof($pendingTransactions)!=0){
            for($j=0;$j<$no;$j++){
                for($k=0;$k<sizeof($pendingTransactions);$k++){
                    if($vehicles[$j]->getVehicleNo() == $pendingTransactions[$k]->getVehicle()->getVehicleNo()){
                        $vehicles[$j]->setDate($pendingTransactions[$k]->getExitTime());
                        $vehicles[$j]->setViolationType(2);
                        $vehicles[$j]->setToll($pendingTransactions[$k]->getToll());
                        $vehicles[$j]->setUser($this->em->getRepository(User::class)->find($pendingTransactions[$k]->getDrivedBy()));
                        $this->em->flush();
                        unset($vehicles[$j]);
                        break;
                        $k++;
                    }
                }
            }
        }
        return $vehicles;
    }

    public function unExitVehicles($vehicles,$duration){
        $api = new ApiController();
        $pendingTransactions = $this->em->getRepository(HighwayVehicle::class)->findByIsCurrentlyIn(1);

        $total = sizeof($vehicles);
        for($i=0;$i<$total;$i++){

            foreach ($pendingTransactions as $pendingTransaction){
                /**
                 * @var HighwayVehicle $pendingTransaction
                 */
                if($vehicles[$i]->getVehicleNo() == $pendingTransaction->getVehicle()->getVehicleNo()){
                    $user = $pendingTransaction->getUser();
                    $pendingTransaction->setExitTime($vehicles[$i]->getDate());
                    $pendingTransaction->setEgress($vehicles[$i]->getInterchange());
                    $pendingTransaction->setIsCurrentlyIn(0);
                    $pendingTransaction->setDrivedBy($user->getId());
                    $toll = $api->calculateToll($pendingTransaction);
                    $pendingTransaction->setToll($toll);
                    $user->setPendingTransaction(1);
                    $user->setRevisionNo($user->getRevisionNo()+1);
                    $vehicles[$i]->setViolationType(3);
                    $vehicles[$i]->setToll($toll);
                    $vehicles[$i]->setUser($user);
                    $pendingTransaction->setUser(null);
                    $this->em->flush();
                    unset($vehicles[$i]);
                    break;
                }
            }
        }

        return $vehicles;
    }
}