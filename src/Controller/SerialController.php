<?php

namespace App\Controller;

use App\Entity\Serial;
use App\Form\TopUpType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;

class SerialController extends AbstractController
{
    /**
     * @Route("/serial", name="serial")
     * @param Request $request
     * @param $
     * @param UrlGeneratorInterface $urlGenerator
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function index(Request $request)
    {
        $form = $this->createForm(TopUpType::class,null,[
            'allow_extra_fields' => true
        ]);

        $serial = "";
        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()){
            $amount = $request->request->all()["top_up"]["amount"];
            $serial = $this->serialGenerator();
            $this->createSerial($serial,$amount);
            return $this->render('serial/index.html.twig', [
                'form' =>$form->createView(),
                'serial' => $serial,
                'controller_name' => 'SerialController',
            ]);
        }


        return $this->render('serial/index.html.twig', [
            'form' =>$form->createView(),
            'serial' => $serial,
            'controller_name' => 'SerialController',
        ]);
    }



    public function serialGenerator(){
        $token = "0123456789";
        $serial= $token[rand(1,9)];
        while (strlen($serial)<15){
            $serial = $serial.$token[rand(0,9)];
        }
        return $serial;
    }

    public function createSerial($key,$amount){
        $em =$this->getDoctrine()->getManager();
        $serial = new Serial();
        $serial->setSerialNo($key."####".$amount);
        $em->persist($serial);
        $em->flush();
    }


}
