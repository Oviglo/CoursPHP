<?php

class Outil
{
    /**
     * @var string
     */
    protected $nom;

    /**
     * @var DateTime
     */
    protected $dateAchat;

    public function __construct($nom, DateTime $dateAchat = null)
    {
        $this->setNom($nom);
        $this->setDateAchat($dateAchat ?? new DateTime());
    }

    /**
     * Get the value of nom.
     *
     * @return string
     */
    public function getNom()
    {
        return $this->nom;
    }

    /**
     * Set the value of nom.
     *
     * @param string $nom
     *
     * @return self
     */
    public function setNom(string $nom)
    {
        $this->nom = $nom;

        return $this;
    }

    /**
     * Get the value of dateAchat.
     *
     * @return DateTime
     */
    public function getDateAchat()
    {
        return $this->dateAchat;
    }

    /**
     * Set the value of dateAchat.
     *
     * @param DateTime $dateAchat
     *
     * @return self
     */
    public function setDateAchat(DateTime $dateAchat)
    {
        $this->dateAchat = $dateAchat;

        return $this;
    }

    public function toString()
    {
        return 'Outil '.$this->nom;
    }
}
