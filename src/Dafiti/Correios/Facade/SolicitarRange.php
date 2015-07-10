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
 *
 * @author Flávio Briz <flavio.briz@dafiti.com.br>
 *'@license MIT
 */
class SolicitarRange extends FacadeInterface
{
    public function __construct($adapter, $tipo = null, $servico = null, $quantidade = 1)
    {
        $cfg = $adapter->getConfig();
        $request = new Entity\RequestObject([
            'usuario' => $cfg->getUsuario(),
            'senha' => $cfg->getSenha(),
            'codAdministrativo' => $cfg->getCodAdministrativo(),
            'contrato' => $cfg->getContrato(),
            'tipo' => $tipo,
            'servico' => $servico,
            'quantidade' => $quantidade,
        ]);
        parent::__construct($adapter, $request);
    }

    public function call()
    {
        return $this->getAdapter()->call(
            'solicitarRange',
            $this->getRequest()
        );
    }
}
