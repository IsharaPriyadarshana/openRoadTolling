<?php

namespace App\Controller;

use App\Entity\User;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;
use Symfony\Component\HttpFoundation\RedirectResponse;
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
    public function home(UrlGeneratorInterface $urlGenerator){
        $em = $this->getDoctrine()->getManager();
        /**
         * @var User $user
         */
        $user = $em->find(User::class,$this->get('security.token_storage')->getToken()->getUser()->getId());

        if ($user->getRoles()[0] == "ROLE_USER"){
            if($user->getImage() == ""){
                $photoSrc =  "/images/login.svg";
            }else{
                $photoSrc =  "/uploads/".$user->getImage();
            }
            return $this->render('main/home.html.twig',[
                'photoSrc' => $photoSrc,
                'user' => $user,
                'editProfile'=> $this->generateUrl('update',['id'=> $this->get('security.token_storage')->getToken()->getUser()->getId()])
            ]);
        } else if ($user->getRoles()[0] == "ROLE_ADMIN"){
            return new RedirectResponse($urlGenerator->generate('admin'));
        }


    }

    /**
     * @Route("/admin", name="admin")
     */
    public function admin(){

        return $this->render('main/admin.html.twig',[
           ]);
    }

}
