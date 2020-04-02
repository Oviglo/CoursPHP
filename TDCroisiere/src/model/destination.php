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

/**
 * Enregistre une destination.
 * Si id n'est pas défini: on ajoute, sinon on modifie.
 */
function saveDestination(string $name, string $description, array $photo = [], int $id = 0)
{
    $name = trim(strip_tags($name));
    $description = trim(strip_tags($description, '<p><a><strong><hr>')); // Autorise seulement les balises en paramètre

    $photoUrl = '';

    global $pdo;

    if (0 == $id) { // Ajoute une destination
        $request = $pdo->prepare('INSERT INTO destination (name, description, photo)
        VALUES (:name, :description, :photo)');
    } else { // Modifie une destination
        $request = $pdo->prepare('UPDATE destination 
        SET name = :name, description = :description, photo = :photo 
        WHERE id = :id');
        $request->bindValue(':id', $id);
    }
    // On est sûr que $request contient une requête avec les paramètres suivants
    $request->bindValue(':name', $name);
    $request->bindValue(':description', $description);
    $request->bindValue(':photo', $photoUrl);

    if ($request->execute()) { // La requête n'a pas d'erreur
        return ['type' => 'success', 'message' => 'La destination a bien été enregistrée'];
    }

    var_dump($request->errorInfo());

    return ['type' => 'error', 'message' => 'Une erreur est survenue.'];
}
