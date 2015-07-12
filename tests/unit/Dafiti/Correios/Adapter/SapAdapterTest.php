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
                'getLogFile',
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

        $expected = new Entity\ResponseObject($response);

        $result = $this->adapter->call(
            'solicitarPostagemReversa',
            new Entity\RequestObject(['test'])
        );

        $this->assertEquals($expected,$result);
    }
    
    public function testSuccessfulCallWithLogs()
    {
        $this->config->setLogPath("php://memory");

        $response = (object) ['cod_erro'=>0];
        $response = (object) ['return'=>$response];

        $this->adapter->expects($this->once())
            ->method('solicitarPostagemReversa')
            ->will($this->returnValue($response));

        $file = $this->getMock(
            'SplFileObject',
            ['fwrite'], 
            ['php://memory']
        );

        $file->expects($this->atLeastOnce())
            ->method('fwrite')
            ->will($this->returnValue(1));

        $this->adapter->expects($this->atLeastOnce())
            ->method('getLogFile')
            ->will($this->returnValue($file));

        $this->adapter->call(
            'solicitarPostagemReversa',
            new Entity\RequestObject(['test'])
        );
    }

    /**
     * @expectedException \RuntimeException
     */
    public function testSuccessfulCallWithLogsFailure()
    {
        $this->config->setLogPath("/tmp");

        $response = (object) ['cod_erro'=>0];
        $response = (object) ['return'=>$response];

        $this->adapter->expects($this->once())
            ->method('solicitarPostagemReversa')
            ->will($this->returnValue($response));

        $this->adapter->expects($this->once())
            ->method('getLogFile')
            ->will($this->throwException(
                new \RuntimeException("Unable to write log files.")
            )
        );

        $this->adapter->call(
            'solicitarPostagemReversa',
            new Entity\RequestObject(['test'])
        );
    }

    /**
     * @expectedException \SoapFault
     */
    public function testUnsuccessfulCall()
    {
        $this->adapter->expects($this->any())
            ->method('solicitarPostagemReversa')
            ->will($this->throwException(new \SoapFault("test", "msg"))
            );

        $this->adapter->call(
            'solicitarPostagemReversa',
            new Entity\RequestObject(['test'])
        );
    }
}
