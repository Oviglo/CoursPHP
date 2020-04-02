<?php

/**
 * Retourne toutes les destinations.
 */
function getAllDestinations()
{
    global $pdo;

    // SELECT * FROM destination ORDER BY name
    // requête sans variable donc on utilise $pdo->query
    $request = $pdo->query('SELECT * FROM destination ORDER BY name');

    return $request->fetchAll(); // retourne tous les résultats
}

/**
 * Retourne une destination.
 */
function getOneDestination(int $id)
{
    global $pdo;

    $request = $pdo->prepare('SELECT * FROM destination WHERE id = :id');
    $request->bindValue(':id', $id, PDO::PARAM_INT);
    $request->execute();

    return $request->fetch();
}
