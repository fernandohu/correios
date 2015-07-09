<?php

namespace Dafiti\Correios\Entity;

use Dafiti\Correios\Exception;

/**
 * Request Object which should aways contain:.
 *
 * usuario
 * senha
 * codAdministrativo
 * contrato
 *
 * @version 0.1
 *
 * @author  Flávio Briz <flavio.briz@dafiti.com.br>
 * @license MIT
 */
class RequestObject extends \ArrayObject
{
    /**
     * @throws Exception\InvalidRequestObject
     */
    public function isValid()
    {
        if (empty($this['usuario'])) {
            throw new Exception\InvalidRequestObject('usuario');
        }

        if (empty($this['senha'])) {
            throw new Exception\InvalidRequestObject('senha');
        }

        if (empty($this['codAdministrativo'])) {
            throw new Exception\InvalidRequestObject('codAdministrativo');
        }

        if (empty($this['contrato'])) {
            throw new Exception\InvalidRequestObject('contrato');
        }

        return true;
    }
}
