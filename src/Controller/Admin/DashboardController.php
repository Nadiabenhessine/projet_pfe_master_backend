<?php

namespace App\Controller\Admin;

use App\Entity\User;
use App\Entity\Zone;
use App\Entity\Ville;
use App\Entity\Client;
use App\Entity\Contact;
use App\Entity\Livreur;
use App\Entity\Vehicule;
use App\Entity\Operateur;
use App\Entity\Abonnement;
use App\Entity\Newsletter;
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
            ->setTitle('Nadia Delivery');
    }

    public function configureMenuItems(): iterable
    {
         yield MenuItem::linkToDashboard('Dashboard', 'fa fa-home');

//utilisateurs
        yield MenuItem::section('Utilisateurs');
        yield MenuItem::linkToCrud('Liste des utilisateurs', 'fa-solid fa-users-line', User::class);

   
        yield MenuItem::subMenu('Livreurs', 'fa-solid fa-person')->setSubItems([
              MenuItem::linkToCrud('ajouter un livreur', 'fas fa-plus', Livreur::class)->setAction(Crud::PAGE_NEW),
              MenuItem::linkToCrud('Consulter liste livreurs', 'fa fa-eye', Livreur::class),
        ]);
        yield MenuItem::subMenu('Traffic manager', 'fa-solid fa-person')->setSubItems([
            MenuItem::linkToCrud('ajouter un traffic manager', 'fas fa-plus', TrafficManager::class)->setAction(Crud::PAGE_NEW),
            MenuItem::linkToCrud('Consulter liste des traffic manager', 'fa fa-eye', TrafficManager::class),
        ]);
         yield MenuItem::subMenu('Operateurs', 'fa-solid fa-person')->setSubItems([
        MenuItem::linkToCrud('ajouter un opérateur', 'fas fa-plus', Operateur::class)->setAction(Crud::PAGE_NEW),
        MenuItem::linkToCrud('Consulter liste des opérateurs', 'fa fa-eye', Operateur::class),
        ]);
        yield MenuItem::linkToCrud('Clients', 'fa-solid fa-person', Client::class);
//relation clients-personnels
      yield MenuItem::section('Relations clients-personnels');
      /*
      yield   MenuItem::linkToCrud('Reclamations', 'fa-solid fa-comments', Reclamation::class);
      */
      yield   MenuItem::linkToCrud('Newsletters', 'fa-solid fa-book', Newsletter::class);
      yield   MenuItem::linkToCrud('Messages', 'fa-solid fa-envelope', Contact::class);
      
//recettes des jours
      yield MenuItem::section('recettes des jours');
      yield MenuItem::linkToCrud('Recettes des jours', 'fa-solid fa-sack-dollar', RecetteJour::class);

//Entités de base

        yield MenuItem::section('Ressources');
        yield MenuItem::subMenu('Ville', 'fa-solid fa-city')->setSubItems([
              MenuItem::linkToCrud('ajouter une ville', 'fas fa-plus', Ville::class)->setAction(Crud::PAGE_NEW),
              MenuItem::linkToCrud('Consulter liste des villes', 'fa fa-eye', Ville::class),
        ]);

        yield MenuItem::subMenu('Categorie restaurant', 'fa fa-tags')->setSubItems([
              MenuItem::linkToCrud('ajouter une categorie restaurant', 'fas fa-plus', CategoriesRestaurant::class)->setAction(Crud::PAGE_NEW),
              MenuItem::linkToCrud('Consulter liste des categories restaurant', 'fa fa-eye', CategoriesRestaurant::class),
        ]);

        yield MenuItem::subMenu('Restaurant', 'fa-solid fa-utensils')->setSubItems([
              MenuItem::linkToCrud('ajouter un restaurant', 'fas fa-plus', Restaurant::class)->setAction(Crud::PAGE_NEW),
              MenuItem::linkToCrud('Consulter liste des restaurants', 'fa fa-eye', Restaurant::class),
        ]);
        /*
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
        */


     
       }
}
