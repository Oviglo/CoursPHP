<?php 

function addBooking(int $userId, int $cruiseId): array 
{
    global $pdo;
    $query = $pdo->prepare("INSERT INTO booking VALUES (:user, :cruise)");
    $query->bindValue(':user', $userId, PDO::PARAM_INT);
    $query->bindValue(':cruise', $cruiseId, PDO::PARAM_INT);

    if($query->execute()) {
        return [
            'status' => 'success', 
            'message' => "La croisière a bien été réservée"
        ];
    }

    return [
        'status' => 'error', 
        'message' => "Impossible de réserver, vous avez peut être déjà réservé cette croisière"
    ];
}

function cancelBooking(int $userId, int $cruiseId): array 
{
    global $pdo;
    $query = $pdo->prepare("DELETE FROM booking WHERE user_id = :user AND cruise_id = :cruise");
    $query->bindValue(':user', $userId, PDO::PARAM_INT);
    $query->bindValue(':cruise', $cruiseId, PDO::PARAM_INT);

    if($query->execute()) {
        return [
            'status' => 'success', 
            'message' => "La croisière a bien été annulée"
        ];
    }

    return [
        'status' => 'error', 
        'message' => "Impossible de réserver"
    ];
}

function getAllBookings()
{
    global $pdo;
    $query = $pdo->prepare("SELECT c.date_departure, c.date_arrival, c.boat, d.name, u.username 
    FROM booking AS b
    JOIN cruise AS c ON c.id = b.cruise_id 
    JOIN destination AS d ON d.id = c.destination_id
    JOIN user AS u ON u.id = b.user_id 
    ORDER BY c.id DESC
    ");

    return $query->execute()? $query->fetchAll() : [];
}