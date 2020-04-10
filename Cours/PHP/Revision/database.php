<?php

// Création de l'objet PDO
$pdo = new PDO('mysql:host=localhost;dbname=wf3_test', 'root', '', [PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC]);
$pdo->exec('SET CHARACTER SET utf8');

function addCar($brand, $model, $description)
{
    global $pdo;
    $request = $pdo->prepare('INSERT INTO car (brand, model, description) VALUES (:brand, :model, :description)');
    $request->bindValue(':brand', $brand);
    $request->bindValue(':model', $model);
    $request->bindValue(':description', $description);

    $result = $request->execute();

    // var_dump($request->errorInfo());

    return $result;
}

function getAllCars()
{
    global $pdo;

    $request = $pdo->query('SELECT * FROM car ORDER BY id DESC');

    return $request->fetchAll();
}
