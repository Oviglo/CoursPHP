<?php

/**
 * Recherche une croisière.
 */
function searchCruise($destinationId, $dateDeparture)
{
    // SELECT * FROM cruise WHERE date_departure >= :dateDeparture AND destination_id = :destinationId
    // Problème quand $destinationId est vide on veut toutes les croisières
    // SELECT * FROM cruise WHERE date_departure >= :dateDeparture

    $queryStr = 'SELECT * FROM cruise WHERE date_departure >= :dateDeparture';
    if ($destinationId > 0) {
        $queryStr .= ' AND destination_id = :destinationId';
        // SELECT * FROM cruise WHERE date_departure >= :dateDeparture AND destination_id = :destinationId
    }
}
