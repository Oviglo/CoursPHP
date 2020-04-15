<?php

require_once 'Carre.php';
require_once 'Cercle.php';

$carre = new Carre(20);
$cercle = new Cercle(12);

// La fonction demande une forme
function getFormeInfos(AbstractForme $forme)
{
    return 'Perimetre: '.$forme->getPerimetre().' cm<br/>';
}

echo getFormeInfos($carre);
echo getFormeInfos($cercle);
