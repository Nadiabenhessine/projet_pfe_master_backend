<?php

namespace App\Controller;

use App\Entity\Operateur;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class EspaceOperateurController extends AbstractController
{
    #[Route('/api/espaceOperateur/idOperateur', name: 'app_espace_operateur_restaurant')]
      //find Restaurant By Id
      public function findRestaurantByIdOperateur(ManagerRegistry $doctrine, int $idOperateur): Response  
      {   
          $restaurant = $doctrine->getRepository(Operateur::class)->findRestaurantByIdOperateur($idOperateur);
  
          if (!$restaurant) {
              throw $this->createNotFoundException(
                  'No restaurant found for Operateur id: '.$id
              );
          }
          return $this->json(
              $restaurant
        );
      }
}
