<?php

require_once 'Classes/Arbre.php';
require_once 'Classes/ArbreFruitier.php';

$bouleau = new Arbre('Bouleau');

var_dump($bouleau);
echo '<p>'.$bouleau->toString().'</p>';

$pommier = new ArbreFruitier('Pommier');
$pommier->setNbFruits(12);
var_dump($pommier);
// Le fonction toString est accessible via la classe Arbre
echo '<p>'.$pommier->toString().'</p>';
