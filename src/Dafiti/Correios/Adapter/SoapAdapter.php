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
        $context = stream_context_create([
            'ssl' => [
                'verify_peer' => false,
                'verify_peer_name' => false,
                'allow_self_signed' => true
            ]
        ]);

        $this->setConfig($config);
        parent::__construct(
            $this->getConfig()->getWsdl(),
            ['stream_context' => $context]
        );
    }

    public function getConfig()
    {
        return $this->config;
    }

    public function setConfig(Entity\Config $config)
    {
        $this->config = $config;
    }


    public function call($method, Entity\RequestObject $obj)
    {
        try{
            $response = $this->$method($obj->getArrayCopy());
            return new Entity\ResponseObject($response);
        } catch (\SoapFault $fault) {
            throw new \SoapFault(
                "SOAP Fault: (faultcode: {$fault->faultcode},".
                " faultstring: {$fault->faultstring})",
                E_USER_ERROR
            );

        }
    }
}
