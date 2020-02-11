<?php

namespace App\Controller;
use App\Entity\AccessPoint;
use App\Entity\Highway;
use App\Entity\HighwayExtension;
use App\Entity\HighwayVehicle;
use App\Entity\Power;
use App\Entity\Serial;
use App\Entity\Transaction;
use App\Entity\TransactionHistory;
use App\Entity\User;
use App\Entity\Vehicle;
use App\Entity\Violation;
use App\Repository\AccessPointRepository;
use App\Repository\HighwayExtensionRepository;
use App\Repository\HighwayVehicleRepository;
use App\Repository\PowerRepository;
use App\Repository\TransactionHistoryRepository;
use App\Repository\TransactionRepository;
use App\Repository\UserRepository;
use App\Repository\VehicleClassRepository;
use App\Repository\VehicleRepository;
use FOS\RestBundle\Controller\AbstractFOSRestController;
use Symfony\Component\HttpFoundation\File\File;
use Symfony\Component\HttpFoundation\Request;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use FOS\RestBundle\Controller\Annotations as FOSRest;
use App\Entity\Article;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Response as RES;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;
use \Datetime;
use \DateTimeZone;


/**
 * Brand controller.
 *
 * @Route("/api")
 */
class ApiController extends AbstractFOSRestController
{

    /**
     * Test
     * @FOSRest\Post("/get_user")
     * @FOSRest\View()
     */
    public function postGetUserAction(Request $request, UserRepository $userRepository, UserPasswordEncoderInterface $passwordEncoder)
    {
        $user = $userRepository->findBy(['email' => $request->get('email')]);

        if (count($user)){
            $user = $user[0];
            if($passwordEncoder->isPasswordValid($user,$request->get('password'))){
                $message = $this->jsonEncodeUser($user);
                return new RES($message,RES::HTTP_OK);
            } else {
                $message = "Invalid Credentials!";
                return new RES($message,RES::HTTP_FORBIDDEN);
            }

        }else {
            return new RES("User Not Found",RES::HTTP_NOT_FOUND);
        }

    }


    /**
     * @FOSRest\Post("/update_user")
     * @FOSRest\View()
     * @param Request $request
     * @param UserRepository $userRepository
     * @param UserPasswordEncoderInterface $passwordEncoder
     * @return RES
     */
    public function postUpdateUserAction(Request $request, UserRepository $userRepository, UserPasswordEncoderInterface $passwordEncoder)
    {
        $user = $userRepository->findBy(['email' => $request->get('email')]);

        if (count($user)){
            $user = $user[0];
            if($passwordEncoder->isPasswordValid($user,$request->get('password'))){
                if($request->get('revisionNo') != $user->getRevisionNo()){
                    $message = $this->jsonEncodeUser($user);
                    return new RES($message,RES::HTTP_OK);
                }else{
                    if ($user->getAccount() !=""){
                        $message = json_encode(["balance" => $user->getAccount()->getBalance()]);
                    }else{
                        $message = json_encode(["balance" => '0']);
                    }
                    return new RES($message,RES::HTTP_ACCEPTED);
                }


            } else {
                $message = "Invalid Credentials!";
                return new RES($message,RES::HTTP_FORBIDDEN);
            }


        }else {
            return new RES("User Not Found",RES::HTTP_NOT_FOUND);
        }

    }


