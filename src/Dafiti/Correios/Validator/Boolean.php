<?php

namespace Dafiti\Correios\Validator;

class Boolean extends ValidatorInterface
{
    public function validate($value)
    {
        if (is_bool($value)) {
            return true;
        }

        return 'Field is not a boolean.';
    }
}
