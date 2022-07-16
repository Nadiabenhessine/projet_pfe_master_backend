<?php

namespace App\Controller\Admin;

use App\Entity\TypeReclamation;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class TypeReclamation2CrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return TypeReclamation::class;
    }

    /*
    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id'),
            TextField::new('title'),
            TextEditorField::new('description'),
        ];
    }
    */
}
