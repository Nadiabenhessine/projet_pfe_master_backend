<?php

namespace App\Controller;

use App\Entity\Produit;
use App\Entity\LigneCommande;
use Symfony\Bridge\Doctrine\ManagerRegistry;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class LigneCommandeController extends AbstractController
{
    #[Route('/ligne/commande', name: 'app_ligne_commande')]
    public function index(): Response
    {
        return $this->render('ligne_commande/index.html.twig', [
            'controller_name' => 'LigneCommandeController',
        ]);
    }


      //find ligneCommande By produitId
      #[Route('/api/lignecommande/produitId', name: 'app_ligne_commande')]

      public function findligneCommandeByIdProduit(ManagerRegistry $doctrine, int $produitId): Response  
      {   
          $ligneCommandes = $doctrine->getRepository(LigneCommande::class)->findligneCommandeByproduitId($produitId);
  
          if (!$ligneCommandes) {
              throw $this->createNotFoundException(
                  'No ligneCommandes found for this produitId !'
              );
          }
          return $this->json(
              $ligneCommandes
          );
      }
}
