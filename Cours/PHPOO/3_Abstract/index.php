<?php

require_once 'Carre.php';
require_once 'Cercle.php';
require_once 'Image.php';

$carre = new Carre(120);
$cercle = new Cercle(50);

// La fonction demande une forme
function getFormeInfos(AbstractForme $forme)
{
    return 'Perimetre: '.$forme->getPerimetre().' cm<br/>';
}

$img = new Image('https://picsum.photos/200');

function afficher(InterfaceDessin $obj)
{
    echo $obj->dessiner();
}

echo getFormeInfos($carre);
echo getFormeInfos($cercle);

afficher($img);
afficher($carre);
afficher($cercle);
