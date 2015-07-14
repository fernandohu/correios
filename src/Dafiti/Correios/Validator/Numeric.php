<?php

namespace Dafiti\Correios\Validator;

class Numeric extends ValidatorInterface
{
    public function validate($value)
    {
        $min = isset($this->options['min']) ? $this->options['min'] : null;
        $max = isset($this->options['max']) ? $this->options['max'] : null;

        if (isset($this->options['int']) && !is_integer($value)) {
            return 'Value is not an integer.';
        }

        if ($min !== null && $max !== null && ($value < $min || $value > $max)) {
            return "Value {$value} should be between ${min} and ${max}.";
        }

        if ($min === null && $max !== null && $value > $max) {
            return "Value {$value} is greater than allowed max ${max}.";
        }

        if ($max === null && $min !== null && $value < $min) {
            return "Value {$value} is smaller than allowed minimun ${min}.";
        }

        return true;
    }
}
