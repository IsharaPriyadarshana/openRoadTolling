<?php

namespace App\Controller;

use App\Entity\User;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class MainController extends AbstractController
{
    /**
     * @Route("/", name="main")
     */
    public function index()
    {

//        if (is_granted('IS_AUTHENTICATED_ANONYMOUS')){

            return $this->render('main/index.html.twig', [
                'controller_name' => 'MainController',
            ]);
//        }else {
//
//            return $this->redirect($this->generateUrl('home'));
//        }


    }


    /**
     * @Route("/home", name="home")
     */
    public function home(){
        $em = $this->getDoctrine()->getManager();
        $user = $em->find(User::class,$this->get('security.token_storage')->getToken()->getUser()->getId());

       if($user->getImage() == ""){
           $photoSrc =  "/images/login.svg";
       }else{
           $photoSrc =  "/uploads/".$user->getImage();
       }
//       dump($user->getVehicle()[1]);die;
        return $this->render('main/home.html.twig',[
            'photoSrc' => $photoSrc,
            'user' => $user,
            'editProfile'=> $this->generateUrl('update',['id'=> $this->get('security.token_storage')->getToken()->getUser()->getId()])
        ]);
    }
}
