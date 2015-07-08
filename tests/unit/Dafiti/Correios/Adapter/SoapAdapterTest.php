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
     * @var array
     * @access private
     */
    private $data;

    public function setUp()
    {
        $this->data = new Entity\Config([
            'wsdl' => 'http://teste',
            'usuario' => 'teste',
            'senha' => '123',
            'codAdministrativo' => '123',
            'contrato' => '123'
        ]);

        $this->adapter = $this->getMock('SoapAdapter');
    }

    public function testGetSetConfig()
    {
        // @TODO implement response object
        $this->assertTrue(true);
    }

    public function testShouldMakeSuccessfullCall()
    {
        // @TODO implement response object
        $this->assertTrue(true);
    }
}
