<?php

class Math
{
    private $valeur1;
    private $valeur2;

    public function division()
    {
        return $this->valeur1 / $this->valeur2;
    }

    /**
     * Get the value of valeur1.
     */
    public function getValeur1()
    {
        return $this->valeur1;
    }

    /**
     * Set the value of valeur1.
     *
     * @return self
     */
    public function setValeur1(int $valeur1)
    {
        $this->valeur1 = $valeur1;

        return $this;
    }

    /**
     * Get the value of valeur2.
     */
    public function getValeur2()
    {
        return $this->valeur2;
    }

    /**
     * Set the value of valeur2.
     *
     * @return self
     */
    public function setValeur2(int $valeur2)
    {
        $this->valeur2 = 0 == $valeur2 ? 1 : $valeur2;

        return $this;
    }
}
