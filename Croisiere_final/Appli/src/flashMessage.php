<?php 

/**
 * Les messages flash sont des messages qui sont stocké dans une sessions et qui sont supprimées une fois les messages affichés
 */

function addFlashMessage($type, $message)
{
    if (!isset($_SESSION['flash'])) {
        $_SESSION['flash'] = [];
    }

    if ($type == 'error') $type = 'danger';

    $_SESSION['flash'][] = ['type' => $type, 'message' => $message];
}

function getFlashMessage()
{
    $messages = $_SESSION['flash']?? [];

    if (isset($_SESSION['flash'])) {
        unset($_SESSION['flash']);
    }
    
    return $messages;
}