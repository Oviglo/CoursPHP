<?php

function searchCruise($date, $destinationId = 0): array
{
    global $pdo;
    $queryStr = 'SELECT c.id, c.date_departure, c.date_arrival, d.name, d.photo, c.boat FROM cruise AS c JOIN destination AS d ON d.id = c.destination_id WHERE date_departure >= :date ';
    if (0 != $destinationId) {
        $queryStr .= 'AND c.destination_id = :dest';
    }

    $query = $pdo->prepare($queryStr);
    $query->bindValue(':date', $date);
    if (0 != $destinationId) {
        $query->bindValue(':dest', $destinationId);
    }

    return $query->execute() ? $query->fetchAll() : [];
}

function getAllCruises()
{
    global $pdo;
    $query = $pdo->prepare("SELECT c.id, c.date_departure, c.date_arrival, c.boat, d.name, COUNT(b.cruise_id) AS 'books' 
    FROM cruise AS c 
    JOIN destination AS d ON d.id = c.destination_id
    LEFT JOIN booking AS b ON b.cruise_id = c.id
    GROUP BY c.id
    ORDER BY c.date_departure ASC");

    return $query->execute() ? $query->fetchAll() : [];
}

function getNextCruises()
{
    global $pdo;
    $query = $pdo->prepare("SELECT c.id, c.date_departure, c.date_arrival, c.boat, d.name, COUNT(b.cruise_id) AS 'books' 
    FROM cruise AS c 
    JOIN destination AS d ON d.id = c.destination_id
    LEFT JOIN booking AS b ON b.cruise_id = c.id
    WHERE c.date_departure > CURRENT_DATE()
    GROUP BY c.id
    ORDER BY c.date_departure ASC");

    return $query->execute() ? $query->fetchAll() : [];
}

function getCruiseByUser(int $userId): array
{
    global $pdo;
    $query = $pdo->prepare('
    SELECT c.id, c.date_departure, c.date_arrival, c.boat, d.name 
    FROM booking AS b
    JOIN cruise AS c ON c.id = b.cruise_id
    JOIN destination AS d ON d.id = c.destination_id 
    WHERE b.user_id = :userId');

    $query->bindValue(':userId', $userId);

    return $query->execute() ? $query->fetchAll() : [];
}

function editCruise(string $destinationId, string $dateDeparture, string $dateArrival, string $boat, $id = 0)
{
    global $pdo;

    if (0 == $id) {
        $query = $pdo->prepare('INSERT INTO destination (destination_id, date_departure, date_arrival, boat) VALUES (:destinationId, :dateDeparture, :dateArrival, :boat)');
    } else {
        $query = $pdo->prepare('UPDATE destination SET destination_id= :destinationId, date_departure=:dateDeparture, date_arrival = :dateArrival, boat = :boat WHERE id = :id');
        $query->bindValue(':id', $id, PDO::PARAM_INT);
    }

    $query->bindValue(':destinationId', $destinationId, PDO::PARAM_STR);
    $query->bindValue(':dateDeparture', $dateDeparture, PDO::PARAM_STR);
    $query->bindValue(':dateArrival', $dateArrival, PDO::PARAM_STR);
    $query->bindValue(':boat', $boat, PDO::PARAM_STR);

    if ($query->execute()) {
        return [
            'status' => 'succcess',
            'message' => 'La croisière à bien été editée',
        ];
    }
}

function getCruise(int $id): array
{
    global $pdo;
    $query = $pdo->prepare('SELECT c.*, d.name, d.photo FROM cruise AS c JOIN destination AS d ON d.id = c.destination_id WHERE c.id = :id ');
    $query->bindValue(':id', $id, PDO::PARAM_INT);
    $query->execute();
    if ($result = $query->fetch()) {
        return $result;
    }

    return ['id' => 0, 'destination_id' => 0, 'date_departure' => date('Y-m-d'), 'date_arrival' => date('Y-m-d'), 'boat' => '', 'name' => '', 'photo' => ''];
}

function deleteCruise(int $id): array
{
    global $pdo;
    $query = $pdo->prepare('DELETE FROM cruise WHERE id = :id');
    $query->bindValue(':id', $id, PDO::PARAM_INT);
    if ($query->execute()) {
        return [
            'status' => 'success',
            'message' => 'La croisière à bien été supprimée',
        ];
    }

    return [
        'status' => 'error',
        'message' => 'Une erreur est survenue',
    ];
}
