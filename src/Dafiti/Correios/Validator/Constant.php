<?php

namespace Dafiti\Correios\Validator;

class Constant extends ValidatorInterface
{
    public function validate($value)
    {
        $values = $this->options['values'];

        if (in_array($value, $values)) {
            return true;
        }

        return "{$value} is not in ".implode(', ', $values).'.';
    }
}
