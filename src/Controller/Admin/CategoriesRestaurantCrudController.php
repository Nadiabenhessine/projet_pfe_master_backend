<?php

namespace App\Controller\Admin;

use App\Entity\CategoriesRestaurant;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class CategoriesRestaurantCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return CategoriesRestaurant::class;
    }

    
    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id')->hideOnForm(),
            TextField::new('libelle'),
            TextField::new('description'),
    ];
}
}
