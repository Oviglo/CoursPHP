<?php

/*
Le switch permet d'exécuter du code en fonction de la valeur d'une variable
*/

$status = 1;
// 1 = simple utilisateur, 2 = modérateur, 3 = admin

switch ($status) { // en fonction de $status ...
    case 1: // Quand $status = 1...
        echo 'Vous ête simple utilisateur';
    break; // Quitte le switch, sinon exécute les 'case' suivantes

    case 2: // Quand $status = 2 ...
        echo 'Vous ête modérateur';
    break;

    case 3:
        echo 'Yeah ! vous ête admin !';
    break;

    default: // Si aucune 'case' correspond
        echo 'On ne sais pas ce que vous êtes !';
}

// Autre exemple sans break;
$roles = '';

switch ($status) {
    case 3:
        $roles .= ' ADMIN'; // $roles = $roles . " ADMIN";

        // no break
    case 2:
        $roles .= ' MODO';

        // no break
    case 1:
        $roles .= ' USER';
}

echo '<br/>';
echo $roles;
