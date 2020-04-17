<?php

class Bedroom extends Room
{
    /**
     * @var string
     */
    private $bedType;

    const BED_TYPE_SIMPLE = 'simple';
    const BED_TYPE_DOUBLE = 'double';

    public function __construct(float $area, int $windowCount = 0, string $bedType = self::BED_TYPE_SIMPLE)
    {
        $this->setBedType($bedType);

        parent::__construct($area, $windowCount);
    }

    /**
     * Get the value of bedType.
     *
     * @return string
     */
    public function getBedType()
    {
        return $this->bedType;
    }

    /**
     * Set the value of bedType.
     *
     * @param string $bedType
     *
     * @return self
     */
    public function setBedType(string $bedType)
    {
        if (in_array($bedType, [self::BED_TYPE_DOUBLE, self::BED_TYPE_SIMPLE])) {
            $this->bedType = $bedType;
        }

        return $this;
    }

    public function __toString()
    {
        return "Chambre de {$this->area}m² avec $this->windowCount fenêtre(s) et un lit $this->bedType";
    }
}
