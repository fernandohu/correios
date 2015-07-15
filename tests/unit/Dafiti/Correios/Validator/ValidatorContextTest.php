<?php

namespace Dafiti\Correios\Validator;

use Dafiti\Correios\Entity;

class ValidatorContextTest extends \PHPUnit_Framework_TestCase
{
    public function testValidationSuccess()
    {
        $request = new Entity\RequestObject(["Test"=>""]);
        $context = new ValidatorContext([
            [['Test'], 'Mandatory', null],
        ]);

        $this->assertTrue($context->validate($request));
    }

    public function testValidationFailure()
    {
        $request = new Entity\RequestObject(["Test"=>null]);
        $context = new ValidatorContext([
            [['Test'], 'Mandatory', null],
        ]);

        $this->assertFalse($context->validate($request));
        $this->assertEquals(
            ['Test' => ['Field is mandatory.']],
            $context->getErrors()
        );
    }

    public function testValidationRuleForDepthArrays()
    {
        $request = new Entity\RequestObject(["Test"=>["1"=>"teste"]]);
        $context = new ValidatorContext([
            [['Test.1'], 'Mandatory', null],
        ]);

        $this->assertTrue($context->validate($request));
    }
}
