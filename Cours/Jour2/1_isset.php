<?php
/*
 isset() permet de savoir si une variable a été initialisée
*/

if (isset($undef)) {
    echo 'Existe pas';
}

if (!isset($undef)) { // ! => négation
    echo 'N\'existe pas';
}
echo '<hr/>';

$user = [
    'username' => 'moi',
    'email' => 'moi@remoi.fr',
];

// echo $user['password']; // Erreur: l'index 'password' n'existe pas !

if (!isset($user['password'])) {
    echo 'Erreur: vous devez entrer un mot de passe';
}

// Ne pas confondre isset avec is_null ($val == null)
echo '<br/>';

/*
 La fonction empty retourne vrai si une variable a été déclarée mais pas initialisée
 - OU une variable initialisée MAIS vide (0, chaine vide '', false, null)
 */
$estVide;

if (empty($estVide)) {
    echo 'Valeur non initialisée ou vide';
}

echo '<br/>';

$chaineVide = '';
if (empty($chaineVide)) {
    echo 'ERREUR: la chaine est vide';
}
