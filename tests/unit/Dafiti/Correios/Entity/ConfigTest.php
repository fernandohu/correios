<?php

namespace Dafiti\Correios\Entity;

class ConfigTest extends \PHPUnit_Framework_TestCase
{
    private $config;

    public function setUp()
    {
        $data = [
            'wsdl' => 'http://test',
            'usuario' => 'teste',
            'senha' => '123',
            'codAdministrativo' => '123',
            'contrato' => '123'
        ];

        $this->config = new Config($data);
    }

    public function testIsValid()
    {
        $this->assertTrue($this->config->isValid());
    }

    public function testGetProperties()
    {
        $this->assertEquals('http://test', $this->config->getWsdl());
        $this->assertEquals('teste', $this->config->getUsuario());
        $this->assertEquals('123', $this->config->getSenha());
        $this->assertEquals('123', $this->config->getCodAdministrativo());
        $this->assertEquals('123', $this->config->getContrato());
    }


    /**
     * @expectedException  \Dafiti\Correios\Exception\InvalidConfiguration
     */
    public function testInvalidConfig()
    {
        $this->config = new Config([]);
    }
}
