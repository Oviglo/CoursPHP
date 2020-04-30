<?php

namespace App\Controller;

use App\Entity\Article;
use App\Repository\ArticleRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

//Indique que toute les routes de ce controller vont commencer par "/article"
/**
 * @Route("/article")
 */
class ArticleController extends AbstractController
{
    /**
     * @Route("/index/{page}", requirements = {"page" : "\d+"}, defaults = {"page" : 1})
     */
    public function index(Request $request, ArticleRepository $repository, int $page): Response
    {
        // Récupére une valeur $_GET['search'], si elle n'existe pas elle sera vide
        $search = $request->query->get('search', '');
        //$request->get('search', '');

        // Peut également être appelé comme ceci
        // $repository = $this->getDoctrine()->getManager()->getRepository(Article::class);

        $countPerPage = 15;

        if (empty($search)) {
            $articles = $repository->findAll($page, $countPerPage);
        } else {
            $articles = $repository->findBySearch($search, $page, $countPerPage);
        }

        /*
        Autres méthodes déjà inclues
        - findBy
        - findOneBy
        - count

        - findByTitle('Titre')
        - findOneById(2)
        */

        // Calcul du nombre de pages
        $nbPages = ($articles->count() / $countPerPage);

        return $this->render('article/index.html.twig', ['articles' => $articles, 'page' => $page, 'nbPages' => $nbPages]);
    }

    /**
     * @Route("/{id}", requirements = {"id": "\d+"})
     */
    public function show(Article $article)
    {
        // Pour afficher une entité on va toujours faire un findOneById du repository de l'entité
        return $this->render('article/show.html.twig', ['article' => $article]);
    }

    /**
     * @Route("/new")
     */
    public function new(EntityManagerInterface $entityManager): Response
    {
        // Il est possible d'obtenir le service entityManager comme ceci:
        // $entityManager = $this->getDoctrine()->getManager();

        $article = (new Article())
            ->setTitle('Deuxième article')
            ->setPublished(true)
            ->setContent('Apprenez à utiliser Doctrine')
        ;

        // Persiste l'objet Article, indique à doctrine qu'on va ajouter un objet (ne fait pas de requête INSERT)
        $entityManager->persist($article);

        // Enregistrement de l'objet (exécute la requête)
        $entityManager->flush();

        // NE PAS OUBLIER DE CREER LE FICHIER templates/article/new.html.twig
        return $this->render('article/new.html.twig');
    }
}
