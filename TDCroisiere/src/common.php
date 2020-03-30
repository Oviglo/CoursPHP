<?php

session_start();

function isAdmin(): bool
{
    return isset($_SESSION['user_admin']) && 1 == $_SESSION['user_admin'];
}

function checkAdmin()
{
    if (!isAdmin()) {
        header('Location: index.php');
    }
}

require_once 'model/database.php';
