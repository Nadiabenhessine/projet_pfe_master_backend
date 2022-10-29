<?php

namespace App\Controller\Admin;

use App\Entity\Livreur;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ArrayField;
use EasyCorp\Bundle\EasyAdminBundle\Field\EmailField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ChoiceField;
use EasyCorp\Bundle\EasyAdminBundle\Field\BooleanField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TelephoneField;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class LivreurCrudController extends AbstractCrudController
{
    public const CIN_BASE_PATH = 'upload/images/cin';
    public const CIN_UPLOAD_DIR = 'public/upload/images/cin';

    public const PERMIS_BASE_PATH = 'upload/images/permis';
    public const PERMIS_UPLOAD_DIR = 'public/upload/images/permis';

    public static function getEntityFqcn(): string
    {
        return Livreur::class;
    }

    
    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id')->hideOnForm(),
            AssociationField::new('ville'),
            AssociationField::new('vehicule'),
            BooleanField::new('disponibilite'),
            AssociationField::new('traffic_manager'),            
            TextField::new('nom'),
            TextField::new('prenom'),
            TextField::new('adresse'),
            TelephoneField::new('num_tel'),
            DateField::new('date_naissance'),
            ChoiceField::new('genre')->setChoices([
                'Homme' => 'homme',
                'Femme' => 'femme',
            ]),
            ImageField::new('CIN')
                ->setBasePath(self::CIN_BASE_PATH)
                ->setUploadDir(self::CIN_UPLOAD_DIR)
                ->setSortable(false),
            ImageField::new('Photo_permis')
                ->setBasePath(self::PERMIS_BASE_PATH)
                ->setUploadDir(self::PERMIS_UPLOAD_DIR)
                ->setSortable(false),
            ArrayField::new('roles'),
            EmailField::new('email'),
            TextField::new('password')->setFormType(PasswordType::class)  
        ];
    }
    
}
