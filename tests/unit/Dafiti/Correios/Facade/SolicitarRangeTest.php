<?php

namespace Dafiti\Correios\Facade;

use Dafiti\Correios\Adapter;
use Dafiti\Correios\Entity;

class SolicitarRangeTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var \Dafiti\Correios\Adapter\SoapAdapter
     * @access private
     */
    private $adapter;

    public function setUp()
    {
        $this->adapter = $this->getMockBuilder('\Dafiti\Correios\Adapter\SoapAdapter')
            ->disableOriginalConstructor()
            ->setMethods(['solicitarRange'])
            ->getMock();

        $this->adapter->setConfig(
            new Entity\Config([
                'wsdl' => 'http://teste',
                'usuario' => 'test',
                'senha' => '123',
                'codAdministrativo' => '123',
                'contrato' => 'teste',
            ])
        );

        $response = (object) ['cod_erro'=>0];
        $response = (object) ['return'=>$response];

        $this->adapter->expects($this->once())
            ->method('solicitarRange')
            ->will($this->returnValue($response));
    }

    public function testCall()
    {
        $response = (object) ['cod_erro'=>0];
        $response = (object) ['return'=>$response];

        $facade = new SolicitarRange($this->adapter, 'LR', null, 1);
        $expected = new Entity\ResponseObject($response);
        $response = $facade->call();
        $this->assertEquals($expected, $response);
    }
}
