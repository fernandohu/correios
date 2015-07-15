<?php

namespace Dafiti\Correios\Validator;

use Dafiti\Correios\Entity;

class ValidatorContext
{
    /**
     * Array following the pattern.
     *
     * [['fieldNames'], 'validationRule', [$options]]
     *
     * @var array
     */
    private $validationRules;

    /**
     * Contains every error ocurred during validation.
     *
     * @var array
     */
    private $errors;

    public function __construct($validationRules)
    {
        $this->validationRules = $validationRules;
        $this->errors = [];
    }

    /**
     * @param \Dafiti\Correios\Entity\RequestObject $request
     *
     * @return bool
     */
    public function validate(Entity\RequestObject $request)
    {
        $errors = false;

        foreach ($this->validationRules as $validationRule) {
            list($fields, $rule, $options) = $validationRule;

            foreach ($fields as $field) {
                $class = '\\Dafiti\\Correios\\Validator\\'.$rule;

                $reflection = new \ReflectionClass($class);
                $validator = $reflection->newInstance($options);

                $data = $request->getArrayCopy();
                $fieldList = explode('.', $field);

                $result = $validator->validate(
                    $this->getValue($data, $fieldList)
                );

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

    public function getValue(array $data, array $field)
    {
        if (count($field) == 1) {
            return $data[$field[0]];
        }

        $data = $data[$field[0]];
        array_shift($field);

        return $this->getValue($data, $field);
    }
}
