<?php

class Room
{
    /**
     * @var float
     */
    protected $area;

    /**
     * @var int
     */
    protected $windowCount;

    public function __construct(float $area, int $windowCount = 0)
    {
        $this->setArea($area);
        $this->setWindowCount($windowCount);
    }

    /**
     * Get the value of area.
     *
     * @return float
     */
    public function getArea()
    {
        return $this->area;
    }

    /**
     * Set the value of area.
     *
     * @param float $area
     *
     * @return self
     */
    public function setArea(float $area)
    {
        $this->area = $area;

        return $this;
    }

    /**
     * Get the value of windowCount.
     *
     * @return int
     */
    public function getWindowCount()
    {
        return $this->windowCount;
    }

    /**
     * Set the value of windowCount.
     *
     * @param int $windowCount
     *
     * @return self
     */
    public function setWindowCount(int $windowCount)
    {
        $this->windowCount = $windowCount;

        return $this;
    }

    public function __toString()
    {
        return "Pièce de {$this->area}m² avec $this->windowCount fenêtre(s)";
    }
}
