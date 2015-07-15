<?php

namespace Dafiti\Correios\Entity;

class ResponseObjectTest extends \PHPUnit_Framework_TestCase
{
    private $resp;

    public function setUp()
    {
        $data = (object) ['cod_erro'=>0];
        $data = (object) ['return'=>$data];

        $this->resp = new ResponseObject($data);
    }

    public function testObjectToarray()
    {
        $expected = ['return' => ['cod_erro'=>0]];
        $this->assertEquals($expected, $this->resp->getArrayCopy());
    }

    public function testResponseIsSuccessful()
    {
        $this->assertTrue($this->resp->isSuccessful());
    }

    /**
     * @expectedException \Dafiti\Correios\Exception\InvalidResponse
     * @dataProvider codErroProvider
     */
    public function testUnsuccessfulResponse($cod)
    {
        $response = (object) ['cod_erro'=>$cod, 'msg_erro'=>''];
        $response = (object) ['return'=>$response];

        $this->resp = new ResponseObject($response);

        if (!$this->resp->isSuccessful()) {
            throw $this->resp->getException();
        }
    }

    public function codErroProvider()
    {
        return [
            [3],
            [10],
        ];
    }
}
