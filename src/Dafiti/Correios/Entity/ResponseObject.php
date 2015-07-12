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
    private $exception;

    public function __construct(\stdClass $data)
    {
        parent::__construct($this->objectToArray($data));
    }

    public function getException()
    {
        return $this->exception;
    }

    /**
     * Verifies error code and throws an exception in case
     * the request failed.
     */
    public function isSuccessful()
    {
        $data = $this->getArrayCopy();
        $return = $data['return'];

        if (isset($return['cod_erro']) && intval($return['cod_erro']) == 0) {
            return true;
        }

        $this->exception = new Exception\InvalidResponse(
            $return['cod_erro'], $return['msg_erro']
        );

        return false;
    }

    public function objectToArray(\stdClass $object)
    {
        $results = get_object_vars($object);

        foreach ($results as $key => $val) {
            if (is_object($val)) {
                $results[$key] = $this->objectToArray($val);
            }
        }

        return $results;
    }
}
