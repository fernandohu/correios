<?php

namespace Dafiti\Correios\Exception;

/**
 * @author Flávio Briz <flavio.briz@dafiti.com.br>
 * @license MIT
 */
class InvalidResponse extends \Exception
{
    /**
     * Message errors extracted from.
     *
     * {@link http//www.corporativo.correios.com.br/encomendas/sigepweb/doc/Manual_de_Implementacao_do_Web_Service_SIGEPWEB_Logistica_Reversa.pdf}
     *
     * @param string $code
     */
    public function __construct($code, $msg)
    {
        $message = 'Code error '.$code.' : '.$msg;
        parent::__construct($message);
    }
}
