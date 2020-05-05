<?php

namespace App\Controller;

use App\Entity\Article;
use App\Form\ArticleType;
use App\Repository\ArticleRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Contracts\Translation\TranslatorInterface;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;

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
     * @Security("is_granted('ROLE_ADMIN')")
     */
    public function new(Request $request, EntityManagerInterface $entityManager, TranslatorInterface $translator): Response
    {
        // Génére une erreur 403 (deny access) si l'utilisateur n'a pas le rôle 'ROLE_ADMIN'
        // $this->denyAccessUnlessGranted('ROLE_ADMIN');
        // Retourne true si l'utilisateur à le rôle
        // $this->isGranted('ROLE_ADMIN');

        // Il est possible d'obtenir le service entityManager comme ceci:
        // $entityManager = $this->getDoctrine()->getManager();

        $article = new Article();

        // Création d'un formulaire et envoi de l'article en data
        $form = $this->createForm(ArticleType::class, $article);

        // Insérer l'objet Request dans le formulaire pour obtenir les données $_POST
        $form->handleRequest($request);

        // Test si le formulaire a bien été envoyé ET s'il est valide
        if ($form->isSubmitted() && $form->isValid()) {
            // Persiste l'objet Article, indique à doctrine qu'on va ajouter un objet (ne fait pas de requête INSERT)
            $entityManager->persist($article);

            // Enregistrement de l'objet (exécute la requête)
            $entityManager->flush();

            // Générer un message flash
            $this->addFlash('success', $translator->trans('article.new.success', ['%title%' => $article->getTitle()]));

            // redirection
            return $this->redirectToRoute('app_article_index');
        }

        // NE PAS OUBLIER DE CREER LE FICHIER templates/article/new.html.twig
        return $this->render('article/new.html.twig', [
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}/edit", requirements = {"id": "\d+"})
     * @Security("is_granted('ROLE_ADMIN')")
     */
    public function edit(Request $request, EntityManagerInterface $entityManager, Article $article): Response
    {
        $form = $this->createForm(ArticleType::class, $article);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();
            $this->addFlash('success', 'Article modifié');

            return $this->redirectToRoute('app_article_index');
        }
        // Ne pas oublier de créer le fichier twig
        return $this->render('article/edit.html.twig', ['article' => $article, 'form' => $form->createView()]);
    }

    /**
     * @Route("/{id}/delete", requirements = {"id": "\d+"})
     * @Security("is_granted('ROLE_ADMIN')")
     */
    public function delete(Request $request, EntityManagerInterface $entityManager, Article $article): Response
    {
        // Crée un formulaire directement dans le controller
        $form = $this->createFormBuilder()
            ->add('delete', SubmitType::class, ['label' => 'Supprimer'])
            ->getForm()
        ;

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->remove($article); // Supprime l'article
            $entityManager->flush();
            $this->addFlash('success', 'Article supprimé');

            return $this->redirectToRoute('app_article_index');
        }
        // Ne pas oublier de créer le fichier twig
        return $this->render('article/delete.html.twig', [
            'article' => $article,
            'form' => $form->createView(), ]
        );
    }
}
