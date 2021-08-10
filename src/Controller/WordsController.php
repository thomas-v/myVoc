<?php

namespace App\Controller;

use App\Entity\Word;
use App\Form\WordType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class WordsController extends AbstractController
{

    public function __construct(EntityManagerInterface $entityManager){
        $this->entityManager = $entityManager;
    }

    #[Route('/mes-mots', name: 'words')]
    public function index(): Response
    {
        return $this->render('words/index.html.twig', [
        ]);
    }

    #[Route('/ajouter-un-mot', name: 'word-add')]
    public function add(Request $request): Response
    {
        $word = new Word();
        $user = $this->getUser();
        $form = $this->createForm(WordType::class, $word);

        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()){
            $word = $form->getData();
            $word->setUserId($user);

            $this->entityManager->persist($word);
            $this->entityManager->flush(); 
        }

        return $this->render('words/add.html.twig', [
            'form' => $form->createView()
        ]);
    }
}