    /**
     * @FOSRest\Post("/push_highway_vehicle")
     * @FOSRest\View()
     * @param Request $request
     * @param UserRepository $userRepository
     * @param UserPasswordEncoderInterface $passwordEncoder
     * @param VehicleRepository $vehicleRepository
     * @param HighwayVehicleRepository $highwayVehicleRepository
     * @return RES
     */
    public function postPushHighwayVehicle(Request $request, UserRepository $userRepository, UserPasswordEncoderInterface $passwordEncoder, VehicleRepository $vehicleRepository, HighwayVehicleRepository $highwayVehicleRepository)
    {

        $user = $userRepository->findBy(['email' => $request->get('email')]);

        if (count($user)){
            $user = $user[0];
            if($passwordEncoder->isPasswordValid($user,$request->get('password'))){
                $macAddress = $request->get('macAddress');
                $gps = $request->get('gps');
                $ssid = $request->get('ssid');
              if($this->verifyInterchange($macAddress,$ssid,$gps)){
                  $em = $this->getDoctrine()->getManager();
                  $conn =$em->getConnection();
                  $timeStamp = DateTime::createFromFormat('Y-m-d H:i:s',$this->convertTime($request->get('time')));
                  $vehicleNo = $request->get('vehicleNo');
                  $vehicle = $vehicleRepository->findByVehicleNo($vehicleNo)[0];
                  $isIn = $highwayVehicleRepository->findByVehicle($vehicle);
                  if(sizeof($isIn)==0){
                      $highwayVehicle = new HighwayVehicle();
                      $highwayVehicle->setUser($user);
                      $highwayVehicle->setVehicle($vehicle);
                      $highwayVehicle->setEntrance($this->getExtension($macAddress));
                      $highwayVehicle->setEnterTime($timeStamp);
                      $highwayVehicle->setIsCurrentlyIn(1);
                      $em->persist($highwayVehicle);
                      $em->flush();
                      $message = json_encode(["entrance" =>$this->getExtension($macAddress)->getName()]);
                  }else{
                      /**
                       * @var HighwayVehicle $isIn
                       */
                      $vehicleIn = false;
                      foreach ($isIn as $hwv){
                          if($hwv->getIsCurrentlyIn() == '1'){
                              $vehicleIn = true;
                              break;
                          }
                      }
                      if(!$vehicleIn){
                          $highwayVehicle = new HighwayVehicle();
                          $highwayVehicle->setUser($user);
                          $highwayVehicle->setVehicle($vehicle);
                          $highwayVehicle->setEntrance($this->getExtension($macAddress));
                          $highwayVehicle->setEnterTime($timeStamp);
                          $highwayVehicle->setIsCurrentlyIn(1);
                          $em->persist($highwayVehicle);
                          $em->flush();
                          $message = json_encode(["entrance" =>$this->getExtension($macAddress)->getName()]);
                      }else{
                          $highwayVehicle = $highwayVehicleRepository->findByUser($user)[0];
                          $highwayVehicle->setEgress($this->getExtension($macAddress));
                          $highwayVehicle->setExitTime($timeStamp);
                          $highwayVehicle->setDrivedBy($user->getId());
                          $highwayVehicle->setIsCurrentlyIn(0);
                          $highwayVehicle->setUser(null);
                          $highwayVehicle->setToll($this->calculateToll($highwayVehicle));
                          $em->flush();
                          $message = json_encode(["exit"=>$this->getExtension($macAddress)->getName(),"toll"=>sprintf("%.3f", $highwayVehicle->getToll()) ]);
                          $this->deductToll($highwayVehicle);
                      }
                  }


                  return new RES($message,RES::HTTP_OK);
              }else{
                  $message = "Invalid Interchange!";
                  return new RES($message,RES::HTTP_FORBIDDEN);
              }

            } else {
                $message = "Invalid Credentials!";
                return new RES($message,RES::HTTP_FORBIDDEN);
            }

        }else {
            return new RES("User Not Found",RES::HTTP_NOT_FOUND);
        }
    }

    /**
     * @FOSRest\Post("/get_mac_addresses")
     * @FOSRest\View()
     * @param Request $request
     * @param UserRepository $userRepository
     * @param UserPasswordEncoderInterface $passwordEncoder
     * @param HighwayExtensionRepository $highwayExtensionRepository
     * @return RES
     */
    public function getMacAddresses(Request $request, UserRepository $userRepository, UserPasswordEncoderInterface $passwordEncoder, HighwayExtensionRepository $highwayExtensionRepository){
        $user = $userRepository->findBy(['email' => $request->get('email')]);
        if (count($user)){
            $user = $user[0];
            if($passwordEncoder->isPasswordValid($user,$request->get('password'))){
                $extensions =$highwayExtensionRepository->findAll();
                $macAddresses = array();
                foreach ($extensions as $extension){
                    foreach ($extension->getAccessPoint() as $ap){
                        $macAddresses[] = $ap->getMacAddress();
                    }
                }
                $message = json_encode(["macAddresses"=>$macAddresses]);
                return new RES($message,RES::HTTP_OK);

            } else {
                $message = "Invalid Credentials!";
                return new RES($message,RES::HTTP_FORBIDDEN);
            }

        }else {
            return new RES("User Not Found",RES::HTTP_NOT_FOUND);
        }
    }


