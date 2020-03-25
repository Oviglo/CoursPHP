<?php

// Le scope est la portée d'une variables
// Une variable n'est pas accessible d'un script à l'autre si on n'utilise pas la fonction include ou require

/*
Une variable créée dans une fonction n'est pas accéssible à l'extérieur de cette fonction
*/
function concat($a, $b)
{
    return $a.'-'.$b;
}

// Génerera une erreur car $a est déclarée dans la fonction
// On dit que $a est locale à la fonction "concat"
// echo $a;

$myVar = 'Foo';

function getFoo()
{
    // $myVar n'est pas accessible dans une fonction
    echo $myVar;
}

// Génerera une erreur car $myVar n'est pas accessible dans une fonction
//getFoo();

/*
Il est possible d'accéder à une variable externe dans une fonction en utilisant le mot clé global
*/
$pi = 3.14;

function air($rayon)
{
    global $pi; // On utilise la variable $pi déclarée avant la fonction

    return ($rayon * $rayon) * $pi;
}

echo air(10);

/*
 PHP utilise une variables '$GLOBALS' pour gérer les valeurs globales
 On y retrouve les variables globales tel que $_POST, $_GET etc.
 On peut acceder à la variable $i déclarée avant dans avec $GLOBALS['pi']
*/
var_dump($GLOBALS);

function perimetreCercle($rayon)
{
    $pi = $GLOBALS['pi'];

    return 2 * $pi * $rayon;
}

echo '<br/>';
echo perimetreCercle(12);
