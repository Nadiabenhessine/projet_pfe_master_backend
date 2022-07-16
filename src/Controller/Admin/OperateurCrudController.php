<?php

namespace App\Controller\Admin;

use App\Entity\Operateur;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\EmailField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TelephoneField;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class OperateurCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Operateur::class;
    }

    public function configureFields(string $pageName): iterable
    {  return[
        IdField::new('id')->hideOnForm(),
        AssociationField::new('restaurant'),
        TextField::new('nom'),
        TextField::new('prenom'),
        TextField::new('adresse'),
        TelephoneField::new('num_tel'),
        DateField::new('date_naissance'),
        EmailField::new('email'),
        TextField::new('password'),
    ];
}
}
