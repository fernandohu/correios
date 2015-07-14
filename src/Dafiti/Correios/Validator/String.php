<?php

namespace Dafiti\Correios\Validator;

class String extends ValidatorInterface
{
    public function validate($value)
    {
        if (!is_string($value)) {
            return 'Is not a string.';
        }

        if (isset($this->options['length']) && strlen($value) !== $this->options['length']) {
            return "Value should have exactaly {$this->options['length']} characters.";
        }

        if (isset($this->options['regex']) && !preg_match($this->options['regex'], $value)) {
            return "Value does not match expression {$this->options['regex']}.";
        }

        return true;
    }
}
