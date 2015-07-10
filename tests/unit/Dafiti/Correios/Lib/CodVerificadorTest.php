<?php

namespace Dafiti\Correios\Lib;

class CodVerificadorTest extends \PHPUnit_Framework_TestCase
{
    public function testCalculate()
    {
        $this->assertEquals("15653850",CodVerificador::calculate("15653850"));
    }
 
    /**
     * @expectedException \InvalidArgumentException
     * @dataProvider invalidArgumentProvider
     */
    public function testCalculateWithInvalidArgument($num)
    {
        $this->assertEquals("15653850",CodVerificador::calculate($num));
    }

    public function invalidArgumentProvider()
    {
        return [
            [0],
            [""],
            ["123123"],
            ["123123123"],
        ];
    }
}
