<?php

namespace Dafiti\Correios\Entity;

class ResponseObjectTest extends \PHPUnit_Framework_TestCase
{
    private $resp;

    public function setUp()
    {
        $this->resp = new ResponseObject([
            'cod_erro' => 0
        ]);
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
        $this->resp = new ResponseObject([
            'cod_erro' => $cod,
            'msg_erro' => '',
        ]);

        $this->resp->isSuccessful();
    }

    public function codErroProvider()
    {
        return [
            [3],
            [10],
        ];
    }
}
