<?php

/*
    Dans une base de données un mot de passe n'est jamais entré sans être cripté

    - md5($password) non recommandé pour des mots de passe

    - password_hash($password, PASSWORD_DEFAULT) // Encode un mot de passe
    - password_verify($password, $passwordCrypt) // Test un mot de passe
*/

$password = password_hash('monMotDePasse', PASSWORD_DEFAULT);

echo $password;
echo '<br/>';
// Teste si le mot de passe correspond au mot de passe cripté (hashé)
if (password_verify('monMotDePasse', $password)) {
    echo 'Le mot de passe est correct';
}

// Autre manière
$key = 'Vive webForce 3';
$password = md5('monMotDePasse'.$key);

if (md5('passwordATester' + $key) == $password) {
}
