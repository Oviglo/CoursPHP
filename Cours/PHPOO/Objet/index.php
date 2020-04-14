<?php

require_once 'Article.php';

// Appel de la méthode static getCount sans créer d'objet
echo Article::getCount();
echo '<br/>';

// Création d'une instance de classe => objet
$article1 = new Article('Apprendre le PHP Objet');
// $article1->title = 'Apprendre le PHP Objet';
// Appel de la méthode static getCount sans créer d'objet
echo Article::getCount();
echo '<br/>';

// Nouvel objet Article
// PHP appel automatiquement le constructeur
$article2 = new Article('Aller plus loin avec Symfony');
//$article2->title = '      <strong>Aller plus loin avec Symfony</strong>      ';
// title passe ne private, obligé de passer par les accesseurs (getter, setter)
$article2->setTitle('      <strong>Aller plus loin avec Symfony</strong>      ');

// Le code source est commun aux 2 objets mias les valeurs des proprietés sont différentes
echo $article1->getTitle();
echo '<br/>';
echo $article2->getTitle();
echo '<br/>';
echo $article2->formatTitle();
echo $article2->formatDate();

// Utilisation d'une constante
// On comprend tout de suite qu'il s'agit de publier l'article
$article1->status = Article::STATUS_PUBLIE;

var_dump($article1->estPublie());
var_dump(Article::$count);
