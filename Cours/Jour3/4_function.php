<?php

/*
 Tout comme en Js une fonction contient du code qui peut être appelé n'importe où dans le code

 function maFonction($argument) {
    // Code

    return ; // Non obligatoire
 }
*/

// un commantaire qui commence par '/** */' permet de documenter la fonction
/**
 * Affiche la date du jour.
 */
function echoDate()
{
    echo date('d/m/Y');
}

// On appelera la fonction comme ceci
echoDate();

/**
 * Salue un membre.
 */
function salutation($surname)
{
    echo 'Bonjour '.$surname;
}
echo '<br/>';
salutation('Albert');
echo '<br/>';
salutation('René');

/*
Si on ne met pas le bon nombre d'argument, PHP affiche une erreur
Fatal error: Uncaught ArgumentCountError: Too few arguments to function salutation(), 0 passed in 4_function.php on line 41 and exactly 1 expected in
*/
// salutation();

/**
 * Salue d'une certaine manière.
 */
function salutationPrecise($name, $mode)
{
    $message = '';

    if ('normal' == $mode) {
        $message = 'Bonjour';
    } elseif ('pirate' == $mode) {
        $message = "Hârrrr ol'";
    }

    echo $message.' '.$name;
}
echo '<br/>';
salutationPrecise('Asterix', 'normal');
echo '<br/>';
salutationPrecise('Obélix', 'pirate');

/*
Rendre des arguments non obligatoire
*/
function salutationPrecise2($name, $mode = 'normal')
{
    // même code, il est possible d'appeler une fonction dans une autre
    salutationPrecise($name, $mode);
}

echo '<br/>';
// On est ici pas obligé de renseigner la valeur $mode, elle sera à 'normal' par défaut
salutationPrecise2('Jean');

/*
Les arguments facultatifs doivent êtres placés en dernier
 function maFonction($param1, $param2 = 0, $param3) {}
 maFonction("ok", , 100); // Je dois quand même renseigner le param2 pour définir param3
*/

/**
 * Si l'utilisateur est admin.
 */
function estAdmin($roles)
{
    // Si la position de la chaine 'ADMIN' ne retourne pas false
    // strpos retourne la position de la chaine rechercher, si elle ne la trouve pas elle retourne "false"
    return false != strpos($roles, 'ADMIN');
    /*
    if (false != strpos($roles, 'ADMIN')) {
        return true;
    } else {
        return false;
    }
    */
    // le return arrête le code de la fonction (équivalent du break pour les boucles)
}

echo '<br/>';
echo estAdmin('USER,ADMIN') ? 'Vous êtes admin' : 'Vous n\'avez pas les droits';

// une fonction peut retourner une valeur de n'importe quel type
function getArray()
{
    return [
        'val1' => 'Yes',
        'val2' => 'No',
    ];
}

/*
Il est possible de typer les paramètres (version 7 de PHP )
Et de type le retour
*/
function connexion(string $username, string $password): bool
{
    // Code
    return false;
}

connexion('username', 'pass');
