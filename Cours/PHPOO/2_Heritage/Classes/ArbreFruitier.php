<?php

require_once 'Arbre.php';

/*
Classe qui étends de la classe Arbre
*/
class ArbreFruitier extends Arbre
{
    /**
     * @var int
     */
    private $nbFruits = 0;

    // Surcharge du contructeur
    public function __construct($nom, $nbFruits = 10)
    {
        $this->setNbFruits($nbFruits);

        // Appelle le constructeur de Arbre (parent)
        parent::__construct($nom);

        //$this->__construct($nom); // Erreur car la fonction s'appelle elle-même (boucle infinie)
    }

    /**
     * Get the value of nbFruits.
     *
     * @return int
     */
    public function getNbFruits()
    {
        return $this->nbFruits;
    }

    /**
     * Set the value of nbFruits.
     *
     * @param int $nbFruits
     *
     * @return self
     */
    public function setNbFruits(int $nbFruits)
    {
        $this->nbFruits = $nbFruits;

        return $this;
    }

    // Surchage de la fonction toString qui est définie dans Arbre
    public function toString()
    {
        //return $this->nom.' avec '.$this->nbFruits.' fruit(s)';
        return parent::toString().' avec '.$this->nbFruits.' fruit(s)';
    }
}
