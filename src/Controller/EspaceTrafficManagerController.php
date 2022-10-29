<?php

namespace App\Controller;

use App\Entity\Livreur;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class EspaceTrafficManagerController extends AbstractController
{
    #[Route('/api/livreurByIdtm/trafficManagerId', name: 'app_livreur_by_trafficManagerId')]
    
    public function findLivreurByTrafficManagerId(ManagerRegistry $doctrine, int $trafficManagerId): Response  
    {   
        $livreurs = $doctrine->getRepository(Livreur::class)->findLivreurByIdTm($trafficManagerId);

        if (!$livreurs) {
            throw $this->createNotFoundException(
                'Aucun livreur trouvé !'
            );
        }
        return $this->json(
            $livreurs
        );
    }



    
}
