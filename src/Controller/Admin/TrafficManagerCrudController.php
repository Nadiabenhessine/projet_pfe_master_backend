<?php

namespace App\Controller\Admin;

use App\Entity\TrafficManager;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ArrayField;
use EasyCorp\Bundle\EasyAdminBundle\Field\EmailField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ChoiceField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TelephoneField;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class TrafficManagerCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return TrafficManager::class;
    }

    
    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id')->hideOnForm(), 
            TextField::new('nom'),
            TextField::new('prenom'),
            TextField::new('adresse'),
            TelephoneField::new('num_tel'),
            DateField::new('date_naissance'),
            ChoiceField::new('genre')->setChoices([
                'Homme' => 'homme',
                'Femme' => 'femme',
            ]),
            ArrayField::new('roles'),
            EmailField::new('email'),
            TextField::new('password')->setFormType(PasswordType::class)  
          ];

    }
    
}
