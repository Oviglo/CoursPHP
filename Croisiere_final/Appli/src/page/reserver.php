<?php 

if (isset($_GET['cruise_id']) && isset($_SESSION['user_id'])) {
    
    $result = addBooking($_SESSION['user_id'], $_GET['cruise_id']);
    addFlashMessage($result['status'], $result['message']);
}

header('Location: index.php');

?>