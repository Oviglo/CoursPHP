<?php

require_once 'Outil.php';

class Scie extends Outil
{
    /**
     * @var string
     */
    private $type = self::TYPE_BOIS;

    const TYPE_METAUX = 'metaux';
    const TYPE_BOIS = 'bois';

    /**
     * Get the value of type.
     *
     * @return string
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * Set the value of type.
     *
     * @param string $type
     *
     * @return self
     */
    public function setType(string $type)
    {
        if (self::TYPE_BOIS != $type && self::TYPE_METAUX != $type) {
            trigger_error('Type inconnu', E_USER_ERROR);
        }
        $this->type = $type;

        return $this;
    }

    public function toString()
    {
        return parent::toString()." ($this->type)";
    }
}
