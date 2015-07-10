<?php

namespace Dafiti\Correios\Exception;

class InvalidResponseTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @expectedException \Dafiti\Correios\Exception\InvalidResponse
     * @dataProvider codErroProvider
     */
    public function testExceptionCodes($cod)
    {
        throw new InvalidResponse($cod, '');
    }

    public function codErroProvider()
    {
        return [
            [3],
            [10],
        ];
    }
}
