<?php

spl_autoload_register();

$pacifica = new Boat();
$pacifica->setName('Pacifica')->setRoomNb(120);
$pacifica->setVoyagers([
    new Voyager('John Smith'),
    new Voyager('Marge Simpson'),
]);

// PHP ne fait pas une copie de l'objet mais de l'identifiant
$blackPearl = $pacifica;

$blackPearl->setName('Black Pearl');

echo 'Nom du bateau pacifica: '.$pacifica->getName();

// La fonction PHP "clone" permet de créer un nouvel objet
$blackPearl = clone $pacifica;
// clone fait une foreach sur chaque propriétés et les copies avec un =
// le problème est que les propriétés contenant un objet ne sont pas clonées

// On modifie le nom du premier voyageur du bateau
$blackPearl->getVoyagers()[0]->setName('Homer Simpson');
var_dump($pacifica);
var_dump($blackPearl);
$pacifica->setName('Pacifica');

echo '<br/>';
echo 'Nom du bateau pacifica: '.$pacifica->getName().'<br/>';
echo 'Nom du bateau black Pearl: '.$blackPearl->getName();
