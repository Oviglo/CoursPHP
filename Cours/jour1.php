<!DOCTYPE html>
<html lang="fr">
    <head>
        <title>1 - Les variables</title>
    </head>
    <body>
<?php

// Déclarer une variable
$prenom = 'Pierre';

// Nombre
$age = 31;
// nombre décimal
$taille = 1.80;

// Booléen
$estAdmin = true;

/*
 Une variable ne doit pas commencer par un chiffre
 $0var -> erreur
 Peut contenir des underscores _
 Et des caractères ASCII
 Sessible à la casse
*/

// echo => afficher
echo $prenom;

// Tableaux
// Acienne méthode
$fruits = array('pommes', 'poires', 'bananes');
// Nouvelle méthode
$fruits = ['pommes', 'poires', 'bananes'];
// Plus de visibilité
$fruits = [
    'pommes',
    'poires',
    'bananes', // virgule non indispensable à la dernière ligne
];

// saisir les index (clés)
$aliments = [
    'pomme' => 'fruit',
    'poire' => 'fruit',
    'poireau' => 'légume',
];

/*
 EN JAVASCRIPT
let tabl = ['val', 'val2'];
let obj = {
    'prenom': 'pierre',
    'nom' : 'dupond'
};
*/

$aliments = [
    'fruits' => [
        'pomme',
        'poire',
    ],
    'légumes' => [
        'poireau',
        'pomme de terre',
    ],
];

// Ajouter une valeur
$aliments[] = 'Noix de coco'; // js => push

// Afficher des variables détaillées
var_dump($aliments); // Js => console.log()

/**************
 * Opérateurs
 **************/
$a = 2;
$b = 5;
$c = 7;

// Addition
$res = $a + $b;

// Multiplication
$res = $a * $b;

// Division
$res = $b / $a;

// soustraction
$res = $a - $b;

// Modulo
$res = $b % $a; // Reste de la division

$a += 10; // revien à => $a = $a + 10;
$a *= 2;

++$a; // Incrémentation de 1 => $a = $a + 1;

echo $a;
echo '<br/>'; // Saute une ligne
echo $a++; // Affiche $a et ensuite ajoute 1 à $a
echo '<br/>';
echo $a;
echo '<br/>';
echo ++$a; // Incrémente et affiche ensuite

$b = $a++; // Mettre la valeur de $a dans $b ET ensuite va incrémenter $a

$pow = $a ** $b; // Puissance
echo '<hr/>';
// la fonction gettype() pêrmet d'afficher le type d'une variable
echo '$a est de type '.gettype($a).'<br/>';
$a = 'OK';
echo '$a est de type '.gettype($a).'<br/>';

// Autre méthode pour afficher un tableau
print_r($aliments);

?>
    </body>
</html>