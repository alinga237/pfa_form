<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Http\Authenticator;

class AcceuilUserController extends AbstractController
{
    #[Route('/acceuil/user', name: 'app_acceuil_user')]
    public function index($formulaireRepository): Response
    {
        return $this->json([
                'formulaire' => $formulaireRepository->findBy([], ['formulaire' => 'asc'])

        ]);
    }
}
