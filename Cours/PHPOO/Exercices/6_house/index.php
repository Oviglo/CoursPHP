<?php

/*
    ETAPE 1

    Ecrire une classe Room avec les propriétés privées suivantes
    - area (superficie en m²)
    - windowCount (nombre de fenêtre)

    Ecrire le constructeur qui demande ces 2 paramètres (windowCount par défaut à 0)
*/
spl_autoload_register();

$room = new Room(15, 1);
echo $room->getArea();

/*
    ETAPE 2

    Ecrire une classe Bedroom qui étend (hérite) de Room avec un paramètre en plus: bedType qui doit être soit 'simple' ou 'double'
    (utiliser des constantes BED_TYPE_SIMPLE et BED_TYPE_DOUBLE)
    - Surcharger le constructeur pour y ajouter un type de lit (par défaut: lit simple)
*/
$bedroom = new Bedroom(12, 1, Bedroom::BED_TYPE_DOUBLE);
echo $bedroom->getBedType();

/*
    ETAPE 3

    - Definir les propriétés de Room en protected
    - Ecrire les méthodes magique __toString qui va retourner les informations des pièces
        "Pièce de 15m² avec 1 fenêtre(s)"
        "Chambre de 12m² avec 1 fenêtre(s) et un lit double"
 */
echo '<hr/>';
echo $bedroom;
