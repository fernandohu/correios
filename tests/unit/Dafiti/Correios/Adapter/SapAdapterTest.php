<?php

namespace Dafiti\Correios\Adapter;

use Dafiti\Correios\Entity;

class SapAdapterTest extends \PHPUnit_Framework_TestCase
{
    private $adapter;
    private $config;

    public function setUp()
    {
        $this->adapter = $this->getMockBuilder(__NAMESPACE__.'\\SoapAdapter')
            ->disableOriginalConstructor()
            ->setMethods([
                '__getLastRequest',
                '__getLastResponse',
                'solicitarPostagemReversa'
            ])->getMock();

        $this->config = new Entity\Config([
            'wsdl' => 'http://teste',
            'usuario' => 'test',
            'senha' => '123',
            'codAdministrativo' => '123',
            'contrato' => '123',
        ]);

        $this->adapter->setConfig($this->config);
    }

    public function testGetConfig()
    {
        $this->assertEquals($this->config,$this->adapter->getConfig());
    }

    public function testSuccessfulCall()
    {
        $response = (object) ['cod_erro'=>0];
        $response = (object) ['return'=>$response];

        $this->adapter->expects($this->once())
            ->method('solicitarPostagemReversa')
            ->will($this->returnValue($response));

        $expected = new Entity\ResponseObject([
            'cod_erro' => 0,
        ]);

        $result = $this->adapter->call(
            'solicitarPostagemReversa',
            new Entity\RequestObject(['test'])
        );

        $this->assertEquals($expected,$result);
    }

    /**
     * @expectedException \Exception
     */
    public function testSuccessfulCallWithLogs()
    {
        $this->config->setLogPath("/tmp");

        $response = (object) ['cod_erro'=>0];
        $response = (object) ['return'=>$response];

        $this->adapter->expects($this->once())
            ->method('solicitarPostagemReversa')
            ->will($this->returnValue($response));

        $expected = new Entity\ResponseObject([
            'cod_erro' => 0,
        ]);

        $result = $this->adapter->call(
            'solicitarPostagemReversa',
            new Entity\RequestObject(['test'])
        );

        $this->assertEquals($expected,$result);
    }

    /**
     * @expectedException \SoapFault
     */
    public function testUnsuccessfulCall()
    {
        $response = (object) ['cod_erro'=>0];
        $this->adapter->expects($this->any())
            ->method('solicitarPostagemReversa')
            ->will($this->throwException(new \SoapFault("test", "msg"))
            );

        $expected = new Entity\ResponseObject([
            'cod_erro' => 0,
        ]);

        $result = $this->adapter->call(
            'solicitarPostagemReversa',
            new Entity\RequestObject(['test'])
        );
    }
}
