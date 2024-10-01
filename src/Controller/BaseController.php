<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use App\Form\AddCandyType;
use App\Repository\TypeBonbonRepository;

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

    #[Route('/liste-typebonbon', name: 'app_typebonbon_list')]
    public function typebonbon_list(TypeBonbonRepository $typeBonbonRepository): Response
    {
        $all_typebonbon = $typeBonbonRepository->findAll();
        return $this->render('base/typebonbon_list.html.twig', [
            'all_typebonbon' => $all_typebonbon
        ]);
    }
}
