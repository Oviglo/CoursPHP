<?php

namespace Controller;

use Model\ArticleManager;
use Model\Article;

/**
 * Contrôleur article.
 */
class ArticleController
{
    public function index()
    {
        //var_dump('Appel de la méthode index');
        $articleManager = new ArticleManager();
        $articles = $articleManager->findAll();

        return array(
            'template' => 'Article/index.html.twig',
            'data' => array(
                'entities' => $articles,
                'count' => count($articles),
            ),
        );
    }

    public function new()
    {
        $articleManager = new ArticleManager();
        $article = new Article();

        if (!empty($_POST)) {
            $article->setDateCreate(new \DateTime());
            $article->setTitle(strip_tags($_POST['title']));
            $article->setContent($_POST['content']);
            $articleManager->save($article);

            header('Location: /'.BASEPATH.'/article/index');
            exit();
        }

        return array(
            'template' => 'Article/new.html.twig',
            'data' => array(
                'entity' => $article,
            ),
        );
    }

    public function edit($id)
    {
        $articleManager = new ArticleManager();
        $article = $articleManager->findById($id);

        if (!empty($_POST)) {
            $article->setDateUpdate(new \DateTime());
            $article->setTitle(strip_tags($_POST['title']));
            $article->setContent($_POST['content']);
            $articleManager->save($article);

            header('Location: /'.BASEPATH.'/article/index');
            exit();
        }

        return array(
            'template' => 'Article/edit.html.twig',
            'data' => array(
                'entity' => $article,
            ),
        );
    }
}
