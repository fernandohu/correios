<?php

namespace Dafiti\Correios\Validator;

abstract class ValidatorInterface
{
    protected $options;

    public function __construct($options = null)
    {
        $this->options = $options;
    }

    abstract public function validate($value);
}
