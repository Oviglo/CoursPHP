<?php

namespace Form\Field;

class Textarea extends AbstractField
{
    protected function fieldView()
    {
        return '<textarea class="form-control" name="'.$this->name.'">'.$this->value.'</textarea>';
    }
}