    /**
     * Test
     * @FOSRest\Post("/register_vehicle")
     * @FOSRest\View()
     * @param Request $request
     * @param UserRepository $userRepository
     * @param UserPasswordEncoderInterface $passwordEncoder
     * @param VehicleClassRepository $vehicleClassRepository
     * @param VehicleRepository $vehicleRepository
     * @return RES
     */
    public function postRegisterVehicle(Request $request, UserRepository $userRepository, UserPasswordEncoderInterface $passwordEncoder,VehicleClassRepository $vehicleClassRepository, VehicleRepository $vehicleRepository)
    {
        $user = $userRepository->findBy(['email' => $request->get('email')]);

        if (count($user)){
            $user = $user[0];
            if($passwordEncoder->isPasswordValid($user,$request->get('password'))){
                $em = $this->getDoctrine()->getManager();
                $conn =$em->getConnection();
                $class = $vehicleClassRepository->findByClassName($request->get('className'))[0];
                $vehicleNo = $request->get('vehicleNo');
                $vehicle = $vehicleRepository->findByVehicleNo($vehicleNo);

                if(sizeof($vehicle)==0){
                    $vehicle = new Vehicle();
                    $vehicle->setClass($class);
                    $vehicle->setVehicleNo($vehicleNo);
                    $vehicle->addUser($user);
                    $em->persist($vehicle);
                    $user->setRevisionNo($user->getRevisionNo() +1);
                    $em->flush();
                }else{
                    $vehicle= $vehicle[0];
                    $vehicle->addUser($user);
                    $user->setRevisionNo($user->getRevisionNo() +1);
                    $em->flush();
                }




                return new RES(json_encode(["message"=>"Vehicle Added!"]),RES::HTTP_OK);

            } else {
                $message = "Invalid Credentials!";
            }

            return new RES($message,RES::HTTP_FOUND);
        }else {
            return new RES("User Not Found",RES::HTTP_NOT_FOUND);
        }

    }

    /**
     * Test
     * @FOSRest\Post("/get_vehicle_classes")
     * @FOSRest\View()
     * @param Request $request
     * @param UserRepository $userRepository
     * @param UserPasswordEncoderInterface $passwordEncoder
     * @param VehicleClassRepository $vehicleClassRepository
     * @return RES
     */
    public function postGetVehicleClasses(Request $request, UserRepository $userRepository, UserPasswordEncoderInterface $passwordEncoder, VehicleClassRepository $vehicleClassRepository)
    {
        $user = $userRepository->findBy(['email' => $request->get('email')]);

        if (count($user)){
            $user = $user[0];
            if($passwordEncoder->isPasswordValid($user,$request->get('password'))){

                $vehicleClasses = $vehicleClassRepository->findAll();
                $classNames = array();
                foreach ($vehicleClasses as $vehicleClass){
                    $classNames[] = $vehicleClass->getClassName();
                }
                return new RES(json_encode(["vehicleClasses"=>$classNames]),RES::HTTP_OK);
            } else {
                $message = "Invalid Credentials!";
            }

            return new RES($message,RES::HTTP_FOUND);
        }else {
            return new RES("User Not Found",RES::HTTP_NOT_FOUND);
        }

    }


