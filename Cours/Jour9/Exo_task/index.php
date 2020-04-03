<?php

/*
    - Dans la base de données de wf3_test, créer une table 'task' avec les champs suivants
        id INT(11) PK AI, content TEXT, date_create DATE, checked TINYINT(1) DEFAULT 0

    - Faire un fichier database.php qui contiendra les fonctions de base de données
    - Créer une page addTask.php qui contient un formulaire pour ajouter une tâche (champ textarea)
    - Afficher toutes les tâches dans index.php
    - Ajouter un bouton "Fait" qui redirige vers un script checkTask.php pour modifier la tâche et mettre checked à 1
*/
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
    <a href="addTask.php">Ajouter une tâche</a>
</body>
</html>