<?php

namespace Dafiti\Correios\Facade;

use Dafiti\Correios\Entity;
use Dafiti\Correios\Adapter;

/**
 * @abstract
 *
 * @author Flávio Briz <flavio.briz@dafiti.com.br>
 * @license MIT
 */
abstract class FacadeInterface
{
    protected $adapter;
    protected $request;

    public function __construct(Adapter\SoapAdapter $adapter, Entity\RequestObject $request)
    {
        $this->setAdapter($adapter);
        $this->setRequest($request);
    }

    /**
     * @return \Dafiti\Correios\Entity\ResponseObject
     */
    abstract public function call();

    public function setAdapter(Adapter\SoapAdapter $adapter)
    {
        $this->adapter = $adapter;
    }

    public function getAdapter()
    {
        return $this->adapter;
    }

    public function setRequest(Entity\RequestObject $request)
    {
        $this->request = $request;
    }

    public function getRequest()
    {
        return $this->request;
    }
}
