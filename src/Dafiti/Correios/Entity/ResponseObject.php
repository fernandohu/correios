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
    public function __construct($data)
    {
        parent::__construct($data);
        $this->isSuccessful();
    }

    /**
     * Verifies error code and throws an exception in case
     * the request failed.
     */
    public function isSuccessful()
    {
        $data = $this->getArrayCopy();
        if (intval($data['cod_erro']) == 0) {
            return true;
        }

        throw new Exception\InvalidResponse($data['cod_erro'], $data['msg_erro']);
    }
}
