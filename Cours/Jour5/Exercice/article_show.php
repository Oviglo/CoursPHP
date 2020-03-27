<?php

require_once('database.php');

$pdo = getPDO();
$article = getArticle(1); // Récupérer $_GET['id'] pour afficher l'article en fonction du lien