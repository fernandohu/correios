<?php

namespace Dafiti\Correios\Facade;

use Dafiti\Correios\Entity;

/**
 * Este método retorna uma faixa de numeração de autorização de postagem (e-
 * ticket) a ser gerenciada no sistema proprietário para o serviço de logística
 * reversa. Para cada número se faz necessário calcular o dígito verificador,
 * podendo ser consumido o método calcularDigitoVerificador() ou ainda a sua
 * implementação local, conforme exemplo * do Anexo 07.
 * Recomendado utilizar este método apenas de forma contigencial.
 *
 * @uses FacadeInterface
 * @package Dafiti\Correios\Facade
 * @author Flávio Briz <flavio.briz@dafiti.com.br>
 *'@license MIT
 */
class SolicitarRange implements FacadeInterface
{
    private $reqObj;

    public function call()
    {
        return ;
    }

    public function setRequestObject(Entity\RequestObject $obj)
    {
        return ;
    }
}
