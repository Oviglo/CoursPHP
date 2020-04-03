<?php

// Création d'un objet PDO
$pdo = new PDO('mysql:host=localhost;dbname=wf3_test', 'root', '', [PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC]);
$pdo->exec('SET CHARACTER SET utf8');
//var_dump($pdo->errorInfo()); // Affiche les erreurs PDO

function addTask($content)
{
    global $pdo;

    $request = $pdo->prepare('INSERT INTO task (content, date_create) 
    VALUES (:content, CURRENT_DATE())');

    $request->bindValue(':content', $content);

    return $request->execute();
}
