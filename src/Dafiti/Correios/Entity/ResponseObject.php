<?php

namespace Dafiti\Correios\Entity;

use Dafiti\Correios\Exception;

/**
 * Default response object.
 *
 * @author Flávio Briz <flavio.briz@dafiti.com.br>
 * @license MIT
 */
class ResponseObject extends \ArrayObject
{
    /**
     * Verifies error code and throws an exception in case
     * the request failed.
     */
    public function isSuccessful()
    {
        if ($this['cod_erro'] == 0) {
            return true;
        }

        throw new Exception\InvalidResponse($this['cod_erro']);
    }
}
