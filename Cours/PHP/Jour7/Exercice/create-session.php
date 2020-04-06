<?php
/*
    Créer deux pages :

    `create-session.php`
        La page initialisera une variable de session 'viewed' à true;

    `get-viewed.php`
        La page affichera un message 'Vous avez visité la page
        create-session', si la variable 'viewed' est attribuée.

        Sinon, elle affichera le message 'Vous n'avez pas visité
        la page create-session'

    */
session_start();
$_SESSION['viewed'] = true;
