<?php

// Obtenir une clé ici: http://www.omdbapi.com/apikey.aspx
$ombdKey = '2f1888eb';
$movieTitle = 'GhostBusters';

// Appel de l'api
$resultJson = file_get_contents("http://www.omdbapi.com/?apikey=$ombdKey&t=$movieTitle");
// transforme une chaîne content du JSON en tableau (le true en deuxième paramètre indique qu'on veut un tableau PHP)
$result = json_decode($resultJson, true);

var_dump($result);
