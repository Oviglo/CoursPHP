<?php

abstract class AbstractForme
{
    protected $posX = 0;
    protected $posY = 0;

    // Methode abstraire: tous les enfants devrons définir cette méthode
    abstract public function getPerimetre();

    /**
     * Get the value of posX.
     */
    public function getPosX()
    {
        return $this->posX;
    }

    /**
     * Set the value of posX.
     *
     * @return self
     */
    public function setPosX($posX)
    {
        $this->posX = $posX;

        return $this;
    }

    /**
     * Get the value of posY.
     */
    public function getPosY()
    {
        return $this->posY;
    }

    /**
     * Set the value of posY.
     *
     * @return self
     */
    public function setPosY($posY)
    {
        $this->posY = $posY;

        return $this;
    }
}
