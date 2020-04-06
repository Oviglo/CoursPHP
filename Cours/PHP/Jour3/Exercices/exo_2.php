<?php

// Ecrire un fichier functions.php qui contiendra la fonction getRealString et retournera une chaine en supprimant les espaces au début et à la fin
require_once 'functions.php';

$result = getRealString('   BONJOUR   '); // Supprime les espaces
echo $result;
// getRealString('message');
