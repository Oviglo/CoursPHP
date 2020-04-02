<?php

/*
Gestion des messages "flash"
Stock des messages dans une session pour l'afficher sur une autre page (après une redirection)
Une fois les messages lus, ils sont supprimés de la session
*/

/**
 * Ajoute un message flash.
 */
function addFlashMessage(string $type, string $message)
{
    // Test si $_SESSION['flash'] n'existe pas
    if (!isset($_SESSION['flash'])) {
        $_SESSION['flash'] = [];
    }

    // Ajout du message dans la session
    $_SESSION['flash'][] = ['type' => $type, 'message' => $message];
}

/**
 * Retourne les messages.
 */
function getFlashMessage()
{
    // Test si $_SESSION['flash'] existe
    if (isset($_SESSION['flash'])) {
        $messages = $_SESSION['flash']; // stocks les messages dans une variables
        unset($_SESSION['flash']); // Vide la session 'flash'

        return $messages; // Retourne les messages
    }

    return []; // Tableau vide pour dire qu'on a pas de messages
}
