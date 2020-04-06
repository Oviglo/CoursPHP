<?php

// Appel du fichier database.php
require_once 'database.php';

$pdo = getPDO();
//var_dump($pdo->errorInfo());

$articles = getArticles($pdo);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <title>Liste des articles</title>
</head>
<body>
    <div class="container">
        <h1>Liste des articles</h1>
        <a href="article_edit.php" class="btn btn-success">Ajouter une article</a>
        <hr/>
        <!-- table.table>(thead>tr>th*3)+tbody -->
        <table class="table">
            <thead class="thead-dark">
                <tr>
                    <th>Titre</th>
                    <th>Date</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <!-- Liste des articles -->
                <?php foreach ($articles as $article): ?>
                    <tr>
                        <td>
                            <a href="article_show.php?id=<?=$article['id']; ?>">
                                <?=$article['title']; ?>
                            </a>
                        </td>
                        <td>
                            <?=date_format(date_create($article['date_create']), 'd/m/Y'); // 2020-03-27?>
                        </td>
                        <td>
                            <a class="btn btn-secondary" href="article_edit.php?id=<?=$article['id']; ?>">
                                Modifier    
                            </a>
                            <a class="btn btn-danger" href="article_delete.php?id=<?=$article['id']; ?>">
                                Supprimer  
                            </a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</body>
</html>