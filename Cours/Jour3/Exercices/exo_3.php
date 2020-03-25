<?php
/*
    1. Créez un fichier functions.php que vous incluerez dans un script PHP.

    2. Dans ce fichier, créez une fonction `getAccountButton`.
        Cette fonction affichera un élément HTML contenant :
            - Le nom de l'utilisateur passé en paramètre
            - Une image dont le chemin sera passé en paramètre

    3. Créez une page web simple et appelez la fonction dans un <header>

    4. Modifiez la fonction pour que l'élément ne soit plus écrit,
    mais soit renvoyé en tant que chaine de caractère.

    */

require_once 'functions.php';

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User</title>
</head>
<body>
    <header><?=getAccountButton('Loic', 'image.jpg'); ?></header>
</body>
</html>