<?php

require_once 'AbstractFruit.php';

// final indique que cette class ne peut pas être héritée
final class Banane extends AbstractFruit
{
    private $couleur;

    public function __construct($nom, $couleur)
    {
        $this->setNom($nom);
        $this->setCouleur($couleur);
    }

    /**
     * Get the value of couleur.
     */
    public function getCouleur()
    {
        return $this->couleur;
    }

    /**
     * Set the value of couleur.
     *
     * @return self
     */
    public function setCouleur($couleur)
    {
        $this->couleur = $couleur;

        return $this;
    }

    public function getInfos()
    {
        return 'Banane de couleur '.$this->couleur;
    }
}
