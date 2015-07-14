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
    public function __construct($field, $msg = null)
    {
        $message = 'InvalidRequestObject : '.$field.' '.$msg;
        $message .= PHP_EOL.$this->getTraceAsString();

        parent::__construct($message);
    }
}
