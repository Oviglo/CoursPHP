<?php

// espace de nom dans src => App

namespace App\Controller;

use App\Service\Zippopotamus;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AppController extends AbstractController
{
    /**
     * Page d'accueil.
     *
     * @Route("/")
     */
    public function home(): Response
    {
        // On méthode de controller doit retourner impérativement un objet Response
        // return new Response('Hello world!');

        // Retourne le rendu d'une vue Twig
        // le deuxième paramètre sont les valeurs envoyées à la vue
        return $this->render('app/home.html.twig', ['name' => 'Pierre']);
    }

    /**
     * @Route("/zippo/{postal}", requirements = {"id": "\d+"})
     */
    public function zippo(Zippopotamus $zippoService, string $postal): Response
    {
        return $this->render('app/zippo.html.twig', [
            'result' => $zippoService->getPostalInfos($postal),
        ]);
    }
}
