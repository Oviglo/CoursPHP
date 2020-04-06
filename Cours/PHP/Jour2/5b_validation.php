<?php

var_dump($_POST);
// Test s'il y a des données envoyées
if (!empty($_POST)) { // isset($_POST['prenom'])
    // Traitement des données
    // Ont retire les espaces au début et à la fin avec trim(), '    OK    ' => 'OK'
    $prenom = trim($_POST['prenom']);
    $nom = trim($_POST['nom']);
    // le nom et le prenom doivent avoir entre 3 et 60 charactères
    // donc si c'est inférieur à 3 ou supérieur à 60 ont affiche une erreur
    if (strlen($prenom) < 3 || strlen($prenom) > 60) {
        echo 'Le prenom doit être entre 3 et 60 caractères<br/>';
    }

    if (strlen($nom) < 3 || strlen($nom) > 60) {
        echo 'Le prenom doit être entre 3 et 60 caractères<br/>';
    }

    /*
        filter_var permet de valider une chaîne avec un filtre spécifique
        https://www.php.net/manual/fr/function.filter-var.php
    */
    // ici filter_var va tester si l'email est valide, retourne un booléen
    // FILTER_SANITIZE_EMAIL nettoie la chaine en supprimant les caractères interdits dans un mail
    $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
    // FILTER_VALIDATE_EMAIL valide l'adresse email
    $mailValid = filter_var($email, FILTER_VALIDATE_EMAIL);
    if (!$mailValid) {
        echo "L'adresse email n'est pas valide<br/>";
        // die(); // arrête le script, on peut utiliser aussi exit();
    }

    // Pour savoir quel bouton "submit" a été cliqué
    if (isset($_POST['envoi_admin'])) {
        echo "Envoyé à l'admin<br/>";
    }
}
