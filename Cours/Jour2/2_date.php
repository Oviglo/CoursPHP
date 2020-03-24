<?php

/*
    La function date($format, $timestamp) permet de formater l'affichage des dates
    - $format => format de la date sous forme de chaine
    - $timestamp => nombre de secondes écoulées depuis le 1/1/70

    http://php.net/manual/fr/function.date.php
*/
date_default_timezone_set('Europe/Paris'); // Modifie le fuseau horaire
echo 'Nous sommes le '.date('d/m/Y'); // date('d/m/Y', time());
echo '<br/>';
echo 'Date avec heure '.date('d/m/Y H i s');
echo '<br/>';
echo "il s'est accoulé ".time().' secondes depuis le 1 janvier 1970';
// time() retourne le nombre de secondes depuis le 1/1/1970

/*
    mktime retourne un timestamp correspondant aux valeurs qui lui sont envoyées

    mktime (heure, minutes, secondes, mois, jour , année);
*/
echo '<br/>';
$timestamp = mktime(12, 15, 0, 7, 14, 1889);
echo date('d/m/Y', $timestamp);
echo '<br/>';
// Combien de secondes s'est écoulé entre le début du confinement 18/03 à midi et maintenant ?
$debutConfinement = mktime(12, 0, 0, 3, 18, 2020);
echo 'On est en confinement depuis '.date('j', (time() - $debutConfinement)).' jours !';

/*
 En SQL les dates sont stockées dans une chaîne au format 'm-d-Y'
 On va utiliser l'objet DateTime
*/
echo '<br/>';
$dateDB = '13-02-2013';
$dateFormate = date_create($dateDB); // retourne un objet DateTime;
echo date_format($dateFormate, 'd/m/Y'); // formate un objet DateTime
// revient à faire:
$dateObject = new DateTime('2016-02-10');
echo $dateObject->format('d/m/Y');
echo '<br/>';
/*
strtotime transforme un texte (en anglais) en timestamp
*/
$time1 = strtotime('12 October 2014');
echo date('d/m/Y', $time1);
echo '<br/>';
echo date('d/m/Y', strtotime('+2 weeks')); // Ajoute 2 semaines à la date courante
echo '<br/>';
echo date('d/m/Y', strtotime('next Monday'));
// fonctionne aussi pour les objet DateTime
$dimancheDernier = new DateTime('last sunday'); // date_create('last sunday')
echo '<br/>';
echo $dimancheDernier->format('d/m/Y'); // date_format($dimancheDernier, 'd/m/Y');
