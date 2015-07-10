<?php

namespace Dafiti\Correios\Entity;

class ConfigTest extends \PHPUnit_Framework_TestCase
{
    private $config;
    private $data;

    public function setUp()
    {
        $this->data = [
            'wsdl' => 'http://test',
            'usuario' => 'teste',
            'senha' => '123',
            'codAdministrativo' => '123',
            'contrato' => '123',
            'logPath' => '/tmp',
        ];

        $this->config = new Config($this->data);
    }

    public function testIsValid()
    {
        $this->assertTrue($this->config->isValid($this->data));
    }

    public function testGetProperties()
    {
        $this->assertEquals('http://test', $this->config->getWsdl());
        $this->assertEquals('teste', $this->config->getUsuario());
        $this->assertEquals('123', $this->config->getSenha());
        $this->assertEquals('123', $this->config->getCodAdministrativo());
        $this->assertEquals('123', $this->config->getContrato());
        $this->assertEquals('/tmp', $this->config->getLogPath());
    }


    /**
     * @expectedException  \Dafiti\Correios\Exception\InvalidConfiguration
     */
    public function testInvalidConfig()
    {
        $this->config = new Config([]);
    }
}
