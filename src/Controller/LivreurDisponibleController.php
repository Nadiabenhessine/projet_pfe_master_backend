<?php

namespace App\Controller;

use App\Entity\Livreur;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class LivreurDisponibleController extends AbstractController
{
    #[Route('/api/livreurDisponible', name: 'app_livreur_disponible')]
    public function findLivreurDisponible(ManagerRegistry $doctrine): Response  {

        $repository = $doctrine->getRepository(Livreur::class);
     
             $livreurs = $repository->findBy(
                 ['disponibilite' => 'true'],
             );
             if (!$livreurs) {
                 throw $this->createNotFoundException(
                     'Aucun livreur disponible !'
                 );
             }
     
             return $this->json(
                $livreurs

             );
     }
}