    /**
     * Test
     * @FOSRest\Post("/update_ssid")
     * @FOSRest\View()
     * @param Request $request
     * @param HighwayExtensionRepository $highwayExtensionRepository
     * @param AccessPointRepository $accessPointRepository
     * @return RES
     */
    public function postUpdateSSID(Request $request,  HighwayExtensionRepository $highwayExtensionRepository, AccessPointRepository $accessPointRepository)
    {
        /**
         * @var HighwayExtension $extension
         */
        $extension = $highwayExtensionRepository->findByCodeName($request->get('codeName'))[0];
        /**
         * @var AccessPoint $accessPoint
         */
        $accessPoint = $accessPointRepository->findByName($request->get('name'))[0];


        if ($extension->getAccessKey() == $request->get('accessKey')){
            $message = json_encode(["ssid"=>$this->sssidGenerator($extension->getCodeName(), $accessPoint->getName())]);
            return new RES($message,RES::HTTP_OK);


        } else {
            $message = "Invalid AccessKey!";
            return new RES($message,RES::HTTP_NOT_FOUND);

        }

    }


    /**
     * Test
     * @FOSRest\Get("/power_info")
     * @FOSRest\View()
     * @param PowerRepository $powerRepository
     * @return RES
     */
    public function getPowerInfo(PowerRepository $powerRepository)
    {

        $powers = $powerRepository->findAll();
        $message = array();

        foreach ($powers as $power){
            $dateNow = new DateTime("now", new DateTimeZone('Asia/Colombo') );
            $interval = date_diff(DateTime::createFromFormat('Y-m-d H:i:s',$dateNow->format('Y-m-d H:i:s')), $power->getDate());
            $hrs = $interval->format('%h') + ($interval->days * 24);
            $mins = $interval->format('%i');
            $sec = $interval->format('%s');

            $pw = array();
            $pw['highway']= $power->getInterchange()->getHighway()->getName();
            $pw['interchange']= $power->getInterchange()->getName();
            $pw['apName'] = $power->getName();
            $pw['time'] = $hrs.':'.$mins.':'.$sec;
            $message[] = $pw;
        }

        $reports = json_encode(["power" =>$message]);


            return new RES($reports,RES::HTTP_OK);

        }


    /**
     * Test
     * @FOSRest\Post("/power")
     * @FOSRest\View()
     * @param Request $request
     * @param HighwayExtensionRepository $highwayExtensionRepository
     * @param AccessPointRepository $accessPointRepository
     * @param PowerRepository $powerRepository
     * @return RES
     * @throws \Exception
     */
    public function postPower(Request $request,  HighwayExtensionRepository $highwayExtensionRepository, AccessPointRepository $accessPointRepository, PowerRepository $powerRepository)
    {
        /**
         * @var HighwayExtension $extension
         */
        $extension = $highwayExtensionRepository->findByCodeName($request->get('codeName'))[0];

        $apName = $request->get('name');
        foreach ($extension->getAccessPoint() as $ap){
            if($ap->getName() == $apName){
                $accessPoint = $ap;
            }
        }


        if ($extension->getAccessKey() == $request->get('accessKey')){
            $status = $request->get('status');
            $em = $this->getDoctrine()->getManager();
            if($status=='0'){
                $dateNow = new DateTime("now", new DateTimeZone('Asia/Colombo') );
                $power = new Power();
                $power->setInterchange($extension);
                $power->setAccessPoint($accessPoint);
                $power->setName($accessPoint->getName());
                $power->setDate(DateTime::createFromFormat('Y-m-d H:i:s',$dateNow->format('Y-m-d H:i:s')));
                $em->persist($power);
                $em->flush();
            }else{
                $powers = $powerRepository->findByInterchange($extension);
                foreach ($powers as $pw){
                    if($pw->getName() == $apName){
                        $power = $pw;
                    }
                    $em->remove($power);
                    $em->flush();
                }
            }

            $message = "OK";
            return new RES($message,RES::HTTP_OK);


        } else {
            $message = "Invalid AccessKey!";
            return new RES($message,RES::HTTP_NOT_FOUND);

        }

    }



