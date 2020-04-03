<?php

/*
    - Dans la base de données de wf3_test, créer une table 'task' avec les champs suivants
        id INT(11) PK AI, content TEXT, date_create DATE, checked TINYINT(1) DEFAULT 0

    - Faire un fichier database.php qui contiendra les fonctions de base de données
    - Créer une page addTask.php qui contient un formulaire pour ajouter une tâche (champ textarea)
    - Afficher toutes les tâches dans index.php
    - Ajouter un bouton "Fait" qui redirige vers un script checkTask.php pour modifier la tâche et mettre checked à 1
    - Ajouter une formulaire de recherche (input:text) au dessus de la liste des tâches (index.php) pour faire une recherche dans le content (LIKE)
*/

require_once 'database.php';

$tasks = getAllTasks();
// var_dump($tasks);
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
        <h1>Liste des tâches</h1>
        <hr/>
        <a href="addTask.php" class="btn btn-success">Ajouter une tâche</a>
        <?php foreach ($tasks as $t): ?>
        <div class="card mt-2">
            <div class="card-body">
                <span class="badge badge-secondary">
                    <?=date_format(date_create($t['date_create']), 'd/m/Y'); ?>
                </span>
                <p>
                    <?=$t['content']; ?>
                </p>
            </div>
            <?php if (0 == $t['checked']):?>
            <div class="card-footer text-right">
                <a class="btn btn-primary" href="checkTask.php?id=<?=$t['id']; ?>">Marqué comme fait</a>
            </div>
            <?php endif; ?>
        </div>
        <?php endforeach; ?>

    </div>
    
</body>
</html>