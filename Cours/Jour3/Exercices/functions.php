<?php

/**
 * Transforme une chaîne en retirant les espaces.
 *
 * @param string $str Chaîne a transformer
 *
 * @return string Chaîne transformée
 */
function getRealString(string $str)
{
    return trim($str);
}

/**
 * Affiche un élément html avec un utilisateur.
 *
 * @param string $nom   Nom de l'utilisateur
 * @param string $image Lien de l'image
 *
 * @return string code Html
 */
function getAccountButton(string $nom, string $image)
{
    return '<section><span>'.$nom.'</span><img src="'.$image.'" alt="avatar"></section>';
}
