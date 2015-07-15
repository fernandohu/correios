<?php

namespace Dafiti\Correios\Validator;

class ConstantTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @dataProvider validationProvider
     */
    public function testValidation($value, $options, $result)
    {
        $validator = new Constant($options);
        $this->assertEquals($result, $validator->validate($value));
    }
    
    public function validationProvider()
    {
        return [
            ['CA', ['values' => ['A', 'CA', 'C']], true],
            ['D', ['values' => ['A', 'CA', 'C']], "D is not in A, CA, C."],
        ]; 
    }
}
