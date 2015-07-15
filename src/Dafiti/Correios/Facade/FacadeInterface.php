<?php

namespace Dafiti\Correios\Facade;

use Dafiti\Correios\Entity;
use Dafiti\Correios\Adapter;
use Dafiti\Correios\Validator;
use Dafiti\Correios\Exception;

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
    protected $context;
    protected $rules;

    public function __construct(Adapter\SoapAdapter $adapter, Entity\RequestObject $request)
    {
        $this->setAdapter($adapter);
        $this->setRequest($request);
        $this->setContext(new Validator\ValidatorContext($this->rules));
        if (!$this->isRequestValid()) {
            throw new Exception\InvalidRequestObject($this->getErrors());
        }
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

    public function setContext(Validator\ValidatorContext $validator)
    {
        $this->context = $validator;
    }

    public function getContext()
    {
        return $this->context;
    }

    public function isRequestValid()
    {
        return $this->getContext()->validate($this->getRequest());
    }

    public function getErrors()
    {
        return $this->getContext()->getErrors();
    }
}
