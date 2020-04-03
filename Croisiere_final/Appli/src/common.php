<?php 

session_start();

function isAdmin(): bool
{
    return isset($_SESSION['user_admin']) && $_SESSION['user_admin'] == 1;
}

function checkAdmin()
{
    if (!isAdmin()) {
        addFlashMessage('error', "Vous n'avez pas les droits pour aller sur cette page");
        header('Location: index.php');
    }
}

require_once('model/database.php');
require_once('flashMessage.php');