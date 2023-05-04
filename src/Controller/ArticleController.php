<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ArticleController extends AbstractController
{
    #[Route('/article', name: 'app_article')]
    public function index(): Response
    {
        return $this->render('article/index.html.twig', [
            'controller_name' => 'ArticleController',
        ]);
    }
    #[Route('/article/Ajouter', name: 'app_AjouterArticle')]
    public function Ajouter(): Response
    {
        return $this->render('article/AjouterArticle.html.twig', [
            'controller_name' => 'ArticleController',
        ]);
    }
}
