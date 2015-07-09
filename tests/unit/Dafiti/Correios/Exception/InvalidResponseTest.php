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
        throw new InvalidResponse($cod);
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
            [1366],
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
