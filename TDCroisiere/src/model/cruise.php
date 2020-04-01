<?php

/**
 * Recherche une croisière.
 */
function searchCruise($destinationId, $dateDeparture)
{
    // SELECT * FROM cruise WHERE date_departure >= :dateDeparture AND destination_id = :destinationId
    // Problème quand $destinationId est vide on veut toutes les croisières
    // SELECT * FROM cruise WHERE date_departure >= :dateDeparture

    // Requête avec jointure
    // SELECT c.date_departure, c.date_arrival, c.id, c.boat, d.name, d.photo FROM cruise AS c
    // JOIN destination AS d ON d.id = c.destination_id WHERE ...

    $queryStr = 'SELECT c.date_departure, c.date_arrival, c.id, c.boat, d.name, d.photo 
    FROM cruise AS c
    JOIN destination AS d ON d.id = c.destination_id 
    WHERE c.date_departure >= :dateDeparture';

    if ($destinationId > 0) { // Fait la condition seulement si la recherche est sur une destination
        $queryStr .= ' AND c.destination_id = :destinationId';
        // SELECT * FROM cruise WHERE date_departure >= :dateDeparture AND destination_id = :destinationId
    }

    global $pdo; // Charge la variable globale $pdo définie dans database.php

    $request = $pdo->prepare($queryStr);
    $request->bindValue(':dateDeparture', $dateDeparture);
    // Refaire une condition pour envoyer le paramètre ':destinationId' s'il existe
    if ($destinationId > 0) {
        $request->bindValue(':destinationId', $destinationId);
    }

    $request->execute(); // Execute la requête

    return $request->fetchAll();
}
