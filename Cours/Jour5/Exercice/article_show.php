<?php

require_once 'database.php';

$pdo = getPDO();
// Si la variable get "id" n'existe pas
if (!isset($_GET['id'])) {
    // Redirection vers article_list.php
    header('Location: article_list.php'); // Indique au serveur de retourner vers la page article_list
    // Le code en dessous de la redirection n'est pas executé
}
$id = $_GET['id']; // Récupére l'id dans le lien "article_shop.php?id=1"
$article = getArticle($pdo, $id); // Récupérer $_GET['id'] pour afficher l'article en fonction du lien
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <title>Article</title>
</head>
<body>
    <div class="container">
        <?php if (false === $article): ?>
            <div class="alert alert-danger">L'article n'existe pas</div>
        <?php else: ?>
        <article>
            <header>
                <h1><?=$article['title']; ?></h1>
                <small><?=date_format(date_create($article['date_create']), 'd/m/Y'); ?></small>
            </header>
            <div>
                <?=$article['content']; ?>
            </div>
        </article>
        <?php endif; ?>
    </div>
</body>
</html>