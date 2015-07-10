<?php

namespace Dafiti\Correios\Adapter;

use Dafiti\Correios\Entity;

class SoapAdapterTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var Dafiti\Correios\Adapter\SoapAdapter
     * @access private
     */
    private $adapter;

    /**
     * @var \Dafiti\Correios\Entity\Config
     * @access private
     */
    private $config;

    public function setUp()
    {
        $ini = parse_ini_file(ROOT."configs/config.ini", true);
        $this->config = new Entity\Config($ini['dev']);
        $this->config->setLogPath(ROOT."logs/");
        $this->adapter = new SoapAdapter($this->config);
    }


    /**
     * @expectedException \SoapFault
     */
    public function testShouldMakeUnsuccessfulCall()
    {
        $request = new Entity\RequestObject([
            'idContrato' => '9912208555',
            'idCartão' => '0057018901',
            'usuario' => 'sigep',
            'senha' => 'n5f9t8'
        ]);
        
        $this->adapter->call("buscaCliente", $request);
    }
    
    public function testShouldMakeSuccessfulCall()
    {
        $request = new Entity\RequestObject([
            'codAdministrativo' => '0000000',
            'numeroServico' => '40215',
            'cepOrigem' => '70002900',
            'cepDestino' => '81350120',
            'usuario' => 'sigep',
            'senha' => 'n5f9t8',
        ]);

        $reponse = $this->adapter->call("verificaDisponibilidadeServico", $request);
        $this->assertTrue($reponse instanceof Entity\ResponseObject);
    }
}
