<?php

session_start(); // Crée le tableau $_SESSION

// test si $_SESSION['viewed'] existe ET $_SESSION['viewed'] est vrai
if (isset($_SESSION['viewed']) && true === $_SESSION['viewed']) {
    echo 'Vous avez visité la page create-session';
} else {
    echo "Vous n'avez pas visité la page create-session";
}
