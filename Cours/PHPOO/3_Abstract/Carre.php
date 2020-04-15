<?php

require_once 'AbstractForme.php';

class Carre extends AbstractForme
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
}
