<?php

// Création d'un objet PDO
$pdo = new PDO('mysql:host=localhost;dbname=wf3_test', 'root', '', [PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC]);
$pdo->exec('SET CHARACTER SET utf8');
//var_dump($pdo->errorInfo()); // Affiche les erreurs PDO

function addTask($content)
{
    global $pdo;

    $request = $pdo->prepare('INSERT INTO task (content, date_create) 
    VALUES (:content, CURRENT_DATE())');

    $request->bindValue(':content', $content);

    return $request->execute();

    // var_dump($request->errorInfo());
}

function getAllTasks()
{
    global $pdo;
    $request = $pdo->query('SELECT * FROM task');

    return $request->fetchAll();
}

/**
 * Modifie une tâche en mettant checked à 1.
 */
function checkTask($id)
{
    // UPDATE task SET checked = 1 WHERE id = :id
    global $pdo;
    $request = $pdo->prepare('UPDATE task SET checked = 1 WHERE id = :id');
    $request->bindValue(':id', $id, PDO::PARAM_INT);

    return $request->execute();
}

/**
 * Recherche une tâche.
 */
function searchTasks($search)
{
    global $pdo;
    $request = $pdo->prepare('SELECT * FROM task WHERE content LIKE :search');
    $request->bindValue(':search', '%'.$search.'%');
    $request->execute();

    return $request->fetchAll();
}
