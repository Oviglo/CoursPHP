<?php

spl_autoload_register();

$boat = new Boat();
$boat->setName('Pacifica')->setRoomNb(120);

// transforme l'objet en chaîne
$boatStr = serialize($boat);

echo $boatStr;

// Transforme la chaîne en objet
$boat2 = unserialize($boatStr);

var_dump($boat2);
echo $boat2->getRoomNb();

// Php serialize automatiquement un objet lorsqu'on le met dans une session
session_start();

if (!isset($_SESSION['boat'])) {
    $_SESSION['boat'] = $boat;
    // $_SESSION['boat'] = serialize($boat);
}

// Quand on lit une session avec un objet serialize, PHP unserialize automatiquement
var_dump($_SESSION['boat']);
