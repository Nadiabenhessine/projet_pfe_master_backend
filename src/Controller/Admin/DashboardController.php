<?php

namespace App\Controller\Admin;

use App\Entity\User;
use App\Entity\Zone;
use App\Entity\Ville;
use App\Entity\Livreur;
use App\Entity\Vehicule;
use App\Entity\Operateur;
use App\Entity\Abonnement;
use App\Entity\Restaurant;
use App\Entity\RecetteJour;
use App\Entity\Reclamation;
use App\Entity\EtatCommande;
use App\Entity\TrafficManager;
use App\Entity\TypeReclamation;
use App\Entity\CategoriesRestaurant;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use App\Controller\Admin\CategoriesRestaurantCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Router\AdminUrlGenerator;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;

class DashboardController extends AbstractDashboardController
{
    public function __construct(private  AdminUrlGenerator $adminUrlGenerator){
        
    }
    #[Route('/admin', name: 'admin')]
    public function index(): Response
    {
        $url =$this->adminUrlGenerator
        ->setController(UserCrudController::Class)
        ->generateUrl();

        return $this->redirect($url);
       
    }

    public function configureDashboard(): Dashboard
    {
        return Dashboard::new()
            ->setTitle('Plateforme livraison');
    }

    public function configureMenuItems(): iterable
    {
         yield MenuItem::linkToDashboard('Dashboard', 'fa fa-home');

//utilisateurs
        yield MenuItem::section('Utilisateurs');

        yield MenuItem::subMenu('Tous les utilisateurs', 'fa-solid fa-users-line')->setSubItems([
            MenuItem::linkToCrud('Consulter liste des utilisateurs', 'fa fa-eye', User::class),
        ]);

        yield MenuItem::subMenu('Livreur', 'fa-solid fa-person')->setSubItems([
              MenuItem::linkToCrud('ajouter un livreur', 'fas fa-plus', Livreur::class)->setAction(Crud::PAGE_NEW),
              MenuItem::linkToCrud('Consulter liste livreurs', 'fa fa-eye', Livreur::class),
        ]);
        yield MenuItem::subMenu('Traffic manager', 'fa-solid fa-person')->setSubItems([
            MenuItem::linkToCrud('ajouter un traffic manager', 'fas fa-plus', TrafficManager::class)->setAction(Crud::PAGE_NEW),
            MenuItem::linkToCrud('Consulter liste des traffic manager', 'fa fa-eye', TrafficManager::class),
        ]);
         yield MenuItem::subMenu('Operateur', 'fa-solid fa-person')->setSubItems([
        MenuItem::linkToCrud('ajouter un opérateur', 'fas fa-plus', Operateur::class)->setAction(Crud::PAGE_NEW),
        MenuItem::linkToCrud('Consulter liste des opérateurs', 'fa fa-eye', Operateur::class),
        ]);

//E_commerce

        yield MenuItem::section('E-commerce');
        yield MenuItem::subMenu('Ville', 'fa-solid fa-city')->setSubItems([
              MenuItem::linkToCrud('ajouter une ville', 'fas fa-plus', Ville::class)->setAction(Crud::PAGE_NEW),
              MenuItem::linkToCrud('Consulter liste des villes', 'fa fa-eye', Ville::class),
        ]);

        yield MenuItem::subMenu('Zone', 'fa-solid fa-building')->setSubItems([
              MenuItem::linkToCrud('ajouter une zone', 'fas fa-plus', Zone::class)->setAction(Crud::PAGE_NEW),
              MenuItem::linkToCrud('Consulter liste des zones', 'fa fa-eye', Zone::class),
        ]);

        yield MenuItem::subMenu('Categorie restaurant', 'fa fa-tags')->setSubItems([
              MenuItem::linkToCrud('ajouter une categorie restaurant', 'fas fa-plus', CategoriesRestaurant::class)->setAction(Crud::PAGE_NEW),
              MenuItem::linkToCrud('Consulter liste des categories restaurant', 'fa fa-eye', CategoriesRestaurant::class),
        ]);

        yield MenuItem::subMenu('Restaurant', 'fa-solid fa-utensils')->setSubItems([
              MenuItem::linkToCrud('ajouter un restaurant', 'fas fa-plus', Restaurant::class)->setAction(Crud::PAGE_NEW),
              MenuItem::linkToCrud('Consulter liste des restaurants', 'fa fa-eye', Restaurant::class),
        ]);

        yield MenuItem::subMenu('Abonnement', 'fa-solid fa-euro-sign')->setSubItems([
              MenuItem::linkToCrud('ajouter un abonnement', 'fas fa-plus', Abonnement::class)->setAction(Crud::PAGE_NEW),
              MenuItem::linkToCrud('Consulter liste des abonnements', 'fa fa-eye', Abonnement::class),
        ]);

        yield MenuItem::subMenu('Vehicule', 'fa-solid fa-car-rear')->setSubItems([
              MenuItem::linkToCrud('ajouter une vehicule', 'fas fa-plus', Vehicule::class)->setAction(Crud::PAGE_NEW),
              MenuItem::linkToCrud('Consulter liste des vehicules', 'fa fa-eye', Vehicule::class),
        ]);

        yield MenuItem::subMenu('Etat commande', 'fa-solid fa-chart-line')->setSubItems([
              MenuItem::linkToCrud('ajouter un etat de commande', 'fas fa-plus', EtatCommande::class)->setAction(Crud::PAGE_NEW),
              MenuItem::linkToCrud('Consulter liste des etats commandes', 'fa fa-eye', EtatCommande::class),
        ]);

        yield MenuItem::section('recettes des jours');
        yield MenuItem::linkToCrud('Recettes des jours', 'fa-solid fa-sack-dollar', RecetteJour::class);
        

        yield MenuItem::section('Reclamations');

        yield MenuItem::subMenu('Reclamations', 'fa-solid fa-comments')->setSubItems([
            MenuItem::linkToCrud('ajouter un type de reclamation', 'fas fa-plus', TypeReclamation::class)->setAction(Crud::PAGE_NEW),
            MenuItem::linkToCrud('Consulter types de reclamations', 'fa fa-eye', TypeReclamation::class),
            MenuItem::linkToCrud('Consulter les reclamations', 'fa-solid fa-comments', Reclamation::class),
        ]);
       }
}
