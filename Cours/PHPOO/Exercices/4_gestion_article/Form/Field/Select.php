<?php

namespace Form\Field;

class Select extends AbstractField
{
    /**
     * @var array
     */
    private $options;

    public function __construct(string $name, array $options, string $label = '', array $attr = [])
    {
        $this->setOptions($options);

        parent::__construct($name, $label, $attr);
    }

    /**
     * Get the value of options.
     *
     * @return array
     */
    public function getOptions()
    {
        return $this->options;
    }

    /**
     * Set the value of options.
     *
     * @param array $options
     *
     * @return self
     */
    public function setOptions(array $options)
    {
        $this->options = $options;

        return $this;
    }
}
