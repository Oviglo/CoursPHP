<?php
/*
    Référence de variable
*/

$monTableau = ['A', 'B', 'C'];

var_dump($monTableau);

// PHP crée un copie du la valeur envoyée
function viderTableau($tableauAVider)
{
    $tableauAVider = [];
}

function viderTableauRef(&$tableauAVider)
{
    $tableauAVider = [];
}

viderTableau($monTableau);

var_dump($monTableau);

viderTableauRef($monTableau);

var_dump($monTableau);

/*
cookie
Des valeur qui vont être sauvegarder jusqu'a une date définie
*/
setcookie('resterconnecte', mktime(0, 0, 0, 7, 14, 2020)); // Cookie qui sera supprimée le 14 juillet 2020

/*
écriture dans des fichiers
 -file_put_content
 -file_get_content
*/
$file = 'fichier.txt';
file_put_contents($file, 'HELLO');
