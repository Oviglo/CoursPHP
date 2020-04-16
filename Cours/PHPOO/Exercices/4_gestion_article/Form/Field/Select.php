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

    protected function fieldView()
    {
        $html = '<select class="form-control" name="'.$this->name.'">';

        foreach ($this->options as $key => $value) {
            // $isSelected seras un booléen qui indique si l'option doit être sélectionnée
            $isSelected = ($value == $this->value);

            $html .= '<option value="'.$value.'" '.($isSelected ? 'selected' : '').' >'.$key.'</option>';
        }

        $html .= '</select>';

        return $html;
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
