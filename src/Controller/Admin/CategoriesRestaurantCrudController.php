<?php

namespace App\Controller\Admin;

use App\Entity\CategoriesRestaurant;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class CategoriesRestaurantCrudController extends AbstractCrudController
{
    public const CAT_RESTAURANT_BASE_PATH = 'upload/images/catRestaurants';
    public const CAT_RESTAURANT_UPLOAD_DIR = 'public/upload/images/catRestaurants';

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
            TextField::new('imageUrl'),
            ImageField::new('image')
            ->setBasePath(self::CAT_RESTAURANT_BASE_PATH)
            ->setUploadDir(self::CAT_RESTAURANT_UPLOAD_DIR)
            ->setSortable(false),
    ];
}
}
