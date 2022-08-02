<?php

namespace App\Controller\Admin;

use App\Entity\Client;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Config\Action;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Config\Actions;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\EmailField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TelephoneField;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class ClientCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Client::class;
    }
    public function configureActions(Actions $actions): Actions
    {
        return $actions
        // desactiver action"créer une reclamation"
       ->disable(Action::NEW, Action::DELETE)
       ->disable( Action::EDIT);
    }
  
    public function configureFields(string $pageName): iterable
    {  return[
        IdField::new('id')->hideOnForm(),
        TextField::new('nom'),
        TextField::new('prenom'),
        TextField::new('genre'),
        TextField::new('adresse'),
        TelephoneField::new('num_tel'),
        DateField::new('date_naissance'),
        EmailField::new('email'),
        TextField::new('password'),
    ];
}
}