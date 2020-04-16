<?php

trait NameTrait
{
    private $name;

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

    public function formatName()
    {
        return '<'.$this->tag.'>'.$this->name.'</'.$this->tag.'>';
    }
}
