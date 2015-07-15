<?php

namespace Dafiti\Correios\Validator;

class CNPJ extends ValidatorInterface
{
    public function validate($value)
    {
        $value = preg_replace('/[^0-9]/', '', (string) $value);

        if (strlen($value) != 14) {
            return "${value} is an invalid CNPJ.";
        }

        for ($i = 0, $j = 5, $soma = 0; $i < 12; ++$i) {
            $soma += $value{$i}
            * $j;
            $j = ($j == 2) ? 9 : $j - 1;
        }

        $resto = $soma % 11;

        if ($value{12} != ($resto < 2 ? 0 : 11 - $resto)) {
            return "${value} is an invalid CNPJ.";
        }

        for ($i = 0, $j = 6, $soma = 0; $i < 13; ++$i) {
            $soma += $value{$i}
            * $j;
            $j = ($j == 2) ? 9 : $j - 1;
        }

        $resto = $soma % 11;

        if ($value{13} == ($resto < 2 ? 0 : 11 - $resto)) {
            return true;
        }

        return "${value} is an invalid CNPJ.";
    }
}
