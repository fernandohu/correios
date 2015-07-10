<?php

namespace Dafiti\Correios\Lib;

/**
 * Calculates the verification code according to the documentation
 * link: {@link http://www.corporativo.correios.com.br/encomendas/sigepweb/doc/Manual_de_Implementacao_do_Web_Service_SIGEPWEB_Logistica_Reversa.pdf}
 * i.
 *
 * @author Flávio Briz <flavio.briz@dafiti.com.br>
 * @license MIT
 */
class CodVerificador
{
    public static function calculate($num)
    {
        $multipliers = [8, 6, 4, 2, 3, 5, 9, 7];
        $sum = 0;
        $verifyDigit;

        if (strlen($num) != 8 || !is_string($num)) {
            throw new \InvalidArgumentException('Number shoul have exactaly 8 digits');
        } else {
            for ($i = 0; $i < 8; ++$i) {
                $sum += substr($num, $i, ($i + 1)) * $multipliers[$i];
            }

            $rest = $sum % 11;
            if ($rest == 0) {
                $verifyDigit = '5';
            } elseif ($rest == 1) {
                $verifyDigit = '0';
            } else {
                $verifyDigit = (11 - $rest).'';
            }
            $num += $verifyDigit;
        }

        return $num;
    }
}
