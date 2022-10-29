<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class FindMeController extends AbstractController
{
    #[Route('/api/findMe', name: 'app_findMe')]
    public function findMe(): Response
    {
        return $this->json(
            $this->getUser()
             );
    }
}
