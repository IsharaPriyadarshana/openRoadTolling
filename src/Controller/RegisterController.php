<?php

namespace App\Controller;

use App\Entity\User;
use App\Form\RegisterType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class RegisterController extends AbstractController
{
    /**
     * @Route("/register", name="register")
     * @param Request $request
     * @param UserPasswordEncoderInterface $passwordEncoder
     * @return Response
     */
    public function register(Request $request, UserPasswordEncoderInterface $passwordEncoder)
    {
        $user = new User();
        $form = $this->createForm(RegisterType::class,$user);
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

            $em = $this->getDoctrine()->getManager();
            $em->persist($user);
            $em->flush();
            return $this->redirect($this->generateUrl('home'));
        }else{

              if (count($errorsEmail)>0){
                  $errorsEmail=null;
                  return $this->render('register/index.html.twig', [
                      'form'=>$form->createView(),
                      'errorCode' => "Email is already registered on the system. Try login!"
                  ]);
              }



        }


        return $this->render('register/index.html.twig', [
            'form'=>$form->createView(),
            'errorCode' => ""
        ]);
    }
}
