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
        $this->assertEquals($requestObject->getArrayCopy(), $data);
    }
}
