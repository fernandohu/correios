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
     * @param array  $errors
     * @param string $message
     */
    public function __construct($errors)
    {
        $message = "InvalidRequestObject : \n";
        foreach ($errors as $field => $msg) {
            $message .= ("{$field}:\n".implode("\n", $msg));
            $message .= "\n";
        }
        $message .= PHP_EOL.$this->getTraceAsString();

        parent::__construct($message);
    }
}
