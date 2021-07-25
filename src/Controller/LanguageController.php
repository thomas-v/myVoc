<?php

namespace App\Controller;

use App\Entity\Language;
use App\Form\LanguageType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class LanguageController extends AbstractController
{
    private $entityManager;

    public function __construct(EntityManagerInterface $entityManager){
        $this->entityManager = $entityManager;
    }

    #[Route('/langues/ajouter-une-langue', name: 'language-add')]
    public function index(Request $request): Response
    {
        $notification = null;
        $language = new Language();
        $form = $this->createForm(LanguageType::class, $language);

        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()){
            $language = $form->getData();
            $this->entityManager->persist($language);
            $this->entityManager->flush(); 

            $notification = [
                'message' => 'La langue a bien été ajouté.',
                'type' => 'success'
            ];
        }

        return $this->render('language/add.html.twig', [
            'form' => $form->createView(),
            'notification' => $notification
        ]);
    }
}
