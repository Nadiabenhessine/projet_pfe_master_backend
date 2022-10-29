<?php

namespace App\Controller\Admin;

use App\Entity\Operateur;
use Symfony\Component\HttpFoundation\Request;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ArrayField;
use EasyCorp\Bundle\EasyAdminBundle\Field\EmailField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ChoiceField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TelephoneField;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

class OperateurCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Operateur::class;
    }

    public function configureFields(string $pageName): iterable
    {  return [        
        IdField::new('id')->hideOnForm(),
        AssociationField::new('restaurant'),
        TextField::new('nom'),
        TextField::new('prenom'),
        TextField::new('adresse'),
        TelephoneField::new('num_tel'),
        DateField::new('date_naissance'),
        ChoiceField::new('genre')->setChoices([
            'Homme' => 'homme',
            'Femme' => 'femme',
        ]),
        EmailField::new('email'),
        TextField::new('password')->setFormType(PasswordType::class),
        ArrayField::new('roles')
    ];
}
}
