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
            'cod_erro' => $cod
        ]);

        $this->resp->isSuccessful();
    }

    public function codErroProvider()
    {
        return [
            [3],
            [10],
            [103],
            [104],
            [105],
            [107],
            [108],
            [109],
            [111],
            [1111],
            [112],
            [113],
            [114],
            [115],
            [117],
            [120],
            [122],
            [125],
            [134],
            [136],
            [136],
            [138],
            [140],
            [142],
            [195],
            [1955],
            [198],
            [1988],
            [19888],
            [198888],
            [199],
            [200],
            [201],
            [202],
            [203]
        ];
    }
}
