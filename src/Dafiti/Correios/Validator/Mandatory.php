<?php

namespace Dafiti\Correios\Validator;

class Mandatory extends ValidatorInterface
{
    public function validate($value)
    {
        if ($value !== null) {
            return true;
        }

        return 'Field is mandatory.';
    }
}
