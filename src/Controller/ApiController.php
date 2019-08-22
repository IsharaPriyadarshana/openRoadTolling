<?php

namespace App\Controller;
use App\Entity\HighwayExtension;
use App\Entity\HighwayVehicle;
use App\Entity\User;
use App\Entity\Vehicle;
use App\Repository\HighwayExtensionRepository;
use App\Repository\HighwayVehicleRepository;
use App\Repository\UserRepository;
use App\Repository\VehicleRepository;
use FOS\RestBundle\Controller\AbstractFOSRestController;
use Symfony\Component\HttpFoundation\Request;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use FOS\RestBundle\Controller\Annotations as FOSRest;
use App\Entity\Article;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Response as RES;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

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
                $em = $this->getDoctrine()->getManager();
                $conn =$em->getConnection();
                $macAddress = $request->get('macAddress');
                $timeStamp = $request->get('time');
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
                    $message = json_encode($this->getExtension($macAddress)->getName());
                }else{
                    /**
                     * @var HighwayVehicle $isIn
                     */
                    $isIn=$isIn[0];
                    if($isIn->getIsCurrentlyIn()==0){
                        $highwayVehicle = new HighwayVehicle();
                        $highwayVehicle->setUser($user);
                        $highwayVehicle->setVehicle($vehicle);
                        $highwayVehicle->setEntrance($this->getExtension($macAddress));
                        $highwayVehicle->getEnterTime($timeStamp);
                        $highwayVehicle->setIsCurrentlyIn(1);
                        $em->persist($highwayVehicle);
                        $em->flush();
                        $message = json_encode($this->getExtension($macAddress)->getName());
                    }else{
                        /**
                         * @var HighwayVehicle $highwayVehicle
                         */
                        $highwayVehicle = $highwayVehicleRepository->findByUser($user)[0];
                        $highwayVehicle->setEgress($this->getExtension($macAddress));
                        $highwayVehicle->setExitTime($timeStamp);
                        $highwayVehicle->setDrivedBy($user->getId());
                        $highwayVehicle->setIsCurrentlyIn(0);
                        $highwayVehicle->setUser(null);
                        $em->flush();
                        $message = json_encode([$this->getExtension($macAddress)->getName(),$highwayVehicle->getToll()]);
                    }
                }


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
                    $macs = unserialize($extension->getMacAddress());
                    foreach ($macs as $mac){
                        $macAddresses[]=$mac;
                    }
                }
                $message = json_encode($macAddresses);
                return new RES($message,RES::HTTP_OK);

            } else {
                $message = "Invalid Credentials!";
                return new RES($message,RES::HTTP_FORBIDDEN);
            }

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
            foreach (unserialize($extension->getMacAddress()) as $mac){
                if($mac == $macAddress){
                    return $extension;
                }
            }
        }
        return false;
    }
}
