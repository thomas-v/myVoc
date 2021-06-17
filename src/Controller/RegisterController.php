<?php

namespace App\Controller;

use App\Entity\User;
use App\Form\RegisterType;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class RegisterController extends AbstractController
{
    /**
     * @Route("/inscription", name="register")
     */
    public function index(): Response
    {
        $form = $this->createForm(RegisterType::class, new User());

        return $this->render('register/index.html.twig',[
            'form' => $form->createView()
        ]);
    }
}
