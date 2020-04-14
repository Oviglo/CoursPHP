<?php

require_once 'Article.php';

// Création d'une instance de classe => objet
$article1 = new Article('Apprendre le PHP Objet');
// $article1->title = 'Apprendre le PHP Objet';

// Nouvel objet Article
// PHP appel automatiquement le constructeur
$article2 = new Article('Aller plus loin avec Symfony');
$article2->title = '      <strong>Aller plus loin avec Symfony</strong>      ';

// Le code source est commun aux 2 objets mias les valeurs des proprietés sont différentes
echo $article1->title;
echo '<br/>';
echo $article2->title;
echo '<br/>';
echo $article2->formatTitle();
echo $article2->formatDate();
