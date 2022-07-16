<?php

namespace App\Controller\Admin;

use App\Entity\Reclamation;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Config\Action;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Config\Actions;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class ReclamationCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Reclamation::class;
    }
    public function configureActions(Actions $actions): Actions
    {
        return $actions
        // desactiver action"créer une reclamation"
       ->disable(Action::NEW, Action::DELETE)
       ->disable(Crud::PAGE_DETAIL, Action::EDIT);
    }

    
    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id')->hideOnForm(),
            DateField::new('date_time'),
            TextEditorField::new('sujet'),
            AssociationField::new('type_reclamation'),
            AssociationField::new('utilisateur'),
        ];
    }
    
}
