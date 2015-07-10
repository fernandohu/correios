<?php

namespace Dafiti\Correios\Service;

use Dafiti\Correios\Facade;

/**
 * Calls API methods
 * 
 * @package \Dafiti\Correios\Service 
 * @author Flávio Briz <flavio.briz@dafiti.com.br> 
 * @license MIT
 */
class Client
{
    /**
     * @var Dafiti\Correios\Facade\FacadeInterface
     */
    private $facade;

    public function solicitarRange()
    {
    }

    public function setFacade(Facade\FacadeInterface $facade)
    {
        $this->facade = $facade;
    }

    public function getFacade()
    {
        return $this->facade;
    }
}