    /**
     * Testp
     * @FOSRest\Post("/update_ssid_ack")
     * @FOSRest\View()
     * @param Request $request
     * @param HighwayExtensionRepository $highwayExtensionRepository
     * @param AccessPointRepository $accessPointRepository
     * @return RES
     */
    public function postUpdateSSIDAck(Request $request,  HighwayExtensionRepository $highwayExtensionRepository, AccessPointRepository $accessPointRepository)
    {
        $em = $this->getDoctrine()->getManager();
        $conn =$em->getConnection();

        $extension = $highwayExtensionRepository->findByCodeName($request->get('codeName'))[0];
        /**
         * @var AccessPoint $accessPoint
         */
        $accessPoints = $extension->getAccessPoint();
        foreach ($accessPoints as $ap){
            if($request->get('name') == $ap->getName()){
                $accessPoint = $ap;
            }
        }

        if ($extension->getAccessKey() == $request->get('accessKey')){
            $ssids = unserialize($accessPoint->getSsid());
          if($ssids !=""){
              if(sizeof($ssids)==2){
                  $ssids = array($ssids[1]);
                  $ssids[] = $request->get('ssid');
                  $accessPoint->setSsid(serialize($ssids));
                  $em->flush();
              }else{
                  $ssids[] = $request->get('ssid');
                  $accessPoint->setSsid(serialize($ssids));
                  $em->flush();
              }
          }else{
              $ssids[] = $request->get('ssid');
              $accessPoint->setSsid(serialize($ssids));
              $em->flush();
          }
            return new RES("SSID Changed!",RES::HTTP_OK);


        } else {
            $message = "Invalid AccessKey!";
            return new RES($message,RES::HTTP_NOT_FOUND);

        }

    }


        /**
     * Test
     * @FOSRest\Post("/recharge")
     * @FOSRest\View()
     */
    public function postRecharge(Request $request, UserRepository $userRepository, UserPasswordEncoderInterface $passwordEncoder)
    {
        $user = $userRepository->findBy(['email' => $request->get('email')]);

        if (count($user)){
            $user = $user[0];
            if($passwordEncoder->isPasswordValid($user,$request->get('password'))){
                $pin = $request->get('pin');
                $conn = $this->getDoctrine()->getManager()->getConnection();
                $regSerials = array();
                $serials = $this->getDoctrine()->getRepository(Serial::class)->findAll();
                foreach ($serials as $serial){
                    $regSerials[] = $serial->getSerialNo();
                }
                foreach ($regSerials as $regSerial){
                    if(explode("####",$regSerial)[0] == $pin){
                        $em = $this->getDoctrine()->getManager();
                        $loggedUserAccount = $user->getAccount();
                        $currentBalance = $loggedUserAccount->getBalance();
                        $newBalance = (float)$currentBalance + (float)explode("####",$regSerial)[1];
                        $loggedUserAccount->setBalance($newBalance);
                        $em->flush();
                        $sql = 'DELETE FROM serial WHERE serial_no=:serialNo;';
                        $stmt = $conn->prepare($sql);
                        $stmt->execute(['serialNo'=>$regSerial]);
                        return new RES(json_encode(['balance'=>$newBalance]),RES::HTTP_OK);
                    }
                }

                return new RES("invalid key!",RES::HTTP_NOT_ACCEPTABLE);


            } else {
                $message = "Invalid Credentials!";
            }

            return new RES($message,RES::HTTP_FOUND);
        }else {
            return new RES("User Not Found",RES::HTTP_NOT_FOUND);
        }

    }


    /**
     * Test
     * @FOSRest\Post("/get_transactions")
     * @FOSRest\View()
     * @param Request $request
     * @param UserRepository $userRepository
     * @param UserPasswordEncoderInterface $passwordEncoder
     * @param TransactionHistoryRepository $transactionHistoryRepository
     * @return RES
     */
    public function postGetTransactions(Request $request, UserRepository $userRepository, UserPasswordEncoderInterface $passwordEncoder, TransactionHistoryRepository $transactionHistoryRepository)
    {
        $user = $userRepository->findBy(['email' => $request->get('email')]);

        if (count($user)){
            $user = $user[0];
            if($passwordEncoder->isPasswordValid($user,$request->get('password'))){


                $message = $this->jsonEncodeTransaction($user);
                return new RES($message,RES::HTTP_OK);


            } else {
                $message = "Invalid Credentials!";
            }

            return new RES($message,RES::HTTP_FOUND);
        }else {
            return new RES("User Not Found",RES::HTTP_NOT_FOUND);
        }

    }

