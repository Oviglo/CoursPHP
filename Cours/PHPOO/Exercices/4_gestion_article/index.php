<?php

spl_autoload_register();

use Manager\ArticleManager;

// var_dump(ArticleManager::class);

$articleManager = new ArticleManager();
$articles = $articleManager->findAll();

//var_dump($articles);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <title>Document</title>
</head>
<body>
    <div class="container">
        <h1>Gestion des articles</h1>
        <a href="article_edit.php" class="btn btn-success mb-2">Ajouter une article</a>
        <table class="table">
            <thead class="thead-dark">
                <tr>
                    <th>Titre</th>
                    <th>Catégorie</th>
                    <th></th>
                </tr>
            </thead>

            <tbody>
                <?php foreach ($articles as $a): ?>
                <tr>
                    <td><?=$a->getTitle(); ?></td>
                    <td><?=$a->getCategory(); ?></td>
                    <td></td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</body>
</html>