<?php

namespace App\Controller;

use App\Entity\User;
use App\Form\RechercheType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class VerfiercodeController extends AbstractController
{
    #[Route('/verfiercode/{code}/{mail}', name: 'app_verfiercode')]
    public function index(Request $request,$code,$mail ): Response
    {
        $user = new User();
        $form  = $this->createForm(RechercheType::class,$user);
        $form->handleRequest($request);
      //  $mail = $form->getData('username');
      //  $user->setUsername($mail);
      $mail1 = $user->getUserName();
      if($form->isSubmitted() && $mail !="" && $mail1==$code   )
      {
        return $this->redirectToRoute('app_mot_de_passe_oblierchanger',['nom'=>$mail]);
      }
        return $this->render('verfiercode/index.html.twig', ['form' =>$form->createView() , 'mail'=>$mail1 , 'code'=>$code]);
    }
}
