<?php

namespace Dafiti\Correios\Validator;

use Dafiti\Correios\Entity;

class ValidatorContext
{
    /**
     * Array following the pattern
     *
     * [['fieldNames'], 'validationRule', [$options]] 
     * 
     * @var array
     * @access private
     */
    private $validationRules;


    /**
     * Contains every error ocurred during validation
     *
     * @var array
     * @access private
     */
    private $errors;

    public function __construct($validationRules)
    {
        $this->validationRules = $validationRules;
        $this->errors = [];
    }

    /**
     * @param \Dafiti\Correios\Entity\RequestObject $request
     * @access public
     * @return boolean
     */
    public function validate(Entity\RequestObject $request)
    {
        $errors = false;

        foreach ($this->validationRules as $validationRule) {
            list($fields,$rule,$options) = $validationRule;

            foreach ($fields as $field) {
                $rule = '\\Dafiti\\Correios\\Validator\\' . $rule;
                $validator = new $rule($options);
                $result = $validator->validate($request[$field]);
                if ($result !== true) {
                    $errors = true;
                    $this->errors[$field][] = $result;
                }
            }
        }

        return !$errors;
    }   

    public function getErrors()
    {
        return $this->errors;
    }
}
