<?php
/*
Il est possible de créer une valeur qui ne va jamais changer
on déclare une constante en utilisant la fonction define('NOM', "valeur");
Une constante ne commance pas par $
Le nom doit être en majuscule et ne doit pas commencer par un chiffre
*/
define('PI', 3.14159265359);

echo 2 * PI;

/*
Il existe des constantes proposées dans PHP qu'on appelle les constantes magiques
Elles commencent et finissent par '__'
*/
echo 'Le lien du fichier est '.__DIR__;
