<?php

namespace Form\Field;

class Text extends AbstractField
{
    protected function fieldView()
    {
        return '<input type="text" class="form-control" name="'.$this->name.'" value="'.$this->value.'">';
    }
}