    /**
     * Test
     * @FOSRest\Post("/pay_due")
     * @FOSRest\View()
     * @param Request $request
     * @param UserRepository $userRepository
     * @param UserPasswordEncoderInterface $passwordEncoder
     * @param HighwayVehicleRepository $highwayVehicleRepository
     * @return RES
     */
    public function postPayDue(Request $request, UserRepository $userRepository, UserPasswordEncoderInterface $passwordEncoder, HighwayVehicleRepository $highwayVehicleRepository)
    {
        $user = $userRepository->findBy(['email' => $request->get('email')]);

        if (count($user)){
            $user = $user[0];
            if($passwordEncoder->isPasswordValid($user,$request->get('password'))){

                $pendingPayments = $highwayVehicleRepository->findByDrivedBy($user->getId());
                $pay = true;
                foreach ($pendingPayments as $pendingPayment){
                    $pay = $this->deductToll($pendingPayment);
                    if(!$pay){ break;}
                }

                return new RES(json_encode(["pay"=>$pay]),RES::HTTP_OK);

            } else {
                $message = "Invalid Credentials!";
            }

            return new RES($message,RES::HTTP_FOUND);
        }else {
            return new RES("User Not Found",RES::HTTP_NOT_FOUND);
        }

    }

    /**
     * Test
     * @FOSRest\Post("/camera_data")
     * @FOSRest\View()
     * @param Request $request
     * @param UserRepository $userRepository
     * @param UserPasswordEncoderInterface $passwordEncoder
     * @return RES
     */
    public function postCameraData(Request $request, UserRepository $userRepository, UserPasswordEncoderInterface $passwordEncoder, TransactionHistoryRepository $transactionHistoryRepository, HighwayVehicleRepository $highwayVehicleRepository)
    {
        $user = $userRepository->findBy(['email' => $request->get('email')]);
        if (count($user)){
            $user = $user[0];
            if($passwordEncoder->isPasswordValid($user,$request->get('password')) & ($user->getEmail()=="admin@etc.com")){

                $camera_vehicles = explode(",", $request->get("vehicles"));
                $vehicles = array();
                for($i=0;$i<sizeof($camera_vehicles);$i++){
                    $vehicles[$i] = explode("|",$camera_vehicles[$i]);
                    $vehicles[$i][1] = $this->convertTime($vehicles[$i][1]);
                }

                $interchange = $this->getDoctrine()->getRepository(HighwayExtension::class)->findByCodeName($request->get("codeName"))[0];
                $em = $this->getDoctrine()->getManager();
                foreach ($vehicles as $vehicle){
                    $violation = new Violation();
                    $violation->setVehicleNo($vehicle[0]);
                    $violation->setDate(DateTime::createFromFormat('Y-m-d H:i:s',$vehicle[1]));
                    $violation->setInterchange($interchange);
                    $violation->setViolationType(0);
                    $em->persist($violation);
                }
                $em->flush();



                $message = "Success";
            } else {
                $message = "Invalid Credentials!";
            }

            return new RES($message,RES::HTTP_OK);
        }else {
            return new RES("User Not Found",RES::HTTP_NOT_FOUND);
        }

    }



//    /**
//     * Test
//     * @FOSRest\Post("/register_vehicle")
//     * @FOSRest\View()
//     */
//    public function postRegisterVehicle(Request $request, UserRepository $userRepository, UserPasswordEncoderInterface $passwordEncoder)
//    {
//        $user = $userRepository->findBy(['email' => $request->get('email')]);
//
//        if (count($user)){
//            $user = $user[0];
//            if($passwordEncoder->isPasswordValid($user,$request->get('password'))){
//
//                $vehicle = json_decode($request->get('vehicle'));
//
//
//            } else {
//                $message = "Invalid Credentials!";
//            }
//
//            return new RES($message,RES::HTTP_FOUND);
//        }else {
//            return new RES("User Not Found",RES::HTTP_NOT_FOUND);
//        }
//
//    }



