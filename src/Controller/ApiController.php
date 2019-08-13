<?php

namespace App\Controller;
use App\Entity\User;
use App\Repository\UserRepository;
use FOS\RestBundle\Controller\AbstractFOSRestController;
use Symfony\Component\Form\Extension\Core\Type\HiddenType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use FOS\RestBundle\View\View;
use FOS\RestBundle\Controller\Annotations as FOSRest;
use App\Entity\Article;
use Symfony\Bundle\FrameworkBundle\Templating\EngineInterface;
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
                return new RES($message,RES::HTTP_FOUND);

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
     */
    public function postUpdateUserAction(Request $request, UserRepository $userRepository, UserPasswordEncoderInterface $passwordEncoder)
    {
        $user = $userRepository->findBy(['email' => $request->get('email')]);

        if (count($user)){
            $user = $user[0];
            if($passwordEncoder->isPasswordValid($user,$request->get('password'))){
                if($request->get('revisionNo') != $user->getRevisionNo()){
                    $message = $this->jsonEncodeUser($user);
                    return new RES($message,RES::HTTP_FOUND);
                }else{
                    $message = "Upto Date!";
                    return new RES($message,RES::HTTP_OK);
                }


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
        $base64 = 'data:image/' . $type . ';base64,' . base64_encode($data);

        $jsonUser["image"] = $base64;



        return json_encode($jsonUser);
    }




}
