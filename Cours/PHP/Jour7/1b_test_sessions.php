<?php

session_start();

// Teste si la session "name" existe
if (isset($_SESSION['name'])) {
    // On affiche la session qui a été définie dans le script 1_sessions.php
    echo 'Hello '.$_SESSION['name'];
}

session_unset(); // vide le tableau
