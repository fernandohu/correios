<?php

namespace Dafiti\Correios\Validator;

class MandatoryTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @dataProvider validationProvider
     */
    public function testValidation($value, $result)
    {
        $validator = new Mandatory(null);
        $this->assertEquals($result, $validator->validate($value));
    }
    
    public function validationProvider()
    {
        return [
            ["",true],
            [123,true],
            [null, "Field is mandatory."]
        ]; 
    }
}
