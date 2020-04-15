<?php

namespace Form;

use Form\Field\AbstractField;

class Form
{
    /**
     * @var string
     */
    private $name;

    /**
     * @var string
     */
    private $action;

    /**
     * @var array
     */
    private $fields = [];

    public function __construct(string $name, string $action = '')
    {
        $this->setName($name);
        $this->setAction($action);
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
        $this->name = trim($name);

        return $this;
    }

    /**
     * Get the value of action.
     *
     * @return string
     */
    public function getAction()
    {
        return $this->action;
    }

    /**
     * Set the value of action.
     *
     * @param string $action
     *
     * @return self
     */
    public function setAction(string $action)
    {
        $this->action = $action;

        return $this;
    }

    /**
     * Ajoute un champ au formulaire.
     */
    public function addField(AbstractField $field)
    {
        // Ajoute un objet champ
        $this->fields[] = $field;
    }

    public function createView()
    {
        $html = '<form name="'.$this->name.'" action="'.$this->action.'" method="post">';
        // TODO  Ajouter le code html des champs
        foreach ($this->fields as $field) {
            $html .= $field->createView();
        }

        $html .= '</form>';

        return $html;
    }
}
