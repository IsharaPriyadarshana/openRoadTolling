<?php

namespace App\Controller;

use App\Entity\User;
use App\Entity\VehicleClass;
use App\Form\RegisterType;
use App\Form\UpdateType;
use App\Repository\AccountRepository;
use App\Repository\UserRepository;
use App\Repository\VehicleClassRepository;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\HttpFoundation\File\File;

class RegisterController extends AbstractController
{


    /**
     * @Route("/register", name="register")
     * @param Request $request
     * @param UserPasswordEncoderInterface $passwordEncoder
     * @param VehicleClass $vehicleClass
     * @return Response
     */
    public function register(Request $request, UserPasswordEncoderInterface $passwordEncoder, VehicleClassRepository $vehicleClassRepository)
    {
        $em = $this->getDoctrine()->getManager();
        $conn =$em->getConnection();
        $user = new User();
        $form = $this->createForm(RegisterType::class,$user,[
            'allow_extra_fields' => true
        ]);

        $vehicleClasses = $vehicleClassRepository->findAll();


        $form->handleRequest($request);


        $errorsEmail = $form['email']->getErrors();

        if($form->isSubmitted() && $form->isValid()){

            $user->setPassword($passwordEncoder->encodePassword($user,$user->getPassword()));
            $user->setRoles(["ROLE_USER"]);
            /**
             * @var UploadedFile $file
             */

            $file = $request->files->get('register')['image'];

            if($file){
                $fileName = md5(uniqid()).'.'.$file->guessExtension();
                $file->move(
                    $this->getParameter('uploads_dir'), $fileName
                );
                $user->setImage($fileName);
            }

            $em->persist($user);
            $em->flush();

            if(isset($request->request->all()['vehicles'])){
                $registeredVehicles = $request->request->all()['vehicles'];
                foreach ($registeredVehicles as $registeredVehicle){
                    $vehicle = explode("        |        ",$registeredVehicle);

                    $sql = '
                        INSERT INTO vehicle(vehicle_no,class_id,user_id)VALUES(:vehicleNo,:classId,:userId)';
                    $stmt = $conn->prepare($sql);
                    $stmt->execute(['vehicleNo' => $vehicle[0],
                        'classId' => $vehicleClassRepository->findByClassName($vehicle[1])[0]->getId(),
                        'userId' => $user->getId()]);
                }
            }



            $account = $request->request->all()['account'];

            if(($account['accountNo'] !="")&&($account['ownerName']!="")){
                $sql = '
                        INSERT INTO account(account_no,owner_name,user_id)VALUES(:accountNo,:ownerName,:userId)';
                $stmt = $conn->prepare($sql);
                $stmt->execute(['accountNo' => $account['accountNo'],
                    'ownerName' => $account['ownerName'] ,
                    'userId' => $user->getId()]);

            }




            return $this->redirect($this->generateUrl('home'));
        }else{

              if (count($errorsEmail)>0){
                  $errorsEmail=null;
                  return $this->render('register/index.html.twig', [
                      'form'=>$form->createView(),
                      'vehicleClasses' => $vehicleClasses,
                      'errorCode' => "Email is already registered on the system. Try login!"
                  ]);
              }



        }


        return $this->render('register/index.html.twig', [
            'form'=>$form->createView(),
            'vehicleClasses' => $vehicleClasses,
            'errorCode' => ""
        ]);
    }


    /**
     * @Route("/update/{id}", name="update")
     * @param $id
     * @param Request $request
     * @param UserPasswordEncoderInterface $passwordEncoder
     * @param UserInterface $loggedUser
     * @return \Symfony\Component\HttpFoundation\RedirectResponse|Response
     */

