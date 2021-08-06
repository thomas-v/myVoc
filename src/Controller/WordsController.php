<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class WordsController extends AbstractController
{
    #[Route('/mes-mots', name: 'words')]
    public function index(): Response
    {
        return $this->render('words/index.html.twig', [
        ]);
    }

    #[Route('/ajouter-un-mot', name: 'words-add')]
    public function add(): Response
    {
        return $this->render('words/add.html.twig', [
        ]);
    }
}
