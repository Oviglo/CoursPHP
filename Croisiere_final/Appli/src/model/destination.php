<?php

function getAllDestinations(): array
{
    global $pdo;
    $query = $pdo->prepare("SELECT * FROM destination ORDER BY name");

    return $query->execute()? $query->fetchAll() : [];
}

function getDestination(int $id): array
{
    global $pdo;
    $query = $pdo->prepare("SELECT * FROM destination WHERE id = :id");
    $query->bindValue(':id', $id, PDO::PARAM_INT);
    $query->execute();
    if ($result = $query->fetch()) {
        return $result;
    }

    return ['id' => 0, 'name' => '', 'photo' => '', 'description' => ''];
}

function editDestination(string $name, string $description, array $photo = [], $id = 0)
{
    $description = trim(strip_tags($description));
    $name = trim(strip_tags($name));
    
    global $pdo;
    $query = $pdo->prepare("SELECT photo FROM destination WHERE id = :id");
    $query->bindValue(':id', $id, PDO::PARAM_INT);
    $query->execute();
    $oldPhoto = ($query->fetch())['photo'];

    // Genere un nom de photo
    $photoName = (isset($photo['name'])&& $photo['name'] != "") ? ("uploads/" . uniqid() . $photo['name']) : $oldPhoto;
    if ($id == 0) {
        $query = $pdo->prepare("INSERT INTO destination (name, photo, description) VALUES (:name, :photo, :description)");
    } else {
        $query = $pdo->prepare("UPDATE destination SET name= :name, description=:description, photo = :photo WHERE id = :id");
        $query->bindValue(':id', $id, PDO::PARAM_INT);
    }
    
    $query->bindValue(':name', $name, PDO::PARAM_STR);
    $query->bindValue(':description', $description, PDO::PARAM_STR);
    $query->bindValue(':photo', $photoName, PDO::PARAM_STR);

    if($query->execute())
    {
        if ($oldPhoto != $photoName) {
            // Supprime l'ancienne photo
            if (file_exists($oldPhoto)) {
                rmdir($oldPhoto);
            }
            // Upload de la photo
            if( !empty($photo['name']) ) {
                copy($photo['tmp_name'], $photoName);
            }
        }

        return [
            'status' => 'succcess', 
            'message' => "La destination à bien été editée"
        ];
    }
}

function getDestinationWithPhoto()
{
    global $pdo;
    $query = $pdo->prepare("SELECT * FROM destination WHERE photo IS NOT NULL ORDER BY name");

    return $query->execute()? $query->fetchAll() : [];
}

function deleteDestination(int $id): array
{
    global $pdo;
    $query = $pdo->prepare("DELETE FROM destination WHERE id = :id");
    $query->bindValue(':id', $id, PDO::PARAM_INT);
    if ($query->execute()) {
        return [
            'status' => 'success', 
            'message' => "La destination à bien été supprimée"
        ];
    }

    return [
        'status' => 'error', 
        'message' => "Une erreure est survenue"
    ];
}