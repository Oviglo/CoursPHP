<?php

require_once '../common.php';

header('Content-Type: application/json');

if (isset($_POST['username']) && isset($_POST['password'])) {
    array_map('trim', $_POST);

    // La fonction login retourne un tableau avec un type et un message
    // On peut directement mettre ce tableau dans la fonction json_decode
    echo json_encode(login($_POST['username'], $_POST['password']), JSON_PRETTY_PRINT);
    exit();
}

echo json_encode(['type' => 'error', 'message' => "Il n'y a pas de login et mot de passe"], JSON_PRETTY_PRINT);
