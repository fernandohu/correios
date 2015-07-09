<?php

namespace Dafiti\Correios\Entity;

use Dafiti\Correios\Exception;

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
