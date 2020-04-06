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
*/
/*function airRectangle($longueur, $largeur)
{
    return $longueur * $largeur;
}*/

function airRectangle($longueur, $largeur = 0)
{
    if (!$largeur) { // $largeur = 0 donc a false
        return $longueur * $longueur; // le return met fin au code de la fonction
    } 

    return $longueur * $largeur;
}

echo '<br/>AIR<br/>';
echo "L'air du rectangle 20*40 est égale à:".airRectangle(20, 40);
echo '<br/>';
echo "L'air du carré de coté 80 est égale à :".airRectangle(80);
/*

 - Ecrire la fonction getUser qui retournera un tableau avec des données (nom, prenom, email)
 - Ecrire une seconde fonction getPrenom qui va retourner le prénom envoyé par getUser (appel de getUser dans getPrenom)
 - Ecrire la fonction getInfo avec en paramètre une chaine contenant l'info demandé ("prenom", "nom" etc.) tester si elle existe
 - getInfo('prenom');
*/
echo '<br/>USER<br/>';
function getUser($nom = 'Durand', $prenom = 'Jean', $email = 'j.durand@gmail.com')
{
    return [
        'nom' => $nom,
        'prenom' => $prenom,
        'email' => $email,
    ];
}

var_dump(getUser('Uderzo'));


function getPrenom()
{
    $user = getUser();

    return $user['prenom'];

    //return getUser()['prenom'];
}

echo "Prenom: ". getPrenom();
echo '<br/>';

/*
getInfo('email') // retourne $user['email']

if (isset($user[$info])) {  }

getInfo('telephone') return $user[]
*/
function getInfo($info) // Param $info correspond à l'index du tableau demandé
{
    $user = getUser(); // $user est un tableau avec les index ('prenom', 'nom', 'email')
    // $user['email'], $user['prenom'], $user['nom']

    if (isset($user[$info])) {
        return $user[$info]; // Récupère l'élément du tableau en fonction de l'index qui se trouve dans $info
    }

    return "Inconnu";
}

/*
function getInfo($info)
{
    $user = getUser();
    // Operateur ternaire : condition? oui : non 
    return isset($user[$info])? $user[$info] : "Inconnu";
}

function getInfo($info)
{
    $user = getUser();
    // Si $user[$info] existe, on la retourne sinon on retourne "Inconnu"
    return $user[$info]?? "Inconnu";
}

function getInfo($info) 
{
    return getUser()[$info]?? "Inconnu";
}
*/

echo "Email: ".getInfo('email'); // getInfo('nom')
/*
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
