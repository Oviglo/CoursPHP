<?php

/*
    Ecrire une classe abstraite "AbstractFruit" avec la propriété nom (faire les getter setters) et une méthode abstraite getInfos
    Ecrire une classe Banane qui va étendre de AbstractFruit et qui contient une propriété couleur (verte ou jaune)
    Banane a un constructeur avec le nom et la couleur en paramètre

    Dans index.php créer une banane et afficher les infos
*/

require_once 'Banane.php';

$banane = new Banane('Banane', 'verte');
//$banane->setCouleur('verte');

echo $banane->getInfos();