    public function jsonEncodeUser(User $user){
        $jsonUser = array();
        $jsonUser["firstName"] = $user->getFirstName();
        $jsonUser["lastName"] = $user->getLastName();
        $jsonUser["address"] = $user->getAddress();
        $jsonUser["phoneNumber"] = $user->getPhoneNumber();
        $jsonUser["idNumber"] = $user->getIdNumber();
        if ($user->getAccount() !=""){
            $jsonUser["account"]["accountNo"] = $user->getAccount()->getAccountNo();
            $jsonUser["account"]["ownerName"] = $user->getAccount()->getOwnerName();
            $jsonUser["account"]["balance"] = $user->getAccount()->getBalance();
        }
        $vehicles= array();
        foreach ( $user->getVehicle() as $vehicle){
            $tempVehicle = array();
            $tempVehicle["vehicleNo"] = $vehicle->getVehicleNo();
            $tempVehicle["className"] = $vehicle->getClass()->getClassName();
            $vehicles[] = $tempVehicle;
        }
        $jsonUser["vehicle"] = $vehicles;
        $jsonUser["revisionNo"] = $user->getRevisionNo();
        $jsonUser["pendingTransaction"] = $user->getPendingTransaction();
        $path = $this->getParameter('uploads_dir').$user->getImage();
        $type = pathinfo($path, PATHINFO_EXTENSION);
        $data = file_get_contents($path);
        if($data ==""){
            $type = "svg";
            $data = file_get_contents($this->getParameter('uploads_dir')."/../images/login.svg");
        }
        $base64 = 'data:image/' . $type . ';base64,' . base64_encode($data);

        $jsonUser["image"] = $base64;



        return json_encode($jsonUser);
    }


    public function getExtension($macAddress){
       $extensions = $this->getDoctrine()->getRepository(HighwayExtension::class)->findAll();
        foreach ($extensions as $extension){
            $accessPoints = $this->getDoctrine()->getRepository(AccessPoint::class)->findByHighwayExtension($extension);
            foreach ($accessPoints as $accessPoint){
                if( strtolower($accessPoint->getMacAddress()) == strtolower($macAddress) ){
                    return $extension;
                }
            }
        }
        return false;
    }

    public function sssidGenerator($extensionCodeName, $accessPointName){

        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $ssid = '';
        for ($i = 0; $i < (24-strlen($extensionCodeName)-strlen($accessPointName)-1); $i++) {
            $ssid .= $characters[rand(0, $charactersLength - 1)];
        }
        $prefix = "ORT@#HW";
        return $prefix.$extensionCodeName.$ssid.'_'.$accessPointName;

    }

    public function calculateToll(HighwayVehicle $highwayVehicle){
        $entrance = $highwayVehicle->getEntrance()->getSequenceNo();
        $exit = $highwayVehicle->getEgress()->getSequenceNo();
        $distance = abs($entrance-$exit);
        $unitToll = $highwayVehicle->getVehicle()->getClass()->getToll();
        return (float)$distance * (float)$unitToll;
    }

    public function deductToll(HighwayVehicle $highwayVehicle){
       $em = $this->getDoctrine()->getManager();
        $conn = $this->getDoctrine()->getManager()->getConnection();
        /**
         * @var User $user
         */
        $user = $highwayVehicle->getDrivedBy();
        $user = $this->getDoctrine()->getRepository(User::class)->find($user);

        if((float)$user->getAccount()->getBalance() >= (float)$highwayVehicle->getToll()){
            $balance = (float)$user->getAccount()->getBalance() - (float)$highwayVehicle->getToll();
            $user->getAccount()->setBalance((float)($balance));
            $user->setPendingTransaction(false);
            $transaction = new TransactionHistory();
            $transaction->setUser($user);
            $transaction->setEntrance($highwayVehicle->getEntrance()->getName());
            $transaction->setEgress($highwayVehicle->getEgress()->getName());
            $datetime1 = $highwayVehicle->getEnterTime();
            $datetime2 = $highwayVehicle->getExitTime();
            $interval = date_diff($datetime2, $datetime1);
            $hrs = $interval->format('%h') + ($interval->days * 24) + ($interval->format('%i') / 60);
            $transaction->setDuration(round($hrs,2)." hours");
            $transaction->setVehicleNo($highwayVehicle->getVehicle()->getVehicleNo());
            $transaction->setToll($highwayVehicle->getToll());
            date_default_timezone_set('Asia/Colombo');
            $transaction->setDate($highwayVehicle->getExitTime());
            $em->persist($transaction);
            $em->flush();

            $sql = 'DELETE FROM highway_vehicle WHERE id=:id;';
            $stmt = $conn->prepare($sql);
            $stmt->execute([
                'id'=> $highwayVehicle->getId()]);

            return true;
        }else{
            $user->setPendingTransaction(true);
            $user->setRevisionNo($user->getRevisionNo()+1);
            $em->flush();
            return false;
        }

    }

