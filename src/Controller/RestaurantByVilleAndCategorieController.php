<?php

namespace App\Controller;

use App\Entity\Restaurant;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class RestaurantByVilleAndCategorieController extends AbstractController
{
    #[Route('/api/restaurantById/id', name: 'app_restaurant_by_id')]
    
    //find Restaurant By Id
    public function findRestaurantById(ManagerRegistry $doctrine, int $id): Response  
    {   
        $restaurant = $doctrine->getRepository(Restaurant::class)->find($id);

        if (!$restaurant) {
            throw $this->createNotFoundException(
                'No restaurant found for id '.$id
            );
        }

        return $this->json([
            'Nom restaurant: '.$restaurant->getNom(),
            'Description: ' .$restaurant->getDescription(),
          //  'operateurs: '.$restaurant->getOperateurs()
        ]);
    }

    //find Restaurant By Nom
    #[Route('/api/restaurantByNom', name: 'app_restaurant_by_id')]
    public function findRestaurantByNom(ManagerRegistry $doctrine): Response {

    $repository = $doctrine->getRepository(Restaurant::class);

    $restaurant = $repository->findOneBy(['nom' => 'pizza hut']);

        if (!$restaurant) {
            throw $this->createNotFoundException(
                'No restaurant found !'
            );
        }

        return $this->json([
            'Nom restaurant: '.$restaurant->getNom(),
            'Description: ' .$restaurant->getDescription()
        ]);
    }

    //RestaurantByVilleAndCategorie
    #[Route('/api/restaurantByVilleAndCategorie/idVille/idCatRest', name: 'app_restaurant_by_ville_and_categorie')]

    public function FindRestaurantByVilleAndCategorie(ManagerRegistry $doctrine, int $idVille, int $idCatRest): Response{ 

        $restaurants = $doctrine->getRepository(Restaurant::class)->findRestaurantByIdVilleAndIdCatRest($idVille,$idCatRest);
      
        if (!$restaurants) {
            throw $this->createNotFoundException(
                'Aucun restaurant trouvé !'
            );
        }
        return $this->json(
            $restaurants
        );
    }
}
