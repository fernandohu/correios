<?php

use Dafiti\Correios\Entity;

class ClientTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var mixed
     * @access private
     */
    private $client;
    private $config;
    private $adapter;

    public function setUp()
    {
        $this->config = new Entity\Config([
                'wsdl' => 'http://test',
                'usuario' => 'test',
                'senha' => 'test',
                'codAdministrativo' => 'test',
                'contrato' => 'test',
            ]);

        $this->client = $this->getMockBuilder('\Dafiti\Correios\Service\Client')
            ->disableOriginalConstructor()
            ->setMethods(null)
            ->getMock();

        $this->adapter = $this->getMockBuilder('\Dafiti\Correios\Adapter\SoapAdapter')
            ->disableOriginalConstructor()
            ->setMethods(['solicitarRange'])
            ->getMock();

        $this->adapter->setConfig($this->config);

        $this->client->setConfig($this->config);
        $this->client->setAdapter($this->adapter);
    }

    public function testGetConfig()
    {
        $this->assertEquals($this->config, $this->client->getConfig());
    }

    public function testSolicitarRange()
    {
        $response = (object) ['cod_erro'=>0];
        $response = (object) ['return'=>$response];

        $this->adapter->expects($this->once())
            ->method('solicitarRange')
            ->will($this->returnValue($response));

        $result = $this->client->solicitarRange('CA','','');
    }
}
