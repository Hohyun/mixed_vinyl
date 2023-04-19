<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use function Symfony\Component\String\u;

class VinylController extends AbstractController
{
    /**
     * @Route("/")
     */
    #[Route(path: '/', name: 'home', methods: ['GET'])]
    public function homepage(): Response
    {
       return new Response('Title: PB & Jams');
    }

    #[Route("/browse/{slug}", name:"browse")]    
    public function browse(string $slug = null): Response 
    {
        if ($slug) {
            $title = 'Genre: '.u(str_replace('-', ' ', $slug))->title(true);
        } else {
            $title = 'All Genres';
        }
        
        return new Response($title);
    }
}

