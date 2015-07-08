<?php

namespace Dafiti\Correios\Service;

use Dafiti\Correios\Facade;

class Client
{
    /**
     * @var Dafiti\Correios\Facade\FacadeInterface
     * @access private
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
