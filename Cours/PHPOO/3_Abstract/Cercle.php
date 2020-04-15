<?php

require_once 'AbstractForme.php';

class Cercle extends AbstractForme
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
}
