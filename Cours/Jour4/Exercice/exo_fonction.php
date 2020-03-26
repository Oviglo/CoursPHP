<?php

// Ecrire une fonction qui retourne le nombre de minutes depuis le premier janvier de cette année
// time() retourne le timestamp (nombre de seconde depuis le 1/1/70) courrant
// utiliser mktime(0,0,0,1,1,2020);
// round($val) arrondi une valeur
// $ajourdhui = time();
// $premierJanvier = mktime(0,0,0,1,1,2020);
// $nbSecondes = $ajourdhui - $premierJanvier;
// $nbMinutes = $nbSecondes/60;

function minuteDepuisJanvier()
{
    return round((time() - mktime(0, 0, 0, 1, 1, 2020)) / 60);
}

echo 'Nombre de minutes depuis le premier janvier :'.minuteDepuisJanvier();

// Ecrire une fonction qui retourne le nombre de minutes depuis un timestamp donnée en paramétre
function minute($timestamp)
{
    return round((time() - $timestamp) / 60);
}
$aout152010 = mktime(0, 0, 0, 8, 15, 2010);
echo '<br/>Nombre de minutes depuis le 15 aout 2010 :'.minute($aout152010);
$juin44 = mktime(0, 0, 0, 6, 18, 1944);
echo '<br/>Nombre de minutes depuis le 18 juin 1944 :'.minute($juin44);

// function count($var) { ... }
// strtolower('ok');
// function strtolower($str) {}
/*
 - Ecrire une fonction qui retourne l'aire d'un rectangle avec les deux dimensions données en paramètre
 - Modifier cette fonction avec le deuxième paramètre facultatif (=0) s'il est à 0 alors ce sera l'aire d'un carré

 - Ecrire la fonction getUser qui retournera un tableau avec des données au hasard (nom, prenom, email)
 - Ecrire une seconde fonction getPrenom qui va retourner le prénom envoyé par getUser (appel de getUser dans getPrenom)
 - Ecrire la fonction getInfo avec en paramètre une chaine contenant l'info demandé ("prenom", "nom" etc.) tester si elle existe
 - getInfo('prenom');

 - Ecrire une fonction url qui demandera un lien et un nom en paramètre et qui retournera un code html avec une balise a
 - getUrl('https://oviglo.fr', 'Lien vers ma page')
 - '<a href="https://oviglo.fr">Lien vers ma page</a>
 - Appeler cette fonction dans le code html ci dessous
*/
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Exercice fonctions</title>
</head>
<body>
    
</body>
</html>
