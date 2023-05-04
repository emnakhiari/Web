<?php

namespace App\Controller;

use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\User;

class AfficherUsController extends AbstractController
{
    #[Route('/afficherUser', name: 'app_afficher_us')]
    public function index(ManagerRegistry $doctrine): Response
    {
        $d=$doctrine->getRepository(User ::class)->findAll();
       
         

   
        return $this->render('afficher_us/index.html.twig', [
            'au' => $d,
        ]);
    }
}
