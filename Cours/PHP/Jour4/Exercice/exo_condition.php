<?php

$estValide = true;
$categorie = 'PhoToshoP';
$score = 10;

// A partir de ces 3 variables écrire les conditions suivantes:
// Si $estValide est à true alors on affiche "L'article est valide"
if ($estValide) { // $estValide est un booléen, ont peut le mettre directement dans la condition
    echo "L'article est valide<br/>";
}

// Si $estValide est à true ET $categorie est à "PHP" on affiche "Article PHP valide"
/*if ($estValide) {
    if ('PHP' == $categorie) {
        echo 'Article PHP valide<br/>';
    }
}*/
if ($estValide && 'PHP' == $categorie) { // AND
    echo 'Article PHP valide<br/>';
}

// Afficher le score s'il est supérieur à 5 ET si la catégorie est différente de "Javascript"
if ($score > 5 && 'Javascript' != $categorie) { // $categorie !== "Javascript" test également le type de données
    echo $score.'<br/>';
}

// Test avec type de données
// Convertit la chaîne en entier avant de tester
if (1 == '1') {
    echo 'PAREIL';
}
// === strictement égal, test également le type ( entier VS chaine => condition fausse)
if (1 === '1') {
    echo 'PAREIL';
}
echo '<br/>';

// Afficher un message "Catégorie programmation" si la catégorie est égale à PHP ou Javascript
// Sinon si la catégories est égale à "Photoshop", afficher "Catégorie infographie"
// Utiliser strtolower($categorie) pour valider "Javascript", "JAVAScript" ...
if ('PHP' == $categorie || 'Javascript' == $categorie) { // or
    echo 'Catégorie programmation <br/>';
} elseif ('photoshop' == strtolower($categorie)) {
    echo 'Catégorie infograhpie<br/>';
} else {
    echo 'Autre catégorie';
}

// in_array() // Retourne vrai si un élément est dans un tableau
$catArray = ['PHP', 'Javascript'];
if (in_array($categorie, $catArray)) {
    echo 'Catégorie programmation <br/>';
}

/*

if ($cdn1 || $cdn2 && $cdn3) {}
Est la même chose que
if ($cdn1 || ($cdn2 && $cdn3)) {}
*/
