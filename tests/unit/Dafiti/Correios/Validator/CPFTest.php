<?php

namespace Dafiti\Correios\Validator;

class CPFTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @dataProvider validationProvider
     */
    public function testValidation($value, $result)
    {
        $validator = new CPF();
        $this->assertEquals($result, $validator->validate($value));
    }
    
    public function validationProvider()
    {
        return [
            ["38712982555",true],
            ["387.129.825-55",true],
            ["00000000000", "00000000000 is an invalid CPF."],
            ["000000000000", "000000000000 is an invalid CPF."],
            ["12312312312", "12312312312 is an invalid CPF."],
            ["", "00000000000 is an invalid CPF."],
        ]; 
    }
}
