<?php

namespace App\Controller\Admin;

use App\Entity\Restaurant;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\EmailField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\BooleanField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextareaField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TelephoneField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class RestaurantCrudController extends AbstractCrudController
{
    public const RESTAURANT_BASE_PATH = 'upload/images/restaurants';
    public const RESTAURANT_UPLOAD_DIR = 'public/upload/images/restaurants';
    public static function getEntityFqcn(): string
    {
        return Restaurant::class;
    }

    
    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id')->hideOnForm(),
            AssociationField::new('categorie_restaurant'),
            AssociationField::new('ville'),
            TextField::new('nom'),
            TelephoneField::new('num_tel'),
            EmailField::new('email'),
            //TextField::new('imageUrl'),
            ImageField::new('image')
            ->setBasePath(self::RESTAURANT_BASE_PATH)
            ->setUploadDir(self::RESTAURANT_UPLOAD_DIR)
            ->setSortable(false),
            TextField::new('description'),
            BooleanField::new('statu'),
        ];
    }
    
}
