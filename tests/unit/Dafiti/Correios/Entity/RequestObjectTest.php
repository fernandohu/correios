<?php

namespace Dafiti\Correios\Entity;

class RequestObjectTest extends \PHPUnit_Framework_TestCase
{

    public function testIsRequestValid()
    {
        $data = [
            'usuario' => '123123',
            'senha' => '123123',
            'codAdministrativo' => '123123',
            'contrato' => 'teste'
        ];

        $requestObject = new RequestObject($data);
        $this->assertTrue($requestObject->isValid());
    }

    /**
     * @expectedException  \Dafiti\Correios\Exception\InvalidRequestObject
     * @dataProvider invalidRequestProvider
     */
    public function testInvalidRequest(RequestObject $obj)
    {
        $obj->isValid();
    }

    public function invalidRequestProvider()
    {
        return [
            [ new RequestObject([]) ],
            [ new RequestObject(
                ["usuario"=>"1"]
            ) ],
            [ new RequestObject(
                ["usuario"=>"1", "senha" => "123" ]
            )],
            [ new RequestObject(
                ["usuario"=>"1", "senha" => "123", "codAdministrativo" => "1" ]
            )]
        ];
    }
}
