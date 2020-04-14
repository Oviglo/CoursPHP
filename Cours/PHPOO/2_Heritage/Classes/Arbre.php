<?php

class Arbre
{
    // protected permet l'accés de ces propriétés dans les classes qui étendent de celle-ci
    protected $nom;
    protected $taille = 100; // valeur par défaut

    public function __construct($nom)
    {
        $this->setNom($nom);
    }

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
        $this->nom = trim($nom);

        return $this;
    }

    /**
     * Get the value of taille.
     */
    public function getTaille()
    {
        return $this->taille;
    }

    /**
     * Set the value of taille.
     *
     * @return self
     */
    public function setTaille($taille)
    {
        $this->taille = $taille;

        return $this;
    }

    public function toString()
    {
        return 'Arbre '.$this->nom;
    }
}
