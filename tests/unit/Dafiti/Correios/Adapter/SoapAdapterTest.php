<?php

namespace Dafiti\Correios\Adapter;

class SoapAdapterTest extends PHPUnit_Framework_TestCase
{
    /**
     * @var Dafiti\Correios\Adapter\SoapAdapter
     * @access private
     */
    private $adapter;

    public function setUp()
    {
        $configs = [
            "sigep" => [
                "wsdl" => "http://test",
                "usuario" => "test",
                "senha" => "123",
                "codAdaministrativo" => "test",
                "contrato" => "123"
            ]
        ];

        $this->adapter = new SoapAdapter($configs);
    }

    public function testConnectAdapter()
    {
        
    }
}
