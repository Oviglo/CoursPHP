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
 *
 * @param int $id Id de la destination
 *
 * @return array
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
function saveDestination(string $name, string $description, array $photo = [], int $id = 0, string $oldPhotoUrl = null)
{
    $name = trim(strip_tags($name));
    $description = trim(strip_tags($description, '<p><a><strong><hr>')); // Autorise seulement les balises en paramètre

    /*
    - Une fichier n'est envoyé depuis un formulaire seulement si la balise form contient l'attribut enctype="multipart/form-data"
    - Une fois le formulaire envoyé, le fichier est stocké dans un dossier temporaire de php
    - On récupère les informations de ces fichiers dans la superglobale $_FILES
    - $_FILES va contenir le chemin temporaire du fichier
    - Si le fichier est valide (le bon type de fichier), on déplace le fichier dans notre application
    $_FILES['photo']['name']: Nom du fichier envoyé (nom original)
    $_FILES['photo']['type']: Le type du fichier (exemple: image/png)
    $_FILES['photo']['size']: La taille du fichier en octets
    $_FILES['photo']['tmp_name']: Le nom temporaire du fichier chargé sur le serveur
    $_FILES['photo']['error']: Eventuelle erreur

    */
    $photoUrl = $oldPhotoUrl;
    if (UPLOAD_ERR_OK == $_FILES['photo']['error']) { // Il y a pas eu une erreur lors de l'envoi du fichier
        // Met le lien de la photo pour l'enregistrer dans la base de données
        // uniqid généré une chaine aléatoire
        $photoUrl = 'uploads/'.uniqid().$_FILES['photo']['name'];
    }

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
        // Si la variable $photoUrl n'est pas la même que $oldPhotoUrl
        if ($photoUrl != $oldPhotoUrl) {
            // Si l'ancienne photo existe
            if (file_exists($oldPhotoUrl)) {
                unlink($oldPhotoUrl); // Supprime l'ancienne photo
            }
            // On déplace le fichier temporaire dans le lien généré "uploads/nom_du_fichier"
            move_uploaded_file($_FILES['photo']['tmp_name'], $photoUrl);
            // copy();
        }

        return ['type' => 'success', 'message' => 'La destination a bien été enregistrée'];
    }

    var_dump($request->errorInfo());

    return ['type' => 'error', 'message' => 'Une erreur est survenue.'];
}
