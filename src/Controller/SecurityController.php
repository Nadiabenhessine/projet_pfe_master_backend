<?php

namespace App\Controller;

use App\Entity\User;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Security\Http\Attribute\CurrentUser;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Security\Csrf\TokenStorage\TokenStorageInterface;
use Lexik\Bundle\JWTAuthenticationBundle\Services\JWTTokenManagerInterface;

class SecurityController extends AbstractController
{
    #[Route('/api/login', name: 'api_login')]
    public function login(#[CurrentUser] ?User $user): Response{      
           
            if (null === $user) {
                return $this->json([
                    'message' => 'missing credentials',
                ], Response::HTTP_UNAUTHORIZED);
            }
             return $this->json([
            "test"
             ]);
         }

    #[Route('/api/logout', name: 'api_logout', methods: ['GET'])]
    public function logout()
    { 
        // controller can be blank: it will never be called!
        return new Response('logout successfully');
    }
}
