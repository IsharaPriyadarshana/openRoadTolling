<?php

namespace App\Controller;

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

        return $this->render('main/home.html.twig');
    }
}
