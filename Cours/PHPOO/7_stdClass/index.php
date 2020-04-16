<?php

// La classes standard stdClass est une classe par défaut de PHP
// Par exemple il est possible de convertir un tableau en objet stdClass

$personne = [
    'name' => 'Asterix',
    'surname' => 'Le Gaulois',
];

$personneObj = (object) $personne;

echo $personneObj->name;
