<?php

namespace App\Controller\Admin;

use App\Entity\Contact;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Config\Action;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Config\Actions;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\EmailField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class ContactCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Contact::class;
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
            EmailField ::new('email'),
            TextField::new('sujet'),
            TextField::new('message'),

        ];
    }
    
}
