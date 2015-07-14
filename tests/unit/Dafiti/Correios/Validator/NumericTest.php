<?php

namespace Dafiti\Correios\Validator;

class NumericTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @dataProvider validationProvider
     */
    public function testValidation($value, $options, $result)
    {
        $validator = new Numeric($options);
        $this->assertEquals($result, $validator->validate($value));
    }
    
    public function validationProvider()
    {
        return [
            [100, ['min'=>0, 'max'=>200], true],
            [123, null,true],
            ["123", ['int'=>true], "Value is not an integer."],
            [250, ['min'=>0, 'max'=>200], "Value 250 should be between 0 and 200."],
            [250, ['max'=>200], "Value 250 is greater than allowed max 200."],
            [-1, ['min'=>0], "Value -1 is smaller than allowed minimun 0."],
        ]; 
    }
}
