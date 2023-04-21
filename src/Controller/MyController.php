<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class MyController extends AbstractController {

  #[Route(path: '/hi', name: 'hi')]
  public function hello(): Response {

    return $this->render('stimulus/hi.html.twig');
  }
}