    public function jsonEncodeTransaction(User $user){
        $transactions = $user->getTransaction();
        $jsonTransactions = array();
        foreach ($transactions as $transaction){
            $jsonTransaction = array();
            $jsonTransaction["entrance"] = $transaction->getEntrance();
            $jsonTransaction["egress"] = $transaction->getEgress();
            $jsonTransaction["vehicleNo"] = $transaction->getVehicleNo();
            $jsonTransaction["duration"] = $transaction->getDuration();
            $jsonTransaction["date"] = $transaction->getDate();
            $jsonTransaction["toll"] = $transaction->getToll();
            $jsonTransactions[] = $jsonTransaction;
        }
        return json_encode($jsonTransactions);
    }



//    public function underBalanced(  $highwayVehicles,$vehicles){
//
//        /**
//         * @var HighwayVehicle[] $pendingTransactions
//         */
//        $pendingTransactions = $highwayVehicles;
//
//
//
//        $violated = array();
//        foreach ($vehicles as $vehicle){
//           foreach ($pendingTransactions as $pendingTransaction){
//               if($vehicle[0] == $pendingTransaction->getVehicle()->getVehicleNo()){
//                   array_push($violated,$pendingTransaction);
//                   break;
//               }
//           }
//        }
//        return $violated;
//    }

    public function convertTime($dateTime){
        $arrDateTime = explode(" ",$dateTime);
        $time = $arrDateTime[1];
        $date = explode("/",$arrDateTime[0]);
        $day = $date[0];
        $month = $date[1];
        $year = $date[2];

        return $year."-".$month."-".$day." ".$time;
    }

//if( strtolower($accessPoint->getMacAddress()) == strtolower($macAddress) ){
//return $extension;
//}

    public function verifyInterchange($macAddress, $ssidReceived,$gpsReceived){

        $gpsReceived = explode(',',$gpsReceived);
        $accessPoints = $this->getDoctrine()->getRepository(AccessPoint::class)->findAll();

        $ap = "";
        foreach ($accessPoints as $accessPoint){
            if( strtolower($accessPoint->getMacAddress()) == strtolower($macAddress) ){
                /**
                 * @var AccessPoint $ap
                 */
                $ap = $accessPoint;
                break;
            }
        }


        if($ap != ""){
            $ssids = unserialize($ap->getSsid());
            foreach ($ssids as $ssid){
                if($ssid == $ssidReceived){
                    $gps = explode(',',$ap->getGps());
                    $distance = $this->distance($gps[0],$gps[1],$gpsReceived[0],$gpsReceived[1]);
                    if($distance < 0.5){
                        return true;
                    }
                    return false;
                }
            }
            return false;
        }else{
            return false;
        }
    }


    function distance($lat1, $lon1, $lat2, $lon2) {
        if (($lat1 == $lat2) && ($lon1 == $lon2)) {
            return 0;
        }
        else {
            $theta = $lon1 - $lon2;
            $dist = sin(deg2rad($lat1)) * sin(deg2rad($lat2)) +  cos(deg2rad($lat1)) * cos(deg2rad($lat2)) * cos(deg2rad($theta));
            $dist = acos($dist);
            $dist = rad2deg($dist);
            $miles = $dist * 60 * 1.1515;

                return ($miles * 1.609344);

        }
    }

}
