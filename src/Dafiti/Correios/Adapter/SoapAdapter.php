<?php

namespace Dafiti\Correios\Adapter;

use Dafiti\Correios\Entity;

class SoapAdapter extends \SoapClient
{

    /**
     * Soap adapter which will conect to SIGEP api
     * using an configuration Object
     *
     * @var Dafiti\Correios\Entity\Config
     * @access private
     */
    private $config;

    public function __construct(Entity\Config $config)
    {
        $this->setConfig($config);
        parent::__construct($this->getConfig()->getWsdl());
    }

    public function getConfig()
    {
        return $this->config;
    }

    public function setConfig(Entity\Config $config)
    {
        $this->config = $config;
    }

    public function call()
    {
        return true;
    }
}
