<?php

$object = ' une tasse de café';
$message = 'Je voudrai '.$object.' pour bien démarrer la journée.';

// Anti slashes pour mettre une apostrophe
$message2 = 'Rien de tel qu\''.$object.' pour être en forme.';

// Double quotes
$message3 = "Rien de tel qu'".$object.' pour être en forme.';

// Inclure une variable dans une chaine à double quote
// ATTENTION: ne fonctionne pas avec des simples quotes
$message4 = "Rien de tel qu'$object pour être en forme.";

echo $message;
echo '<br/>';

// strlen($str) => Nombre de caractères
echo 'il y a '.strlen($message4).'caractères';
echo '<br/>';
echo substr($message3, 10, 20); // retourne une chaîne a partir de 10 char de longeur 20
echo '<hr/>';
$messageMajuscule = strtoupper($message); // Met la phrase en majuscule
$messageMinuscule = strtolower($message); // Met la phrase en minuscule
$messageMajusculeMot = ucwords($message); // Met chaque première lettre des mots en majuscule
$msgMajPremiereLettre = ucfirst($message); // Met la premièere lettre en majuscule

$position = strpos($message, 'journée'); // Retourne la position de la sous chaîne journée
// Retourne false si la sous chaîne n'est pas trouvée
// if (strpos($message, 'journée')) {}

$msgThe = str_replace('café', 'thé', $message2); // Returne une chaine en remplaçant "café" par "thé" dans la chaine
echo $msgThe;

$html = '<a href="#">Clique sur mon super lien</a>';
echo '<br/>';
echo $html;
echo '<br/>';

$html2 = '<script>alert("ahah");</script>'; // ATTENTION faille XSS

echo strip_tags($html2); // Supprimer les balises html
// strip_tags($chaine, '<a><p>'); // supprime tout sauf les balises a et p
echo '<br/>';
echo htmlentities($html2); // Transforme les balises html en caractères spéciaux (affiche l'html en tant que texte)

$arrayOfString = explode(' ', $message);
var_dump($arrayOfString);

// Mot clés
$motsCles = 'php, javascript, Boostrap 4, Symfony 4';
$motsClesArray = explode(',', $motsCles); // Découpe une chaine de caractère en fonction d'un séparateur (ici ','), retourne un tableau avec chaques parties
var_dump($motsClesArray);

trim('    HELLO    '); // retourne la chaine sans les espaces au début et à la fin

$nouveauxMots = implode(',', $motsClesArray); // inverse d'explode, transforme un tableau en chaine

$avecSlashes = addslashes($message2); // Ajoute des caractère d'échappement '\' devant les apostrophes
echo $avecSlashes;

stripslashes($message); // retire les '\'
