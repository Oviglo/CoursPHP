<?php

class CoffeeCup
{
    /**
     * @var int
     */
    private $quantity;

    /**
     * @var string
     */
    private $brand;

    /**
     * @var int
     */
    private $temperature;

    /**
     * @var int
     */
    private $volume;

    public function __construct(int $volume)
    {
        $this->setVolume($volume);
    }

    /**
     * Get the value of quantity.
     *
     * @return ?int
     */
    public function getQuantity()
    {
        return $this->quantity;
    }

    /**
     * Set the value of quantity.
     *
     * @param ?int $quantity
     *
     * @return self
     */
    public function setQuantity(int $quantity)
    {
        $this->quantity = $quantity;

        return $this;
    }

    /**
     * Get the value of brand.
     *
     * @return ?string
     */
    public function getBrand()
    {
        return $this->brand;
    }

    /**
     * Set the value of brand.
     *
     * @param ?string $brand
     *
     * @return self
     */
    public function setBrand(?string $brand)
    {
        $this->brand = $brand;

        return $this;
    }

    /**
     * Get the value of temperature.
     *
     * @return ?int
     */
    public function getTemperature()
    {
        return $this->temperature;
    }

    /**
     * Set the value of temperature.
     *
     * @param ?int $temperature
     *
     * @return self
     */
    public function setTemperature(int $temperature)
    {
        $this->temperature = $temperature;

        return $this;
    }

    public function sip(int $drink)
    {
        $this->quantity -= $drink;

        if ($this->quantity < 0) {
            $this->quantity = 0;
        }

        // Utilisation des {} pour bien séparer les variable PHP du reste de la chaine
        echo "Il vous reste {$this->quantity}cl de café<br/>";
    }

    public function refill()
    {
        $this->quantity = $this->volume;
        // $this->setQuantity(25);

        echo 'La tasse est à nouveau remplie.<br/>';
    }

    /**
     * Get the value of volume.
     *
     * @return int
     */
    public function getVolume()
    {
        return $this->volume;
    }

    /**
     * Set the value of volume.
     *
     * @param int $volume
     *
     * @return self
     */
    public function setVolume(int $volume)
    {
        $this->volume = $volume;

        return $this;
    }
}
