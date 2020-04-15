<?php

/**
 * Classe abstraite, ne peut être instanciée.
 */
abstract class AbstractFruit
{
    // Attribut $nom en protected pour que la classe Banane puisse y accéder
    protected $nom;

    // Méthode qui ne peut pas être définie ici mais dont on a besoin pour le fonctionnement du programme
    abstract public function getInfos();

    /**
     * Get the value of nom.
     */
    public function getNom()
    {
        return $this->nom;
    }

    /**
     * Set the value of nom.
     *
     * @return self
     */
    public function setNom($nom)
    {
        $this->nom = $nom;

        return $this;
    }
}
