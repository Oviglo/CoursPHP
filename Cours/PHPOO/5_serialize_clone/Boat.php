<?php

class Boat
{
    private $name;
    private $roomNb;
    private $voyagers = [];

    /**
     * Get the value of name.
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set the value of name.
     *
     * @return self
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get the value of roomNb.
     */
    public function getRoomNb()
    {
        return $this->roomNb;
    }

    /**
     * Set the value of roomNb.
     *
     * @return self
     */
    public function setRoomNb($roomNb)
    {
        $this->roomNb = $roomNb;

        return $this;
    }

    /**
     * Get the value of voyagers.
     */
    public function getVoyagers()
    {
        return $this->voyagers;
    }

    /**
     * Set the value of voyagers.
     *
     * @return self
     */
    public function setVoyagers($voyagers)
    {
        $this->voyagers = $voyagers;

        return $this;
    }

    // Methode dite magique
    public function __clone()
    {
        //echo "Clonage de l'objet";
        // On clone tous les objet Voyagers
        foreach ($this->voyagers as $key => $v) {
            $this->voyagers[$key] = clone $v;
        }

        // Ou par référence
        /*foreach ($this->voyagers as &$v) {
            $v = clone $v;
        }*/
    }
}
