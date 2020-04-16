<?php

namespace Form\Field;

class Submit extends AbstractField
{
    protected function fieldView()
    {
        return '<button type="submit" name="'.$this->name.'" class="btn btn-primary">'.$this->label.'</button>';
    }

    // Surcharge de la méthode createView définie à la base dans AbstractField
    public function createView()
    {
        return $this->fieldView();
    }
}
