<?php

require_once 'AbstractForme.php';
require_once 'InterfaceDessin.php';

class Carre extends AbstractForme implements InterfaceDessin
{
    private $longueur;

    public function __construct(int $longueur)
    {
        $this->longueur = $longueur;
    }

    public function getPerimetre()
    {
        return $this->longueur * 4;
    }

    public function dessiner()
    {
        return '<div style="display:block; width:'.$this->longueur.'px; height:'.$this->longueur.'px; background-color:blue"></div>';
    }
}
