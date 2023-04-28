<?php

namespace App\Controller;

use App\Form\FactureType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\FactureRepository;
use App\Repository\CommandeRepository;
use Symfony\Component\HttpFoundation\Session\Flash\FlashBagInterface;
use App\Entity\Facture;
use App\Entity\Commande;
use Doctrine\ORM\EntityManagerInterface;






class FactureController extends AbstractController  
{

    private $FactureRepository;
    private $CommandeRepository;
    private $flashMessage;
  

    public function __construct(
        FactureRepository $FactureRepository,
        CommandeRepository $CommandeRepository,
        FlashBagInterface $flashMessage,
       
  
    ) {
        $this->FactureRepository = $FactureRepository;
        $this->CommandeRepository = $CommandeRepository;
        $this->flashMessage = $flashMessage;
      
    }



   

    #[Route('/facture', name: 'app_facture')]
    public function index(EntityManagerInterface $entityManager): Response
    {   
        $notification_count=0;
        $message='facture payés';
 // Récupérer les commandes en attente avec une date de livraison passée
 $query = $entityManager->createQuery(
    'SELECT c, f.idFacture as fid FROM App\Entity\Commande c
    JOIN c.factures f
    WHERE c.dateLivraison < :now
    AND f.statut = :statut'
)->setParameter('now', new \DateTime())
 ->setParameter('statut', 'En attente');

 $results = $query->getScalarResult();

 $factureIds = array();
 foreach ($results as $row) {
     $factureIds[] = $row['fid'];
 }
 


// Si la requête renvoie des résultats, créer un message de notification
if (!empty($results)) {
    $notification_count=1;
    $count = count($results);
    $factureMsg = ($count > 1) ? 'Factures n° ' : 'Facture n° ';
    $factureMsg .= implode(', ', $factureIds) . ' sont payées !';
   // $message = 'Il y a ' . $count . ' commandes en attente dont la date de livraison est passée.';
   $message = 'Les factures suivantes ont été payées : ' . implode(', ', $factureIds);
  //  $this->addFlash('warning', $message);
    $this->addFlash('warning', $factureMsg);
    // Envoyer également une notification par e-mail à l'administrateur
}
       
        $factures = $this->FactureRepository->findAll();
        $commandes = $this->CommandeRepository->findAll();
        return $this->render('facture/index.html.twig', [
            'controller_name' => 'FactureController',
            "factures" => $factures, 'commandes' => $commandes,'notification_count'=>$notification_count,'msg'=> $message
        ]);
    }

    /**
     * @Route("/facture/{id}", name="facture_show")
     */

    public function showFacture($id)

    {  $notification_count=1;
        $message='facture payés';
        $facture = $this->FactureRepository->find($id);
        return $this->render('facture/show.html.twig', [
            "facture" => $facture,'notification_count'=>$notification_count,'msg'=> $message
        ]);
    }


    /**
     * @Route("/create/facture/{id}", name="facture_create")
     */
    public function createFacture(Request $request, $id)
    {
        $notification_count=1;
        $message='facture payés';
        $commande = $this->CommandeRepository->find($id);
        $facture = new Facture();

        $form = $this->createForm(FactureType::class, $facture);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            $facture = $form->getData();


            $facture->setCommande($commande);
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($facture);
            $entityManager->flush();
            $this->flashMessage->add("success", "Facture ajoutée !");
            return $this->redirectToRoute('app_facture');
        }

        return $this->render('facture/add.html.twig', [
            'form' => $form->createView(), 'commande' => $commande,'notification_count'=>$notification_count,'msg'=> $message
        ]);
    }












    /**
     * @Route("/edit/facture/{id}", name="facture_edit")
     */

    public function editFacture(Facture $facture, Request $request)
    {  $notification_count=1;
        $message='facture payés';
        $form = $this->createForm(FactureType::class, $facture);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            $facture = $form->getData();
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($facture);
            $entityManager->flush();
            $this->flashMessage->add("success", "Facture modifiée !");
            return $this->redirectToRoute('app_facture');
        }

        return $this->render('facture/edit.html.twig', [
            'form' => $form->createView(),'notification_count'=>$notification_count ,'msg'=> $message
        ]);
    }





    /**
     * @Route("/delete/facture/{id}", name="facture_delete")
     */

    public function deleteFacture(Facture $facture)
    {

        $entityManager = $this->getDoctrine()->getManager();
        $entityManager->remove($facture);
        $entityManager->flush();
        $this->flashMessage->add("success", "Facture supprimée !");
        return $this->redirectToRoute('app_facture');
    }




    /**
     * @Route("/Mesfactures/{id}", name="mesfactures_show")
     */

     public function showFactures($id)


     {    $message='facture payés';
        $notification_count=1;
        $commandes = $this->CommandeRepository->findBy(array('idUtilisateur' => $id), array('dateLivraison' => 'DESC'));
        $commandesA = $this->CommandeRepository->findBy(array('idUtilisateura' => $id), array('dateLivraison' => 'DESC'));
       // $factures = $this->FactureRepository->findBy(array('id_commande' => $commandes->geti), array('created_at' => 'DESC'));

         $facture = $this->FactureRepository->find($id);
         return $this->render('home/historique.html.twig', [
             "commandes" => $commandes, "commandesA"=> $commandesA,'notification_count'=>$notification_count, 'msg'=> $message
         ]);
     }









  /**
     * @Route("/notifications", name="notifications")
     */
    public function dashboard(EntityManagerInterface $entityManager)
    {
        // Récupérer les commandes en attente avec une date de livraison passée
        $query = $entityManager->createQuery(
            'SELECT c, f FROM App\Entity\Commande c
            JOIN c.factures f
            WHERE c.dateLivraison < :now
            AND f.statut = :statut'
        )->setParameter('now', new \DateTime())
         ->setParameter('statut', 'En attente');
        
        $result = $query->getResult();
        
        // Si la requête renvoie des résultats, créer un message de notification
        if (!empty($result)) {
            $message = 'Il y a ' . count($result) . ' commandes en attente dont la date de livraison est passée.';
            $this->addFlash('warning', $message);
            // Envoyer également une notification par e-mail à l'administrateur
        }

        $factures = $this->FactureRepository->findAll();
        $commandes = $this->CommandeRepository->findAll();
        return $this->render('facture/index.html.twig', [
            'controller_name' => 'FactureController',
            "factures" => $factures, 'commandes' => $commandes
        ]);
    }



    #[Route('/{notyf}', name: 'app_notyf')]
    public function index3(?string $notyf = null): Response
    {
        if (null != $notyf) {
            $this->addFlash($notyf, 'This is a '.$notyf.' flash message.');
        }

        return $this->render('facture/index.html.twig', [
            'notyf' => $notyf,
        ]);
    }




}
