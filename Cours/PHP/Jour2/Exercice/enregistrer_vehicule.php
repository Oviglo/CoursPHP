<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Enregistrement véhicule</title>
</head>
<body>

<?php

// var_dump($_POST);
// Si la checkbox n'est pas cochée, la valeur dans $_POST ne sera pas définie

// Test si ont a des valeurs dans $_POST (le formulaire à bien été envoyé)
if (!empty($_POST)) {
    $errors = false; // On suppose qu'il n'y a pas d'erreur par défaut

    if (empty($_POST['brand'])) { // Si le champ "brand" est vide
        echo '<p>Le champ "marque" est obligatoire</p>';
        $errors = true;
    }

    if (empty($_POST['model'])) { // Si le champ "model" est vide
        echo '<p>Le champ "modéle" est obligatoire</p>';
        $errors = true;
    }

    if (empty($_POST['weight'])) { // Si le champ "weight" est vide
        echo '<p>Le champ "poids" est obligatoire</p>';
        $errors = true;
    }

    // if (!empty($_POST['brand'])) Ne pas répéter la condition !
    if (!$errors) { // Il n'y a pas d'erreur, ont peut enregistrer
        // Traitement des données envant l'envois en base de données
        $brand = htmlentities(trim(addslashes($_POST['brand'])));
        $model = htmlentities(trim(addslashes($_POST['model'])));
        $weight = htmlentities(trim(addslashes($_POST['weight'])));
        $type = htmlentities(trim(addslashes($_POST['type'])));
        /*
         htmlentities va convertir les caractère html en chaine (qui ne seront pas interprété par le navigateur)
         trim va retirer les espaces au début et à la fin de la chaine
         addslashes va ajouter des caractère d'échapement ("j'ai" => "j\'ai")
        */

        // Ne pas oublier le checkbox
        // $_POST['dispo']; // Si la case n'est pas cochée, affiche une erreur undefined index 'dispo'
        /*$dispo = false;
        if (isset($_POST['dispo'])) {
            $dispo = true;
        }*/
        $dispo = isset($_POST['dispo']); // isset retourne un booléen

        echo '<p>Le véhicule a bien été ajouté</p>';
    }
}
?>
  
</body>
</html>