    public function updateUser($id,Request $request, UserPasswordEncoderInterface $passwordEncoder,UrlGeneratorInterface $urlGenerator, VehicleClassRepository $vehicleClassRepository){

        $loggedUser = $this->get('security.token_storage')->getToken()->getUser()->getId();
        $vehicleClasses = $vehicleClassRepository->findAll();
        if ($id == $loggedUser){
            $em = $this->getDoctrine()->getManager();
            $conn =$em->getConnection();
            $user = $em->find(User::class,$id);
//            $user->setImage(
//                new File($this->getParameter('uploads_dir').'/'.$user->getImage())
//            );
            $form = $this->createForm(UpdateType::class,$user,[
                'validation_groups' => ['update']
            ]);

//dump($request);die;
            $form->handleRequest($request);

            if($form->isSubmitted() && $form->isValid()){


                if($user->getPassword() !=""){
                    $user->setPassword($passwordEncoder->encodePassword($user,$user->getPassword()));

                    $sql = '
                        UPDATE user
                        SET first_name = :firstName, last_name = :lastName, id_number = :idNumber, phone_number = :phoneNumber, address = :address, password = :password
                        WHERE id= :id
        ';
                    $stmt = $conn->prepare($sql);
                    $stmt->execute(['firstName' => $user->getFirstName(),
                        'lastName' => $user->getLastName(),
                        'idNumber' => $user->getIdNumber(),
                        'phoneNumber' => $user->getPhoneNumber(),
                        'address' => $user->getAddress(),
                        'password' => $user->getPassword(),
                        'id' => $id]);
                }else{
                    $sql = '
                        UPDATE user
                        SET first_name = :firstName, last_name = :lastName, id_number = :idNumber, phone_number = :phoneNumber, address = :address
                        WHERE id= :id
        ';
                    $stmt = $conn->prepare($sql);
                    $stmt->execute(['firstName' => $user->getFirstName(),
                        'lastName' => $user->getLastName(),
                        'idNumber' => $user->getIdNumber(),
                        'phoneNumber' => $user->getPhoneNumber(),
                        'address' => $user->getAddress(),
                        'id' => $id]);
                }

                if(isset($request->request->all()['vehicles'])){
                    $registeredVehicles = $request->request->all()['vehicles'];
                    $this->removeVehicles($user,$registeredVehicles);
                    $alreadyInVehicles = $this->getVehicleNos($user->getVehicle());
                    foreach ($registeredVehicles as $registeredVehicle){
                        $vehicle = explode("        |        ",$registeredVehicle);
                        if(!in_array($vehicle[0],$alreadyInVehicles)){
                            $sql = '
                        INSERT INTO vehicle(vehicle_no,class_id,user_id)VALUES(:vehicleNo,:classId,:userId)';
                            $stmt = $conn->prepare($sql);
                            $stmt->execute(['vehicleNo' => $vehicle[0],
                                'classId' => $vehicleClassRepository->findByClassName($vehicle[1])[0]->getId(),
                                'userId' => $user->getId()]);
                        }
                    }
                }else{
                    $this->removeVehicles($user,array());
                }



                $account = $request->request->all()['account'];

                if(($account['accountNo'] !="")&&($account['ownerName']!="")){
                  if($user->getAccount() !=""){
                      $sql = '
                        UPDATE account
                        SET account_no = :accountNo, owner_name = :ownerName
                        WHERE user_id= :userId
        ';
                      $stmt = $conn->prepare($sql);
                      $stmt->execute(['accountNo' => $account['accountNo'],
                          'ownerName' => $account['ownerName'] ,
                          'userId' => $user->getId()]);
                  }else{
                      $sql = '
                        INSERT INTO account
                         (account_no, owner_name,user_id)VALUES ( :accountNo,:ownerName,:userId)
                       
        ';
                      $stmt = $conn->prepare($sql);
                      $stmt->execute(['accountNo' => $account['accountNo'],
                          'ownerName' => $account['ownerName'] ,
                          'userId' => $user->getId()]);
                  }
                }else{
                    $sql = 'DELETE FROM account WHERE user_id=:userId;';
                    $stmt = $conn->prepare($sql);
                    $stmt->execute([
                        'userId' => $user->getId()]);
                }


                return new RedirectResponse($urlGenerator->generate('home'));
            }
        } else {
            return new RedirectResponse($urlGenerator->generate('home'));
        }



        return $this->render('register/update.html.twig', [
            'form'=>$form->createView(),
            'user' => $user,
            'vehicleClasses' => $vehicleClasses
        ]);
    }


    /**
     * @Route("/changeImage", name="changeImage")
     * @param Request $request
     */

    public function changeImage(Request $request){

        $em = $this->getDoctrine()->getManager();
        $conn = $em->getConnection();

        $file = $request->files->get('file');
        $currentImage = $this->get('security.token_storage')->getToken()->getUser()->getImage();
        if($currentImage == ""){

            if($file){
                $fileName = md5(uniqid()).'.'.$file->guessExtension();
                $file->move(
                    $this->getParameter('uploads_dir'), $fileName
                );
                $sql = '
                        UPDATE user
                        SET  image = :image
                        WHERE id= :id
        ';
                $stmt = $conn->prepare($sql);
                $stmt->execute([
                    'image' => $fileName,
                    'id' => $this->get('security.token_storage')->getToken()->getUser()->getId()]);
            }

        }else{
            $myFile = $this->getParameter('uploads_dir').$currentImage;
            try{
                unlink($myFile);

            } catch (Exception $e){

            }
            if($file){
                $fileName = $currentImage;
                $file->move(
                    $this->getParameter('uploads_dir'), $fileName
                );

            }
        }

return $this->redirectToRoute('home');
    }

    public function getVehicleNos($vehicles){
        $vehicleNos = array();
       foreach($vehicles as $vehicle){
            array_push($vehicleNos,$vehicle->getvehicleNo());
       }
       return $vehicleNos;
    }

    public function removeVehicles($user,$vehicles){
        $conn = $this->getDoctrine()->getManager()->getConnection();
       $regVehicles= $this->getVehicleNos($user->getVehicle());
       $newVehicles = array();
       foreach ($vehicles as $vehicle){
           $newVehicles[]= explode("        |        ",$vehicle)[0];
       }
       foreach ($regVehicles as $regVehicle){
           if(!in_array($regVehicle, $newVehicles)){
               $sql = 'DELETE FROM vehicle WHERE user_id=:userId AND vehicle_no=:vehicleNo;';
               $stmt = $conn->prepare($sql);
               $stmt->execute([
                   'vehicleNo'=> $regVehicle,
                   'userId' => $user->getId()]);
           }
       }
    }

}