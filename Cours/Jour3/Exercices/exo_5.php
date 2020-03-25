<?php
/*
1. Créez une fonction `elementsInCustomTags` qui
retourne chacun des éléments d'un tableau passé en
paramètre, dans un élément HTML dont le type est passé
en paramètre.

On appelera cette fonction comme ceci :

$elements = ['poissons', 'oiseaux', 'dinosaures'];
echo elementsInCustomTags($elements, 'p');

-> Cet appel devrait afficher trois paragraphes,
dont chacun contiendra un élément du tableau $elements


2. Modifiez cette fonction pour que, si le tag HTML
n'est pas spécifié, les variables s'affichent dans
un élément <div>.

BONUS vous pouvez tester si la balise demandée est valide
in_array($tags, ['p', 'div'])
Retourne vrai si $tags est dans un élément du tableau

*/
?>
<!-- 
    <p>Poissons</p>
    <p>Oiseaux</p>
    ...
-->