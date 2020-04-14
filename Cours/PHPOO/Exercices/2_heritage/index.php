<?php

/*
    Ecrire une classe Outil (Outil.php) avec une propriété protected nom et dateAchat (DateTime) avec les setters et getters
    Ecrire une classe Scie qui hérite de Outil et qui possède une propriété type (ajouter des contantes TYPE_METAUX, TYPE_BOIS)

    Ecrire une méthode toString qui retourne une chaîne contenant le nom de l'outil et le type pour une scie

    Ecrire une propriété statique $dernier qui contient le nom du dernier outil utilisé
    Ecrire une méthode statique "Utiliser" avec en paramètre un objet Outil et qui mettre son nom dans la propriété $dernier
    // https://www.php.net/manual/fr/language.oop5.static.php
*/

require_once 'Outil.php';
require_once 'Scie.php';

$outil = new Outil('Marteau', new DateTime('2010-05-25'));
var_dump($outil);

$scie = new Scie('Scie à bois');
var_dump($scie);

// Test si un objet est de type outil
if ($scie instanceof Outil) {
    echo 'Scie est bien un outil';
}

echo '<p>'.$outil->toString().'</p>';
echo '<p>'.$scie->toString().'</p>';

Outils::Utiliser($outil);
echo Outils::$dernier;
