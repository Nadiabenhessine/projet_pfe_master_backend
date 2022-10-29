<?php

namespace App\Controller\Admin;

use App\Entity\RecetteJour;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Config\Action;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Config\Actions;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\MoneyField;
use EasyCorp\Bundle\EasyAdminBundle\Field\NumberField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IntegerField;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class RecetteJourCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return RecetteJour::class;
    }
    public function configureActions(Actions $actions): Actions
    {
        return $actions
        // desactiver action"créer une recette du jour "
       ->disable(Action::NEW, Action::DELETE)
       ->disable( Action::EDIT);
    }
    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id')->hideOnForm(),
            DateField::new('date'),
            IntegerField::new('montant'),
            TextField::new('remarque'),
            AssociationField::new('traffic_manager'),
        ];
    }
    
}
