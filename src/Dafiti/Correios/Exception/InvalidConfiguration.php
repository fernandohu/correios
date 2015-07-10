<?php

namespace Dafiti\Correios\Exception;

/**
 * @author Flávio Briz <flavio.briz@dafiti.com.br>
 * @license MIT
 */
class InvalidConfiguration extends \Exception
{
    /**
     * Exception constructor.
     *
     * @param object|null $object
     * @param string      $message
     */
    public function __construct($invalid)
    {
        $message = 'Invalid Configuration : '.implode(', ', $invalid).' are(is) mandatory.';
        $message .= PHP_EOL.$this->getTraceAsString();

        parent::__construct($message);
    }
}
