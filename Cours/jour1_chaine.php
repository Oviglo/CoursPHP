<?php

$object = ' une tasse de café';
$message = 'Je voudrai '.$object.' pour bien démarrer la journée.';

// Anti slashes pour mettre une apostrophe
$message2 = 'Rien de tel qu\''.$object.' pour être en forme.';

// Double quotes
$message3 = "Rien de tel qu'".$object.' pour être en forme.';

// Inclure une variable dans une chaine à double quote
// ATTENTION: ne fonctionne pas avec des simple quotes
$message4 = "Rien de tel qu'$object pour être en forme.";

echo $message;
echo '<br/>';

// strlen($str) => Nombre de caractères
echo 'il y a '.strlen($message4).'caractères';
echo '<br/>';
echo substr($message3, 10, 20); // retourne une chaîne a partir de 10 char de longeur 20
