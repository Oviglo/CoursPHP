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

/**
 * Retourne une liste html à partir d'un tableau.
 *
 * @param array $items éléments du menu
 *
 * @return string code html de la liste
 */
function getListMenu(array $items) // array devant un paramètre indique qu'on demande un tableau et pas autre chose
{
    // <ul> foreach <li></li> fin de foreach </ul>
    $html = '<ul>';
    // Items (boucle)
    foreach ($items as $item => $url) {
        $html .= '<li><a href="'.$url.'">'.$item.'</a></li>'; // Ajoute les balises li à l'html
    }

    $html .= '</ul>'; // $html = $html . '</ul>';

    return $html;
}
