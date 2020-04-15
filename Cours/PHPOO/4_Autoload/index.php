<?php

// PHP appelle cette fonction quand on instancie un objet qui n'existe pas (pas de require_once)
spl_autoload_register(function ($className) {
    var_dump($className);
    // require_once 'User.php';
    // pour MAC : str_replace('\\', '\/', $className) . '.php ';
    require_once str_replace('\\', '\/', $className).'.php ';
});

/*
Quand PHP ne trouve pas une class, il appelle une fonction spl_autoload_register en envoyant le nom de la class en paramètre
*/
$user = new User();

$article = new Article();

$product = new Product();

$articleDeblog = new \Blog\Article();

$newArticleBlog = new \Blog\Article();

// Indique a PHP de charger la classe Article du dossier Blog et la renome en ArticleBlog pour ne pas avoir de conflit avec Article
use Blog\Article as ArticleBlog;

$encoreUnArticle = new ArticleBlog();
