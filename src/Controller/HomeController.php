<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    #[Route('/', name: 'app_home')]
    public function index(): Response
    {
        return $this->render('home/index.html.twig');
    }

    #[Route('/profile', name: 'app_profile')]
    public function profile(): Response
    {
        return $this->render('home/profile.html.twig');
    }

    #[Route('/react', name: 'app_react')]
    #[Route('/react/me', name: 'app_react_me')]
    #[Route('/react/users', name: 'app_react_users')]
    #[Route('/react/users/{id}', name: 'app_react_user', requirements: ['id' => '\d+'])]
    #[Route('/react/{whatever}', name: 'app_react_whatever', requirements: ['whatever' => '.*'])]
    public function react(): Response
    {
        return $this->render('home/react.html.twig');
    }
}
