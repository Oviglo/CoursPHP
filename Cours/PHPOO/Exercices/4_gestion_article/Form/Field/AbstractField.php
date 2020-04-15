<?php

namespace Form\Field;

abstract class AbstractField
{
    /**
     * @var string
     */
    protected $name;

    /**
     * @var string
     */
    protected $label;

    /**
     * @var array
     */
    protected $attr;

    // Fonction pour générer le code html du champ (input, select, button etc.)
    abstract public function fieldView();

    public function __construct(string $name, string $label = '', array $attr = [])
    {
        $this->setName($name);
        $this->setLabel($label);
        $this->setAttr($attr);
    }

    public function createView()
    {
        $html = '<div class="form-group">';
        // Si le label n'est pas vide on crée la balise label
        if (!empty($this->label)) {
            $html .= '<label>'.$this->label.'</label>';
        }
        // Génére le code du champ
        $html .= $this->fieldView();

        $html .= '</div>';

        return $html;
    }

    /**
     * Get the value of name.
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set the value of name.
     *
     * @param string $name
     *
     * @return self
     */
    public function setName(string $name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get the value of label.
     *
     * @return string
     */
    public function getLabel()
    {
        return $this->label;
    }

    /**
     * Set the value of label.
     *
     * @param string $label
     *
     * @return self
     */
    public function setLabel(string $label)
    {
        $this->label = $label;

        return $this;
    }

    /**
     * Get the value of attr.
     *
     * @return array
     */
    public function getAttr()
    {
        return $this->attr;
    }

    /**
     * Set the value of attr.
     *
     * @param array $attr
     *
     * @return self
     */
    public function setAttr(array $attr)
    {
        $this->attr = $attr;

        return $this;
    }
}
