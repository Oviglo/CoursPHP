<?php

/*
    - Créer une classe User (User.php) avec les propriétés privés username, password et email
    - Ecrire le constructeur qui demande ces 3 proprietés pour formater les données cripter le mot de passe
    - Créer 2 utilisateurs sur cette page
    - Ecrire une méthode publique dans l'objet User qui test le mot de passe et retourne vrai ou faux
*/

require_once 'User.php';

$asterix = new User('Asterix', 'asterix@gaules.fr', '123Azerty');
$obelix = new User('Obelix', 'lebonsanglier@taverne.fr', 'motDePasse');

// $obelix->password = "passwordClair";

var_dump($asterix);

if ($asterix->testPassword('123Azerty')) {
    echo 'Mot de passe valide';
}
