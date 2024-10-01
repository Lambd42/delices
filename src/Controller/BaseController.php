<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use App\Form\AddCandyType;

class BaseController extends AbstractController
{
    #[Route('/', name: 'app_home')]
    public function index(): Response
    {
        return $this->render('base/index.html.twig', [
            'controller_name' => 'BaseController',
        ]);
    }

    #[Route('/ajoutBonbon', name: 'app_add_candy')]
    public function add_candy(): Response
    {
        $form = $this->createForm(AddCandyType::class);
        return $this->render('base/add_candy.html.twig', [
            'form' => $form->createView()
        ]);
    }
}
