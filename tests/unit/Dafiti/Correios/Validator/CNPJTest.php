<?php

namespace Dafiti\Correios\Validator;

class CNPJTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @dataProvider validationProvider
     */
    public function testValidation($value, $result)
    {
        $validator = new CNPJ();
        $this->assertEquals($result, $validator->validate($value));
    }
    
    public function validationProvider()
    {
        return [
            ["11453652000106",true],
            ["11.453.652/0001-06",true],
            ["00000000000", "00000000000 is an invalid CNPJ."],
            ["000000000000", "000000000000 is an invalid CNPJ."],
            ["11453652000105","11453652000105 is an invalid CNPJ."],
            ["12312312312", "12312312312 is an invalid CNPJ."],
            ["", " is an invalid CNPJ."],
        ]; 
    }
}
