<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class EnfantsController extends AbstractController
{
    #[Route('/enfants', name: 'app_enfants')]
    public function index(): Response
    {
        return $this->render('enfants/index.html.twig', [
            'controller_name' => 'EnfantsController',
        ]);
    }
}
