<?php

namespace App\Controller;

use App\Entity\User;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\PasswordHasher\PasswordHasherInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;


class RegisterController extends AbstractController
{
     /**
     * @Route("/api/register", name="api_register")
     */    
    public function register(Request $request , UserPasswordHasherInterface $passwordHasher)
    {
      //get the user data 
        $nom = $request->get('nom');
        $prenom = $request->get('prenom');
        $adresse = $request->get('adresse');
        $date_naissance = $request->get('date_naissance');
        $num_tel = $request->get('num_tel');
        $genre = $request->get('genre');
        $email = $request->get('email');
        $plaintextPassword = $request->get('password');

        $user = new User();
        $user->setNom($nom);
        $user->setPrenom($prenom);
        $user->setAdresse($adresse);
        $user->setDateNaissance($date_naissance);
        $user->setNumTel($num_tel);
        $user->setGenre($genre);
        $user->setEmail($email);


        // hash the password (based on the security.yaml config for the $user class)
        $hashedPassword = $passwordHasher->hashPassword($user,$plaintextPassword);
        $user->setPassword($hashedPassword);
     

        $em = $this->getDoctrine()->getManager();
        $em->persist($user);
        $em->flush();

        return $this->json(['message' => 'Registered Successfully']);
    }
}
