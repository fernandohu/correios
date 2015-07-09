<?php

namespace Dafiti\Correios\Exception;

/**
 * @author Flávio Briz <flavio.briz@dafiti.com.br>
 * @license MIT
 */
class InvalidRequestObject extends \Exception
{
    /**
     * Exception constructor.
     *
     * @param object|null $object
     * @param string      $message
     */
    public function __construct($field)
    {
        $message = 'InvalidRequestObject : '.$field.' is mandatory.';
        $message .= PHP_EOL.$this->getTraceAsString();

        parent::__construct($message);
    }
}
