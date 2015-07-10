<?php

namespace Dafiti\Correios\Lib;

class CodVerificadorTest extends \PHPUnit_Framework_TestCase
{
    public function testCalculate()
    {
        $this->assertEquals("15653850",CodVerificador::calculate("15653850"));
        $this->assertEquals("15653859",CodVerificador::calculate("15653851"));
        $this->assertEquals("15653858",CodVerificador::calculate("15653852"));
        $this->assertEquals("15653857",CodVerificador::calculate("15653853"));
        $this->assertEquals("15653856",CodVerificador::calculate("15653854"));
        $this->assertEquals("15653860",CodVerificador::calculate("15653855"));
    }

    /**
     * @expectedException \InvalidArgumentException
     * @dataProvider invalidArgumentProvider
     */
    public function testCalculateWithInvalidArgument($num)
    {
        CodVerificador::calculate($num);
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
