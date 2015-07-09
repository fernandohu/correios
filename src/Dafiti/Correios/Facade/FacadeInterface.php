<?php

namespace Dafiti\Correios\Facade;

use Dafiti\Correios\Entity;
use Dafiti\Correios\Adapter;

abstract class FacadeInterface
{
    protected $adapter;
    protected $response;

    /**
     * @return \Dafiti\Correios\Entity\ResponseObject
     */
    abstract public function call();

    public function setAdapter(Adapter\SoapAdapter $adapter)
    {
        $this->adapter = $adapter;
    }

    public function setRequest(Entity\RequestObject $request)
    {
        $this->request = $request;
    }
}
