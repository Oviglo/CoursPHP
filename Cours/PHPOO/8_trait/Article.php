<?php

class Article
{
    private $tag = 'h2';

    // Similaire à un copier coller
    use NameTrait;

    public function __construct($name)
    {
        // Même si name est en private dans le trait, on peut y avoir accés
        $this->name = $name;
    }

    // Il est possible de redéfinir une méthode
    /*public function getName()
    {
        return '<h3>'.$this->name.'</h3>';
    }*/
}
