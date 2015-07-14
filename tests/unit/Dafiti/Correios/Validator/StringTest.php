<?php

namespace Dafiti\Correios\Validator;

class StringTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @dataProvider validationProvider
     */
    public function testValidation($value, $options, $result)
    {
        $validator = new String($options);
        $this->assertEquals($result, $validator->validate($value));
    }
    
    public function validationProvider()
    {
        return [
            ["100", null, true],
            [null, null, "Is not a string."],
            ["100", ["length" => 3], true],
            ["100", ["length" => 2], "Value should have exactaly 2 characters."],
            ["100", ["regex" => "/[0-9]/"], true],
            ["abc", ["regex" => "/[0-9]/"], "Value does not match expression /[0-9]/."],
        ]; 
    }
}
