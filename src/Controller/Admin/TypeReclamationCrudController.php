<?php

namespace App\Controller\Admin;

use App\Entity\TypeReclamation;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class TypeReclamationCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return TypeReclamation::class;
    }

    
    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id')->hideOnForm(),
            TextField::new('libelle'),
        ];
    }
    
}
