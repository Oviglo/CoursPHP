<?php

require_once 'AbstractForme.php';
require_once 'InterfaceDessin.php';

// Cette classe hérite (étends) de AbstractForme et implémente à la fois InterfaceDessin
class Cercle extends AbstractForme implements InterfaceDessin
{
    private $rayon;

    const PI = 3.14;

    public function __construct(int $rayon)
    {
        $this->rayon = $rayon;
    }

    public function getPerimetre()
    {
        return 2 * self::PI * $this->rayon;
    }

    public function dessiner()
    {
        return '<div style="display:block; width:'.($this->rayon * 2).'px;height:'.($this->rayon * 2).'px;border-radius: 100%; border: solid red 2px"></div>';
    }
}
