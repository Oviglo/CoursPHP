<?php
// Boucle for
for ($i = 1; $i <= 10; ++$i) {
    echo $i.'<br/>';
}

// boucle while
$i = 1;
while ($i <= 10) {
    echo $i.'<br/>';
    ++$i;
}

$commande = [
    'produit 1',
    'produit 2',
    'produit 3',
    'produit 4',
];

// count($commande) retourne le nombre d'éléments dans le tableau
for ($i = 0; $i < count($commande); ++$i) {
    echo $commande[$i].'<br/>';
}
echo '<hr>';
// Foreach
// Pour chaque élements du tableaux
foreach ($commande as $produit) {
    echo $produit.'<br/>';
}

$commande = [
    'produit 1' => 'DVD',
    'produit 2' => 'Jeux vidéo',
    'produit 3' => 'Livre',
    'produit 4' => 'Lego',
];
// $key = index de l'élément du tableau
foreach ($commande as $key => $produit) {
    echo $key.':'.$produit.'<br/>';
}

// Foreach jusqu'au produit 3
foreach ($commande as $key => $produit) {
    if ('DVD' == $produit) {
        continue; // On passe à l'étape suivante (sans éxecuter ce qu'il y a en dessous)
    }

    echo $key.':'.$produit.'<br/>';

    if ('produit 3' == $key) {
        break; // Arrête la boucle
    }
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>3 - Boucles</title>
</head>
<body>
    
</body>
</html>