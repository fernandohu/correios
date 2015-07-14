<?php

namespace Dafiti\Correios\Validator;

class BooleanTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @dataProvider validationProvider
     */
    public function testValidation($value, $result)
    {
        $validator = new Boolean(null);
        $this->assertEquals($result, $validator->validate($value));
    }
    
    public function validationProvider()
    {
        return [
            [true,true],
            [1, "Field is not a boolean."],
            [0, "Field is not a boolean."],
            [false, true],
            [null, "Field is not a boolean."]
        ]; 
    }
}
