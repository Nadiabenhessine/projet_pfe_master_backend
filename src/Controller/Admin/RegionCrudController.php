<?php

namespace App\Controller\Admin;

use App\Entity\Region;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class RegionCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Region::class;
    }

    
    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id')->hideOnForm(),
            TextField::new('libelle'),
            AssociationField::new('traffic_manager'),

        ];
    }
    
}
