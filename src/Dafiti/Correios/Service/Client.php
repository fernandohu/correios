<?php

namespace Dafiti\Correios\Service;

use Dafiti\Correios\Facade;
use Dafiti\Correios\Entity;

/**
 * Calls API methods.
 *
 * @author Flávio Briz <flavio.briz@dafiti.com.br>
 * @license MIT
 */
class Client
{
    /**
     * @var Dafiti\Correios\Facade\FacadeInterface
     */
    private $facade;

    /**
     * @var \Dafiti\Correios\Entity
     */
    private $config;

    public function getConfig()
    {
        return $this->config;
    }

    public function setConfig(Entity\Config $config)
    {
        $this->config = $config;
    }

    public function setFacade(Facade\FacadeInterface $facade)
    {
        $this->facade = $facade;
    }

    public function getFacade()
    {
        return $this->facade;
    }
    
    public function solicitarRange()
    {

    }
}
