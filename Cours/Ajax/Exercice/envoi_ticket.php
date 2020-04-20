<?php

// var_dump($_POST);
$msg = '';
$status = 'error';
// Si le formulaire a été envoyé
if (!empty($_POST)) {
    array_map('trim', $_POST);
    array_map('strip_tags', $_POST);

    if (strlen($_POST['name']) < 3 || strlen($_POST['name']) > 50) {
        $msg = 'Le champ "nom et prénom" doit contenir entre 3 et 50 caractères';
    }

    if (strlen($_POST['description']) < 5) {
        $msg = 'Le champ "description" doit contenir au moins 5 caractères';
    }

    if (!in_array($_POST['priority'], ['faible', 'normale', 'haute'])) {
        $msg = 'La priorité en invalide';
    }

    // Aucune erreur
    if (empty($msg)) {
        $status = 'success';
        $msg = 'Le ticket a bien été envoyé';
    }
} else {
    // Générer une erreur
    $msg = "Erreur lors de l'envois du formulaire";
}

// Retourner $msg et $status au format json
/*
    - Indiquer au navigateur que le script retourne un format JSON
    - Convertir et afficher un tableau PHP en json
*/
header('Content-Type: application/json');

echo json_encode([
    'msg' => $msg,
    'status' => $status,
], JSON_PRETTY_PRINT);
