<?php

/*
    ETAPE 1:
    Ecrire une classe 'CoffeeCup'
    Elle aura les propriétés suivantes:
        - quantity (la quantité, en centilitres)
        - brand (la marque du café)
        - temperature (en degrée)
    Créer les getters et les setters
*/
spl_autoload_register();

$myCoffee = new CoffeeCup(25);
$myCoffee->setQuantity(20);
$myCoffee->setBrand('Malongo');
$myCoffee->setTemperature(65);

/*
    ETAPE 2:
    Créer les méthodes suivantes:
    - sip ("Siroter"). Elle acceptera un entier en paramètre, qui correspondra à la quantité qu'on veut boire
    - Quand on appelera cette méthode, le programme affichera ("Il vous reste XXX cl de café.")
*/
$myCoffee->sip(3);
$myCoffee->sip(5);

/*
    - refill (remplir la tasse): Elle n'acceptera pas de paramètre et se contentera de remplir la tasse à son niveau max (25)
    Quand on appelera cette méthode, elle affichera "La tasse est à nouveau remplie."
*/
$myCoffee->refill();
$myCoffee->sip(1);

/*
    ETAPE 3
    - Ajouter une propriété 'volume' qui défini le volume total de la tasse (getter, setter)
    - Ecrire un constructeur qui demande ce volume en paramètre
    - Modifier la méthode refill pour remplir la tasse de son volume (au lieu de 25)
*/
