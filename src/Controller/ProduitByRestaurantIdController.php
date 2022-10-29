<?php

namespace App\Controller;

use App\Entity\Produit;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class ProduitByRestaurantIdController extends AbstractController
{
    #[Route('/api/ProduitById/produitId', name: 'app_produit_by_Id')]
    
     //find Restaurant By Id
     public function findProduitById(ManagerRegistry $doctrine, int $produitId): Response  
     {   
         $produit = $doctrine->getRepository(Produit::class)->find($id);
 
         if (!$produit) {
             throw $this->createNotFoundException(
                 'No produit found for id '.$id
             );
         }
 
         return $this->json([
             'Id produit: '.$produit->getId(),
         ]);
     }
    //find produit By restaurantId
    public function findProduitByRestaurantId(ManagerRegistry $doctrine, int $restaurantId): Response  
    {   
        $produits = $doctrine->getRepository(Produit::class)->findProduitByIdRestaurant($restaurantId);

        if (!$produits) {
            throw $this->createNotFoundException(
                'No product found for this restaurant !'
            );
        }
        return $this->json(
            $produits
        );
    }
}
