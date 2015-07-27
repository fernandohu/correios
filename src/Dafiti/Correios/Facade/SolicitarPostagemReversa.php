<?php

namespace Dafiti\Correios\Facade;

use Dafiti\Correios\Entity;

/**
 * Este  método  processa o pedido  de  autorização  de  postagem  ou  coleta
 * de  forma online  nos  Correios. Poderá  ser  efetuado  até  50  solicitações
 * simultâneas  em uma  única chamada, sendo uma lista de coletas_solicitadas.
 *
 * Obs: Para o tipo C=Coleta, não poderá ser utilizado a númeração obtida pelo
 * método solicitarRange(), deverá ser consumido o método solicitarPostagemReversa(),
 * sem informar a tag número. O serviço de coleta domiciliária requer validação
 * da área de abrangência conforme o parâmetro CEP.
 *
 * @uses FacadeInterface
 *
 * @author Flávio Briz <flavio.briz@dafiti.com.br>
 * @license MIT
 */
class SolicitarPostagemReversa extends FacadeInterface
{
    protected $rules = [
        [
            [
                'usuario',
                'senha',
                'codAdministrativo',
                'contrato',
                'codigo_servico',
                'cartao',
                'destinatario.nome',
                'destinatario.logradouro',
                'destinatario.numero',
                'destinatario.cidade',
                'destinatario.uf',
                'destinatario.cep'
            ],'Mandatory',[],
        ],
    ];

    public function __construct($adapter, $codServico, $cartao, array $destinatario, array $coletas_solicitadas)
    {
        $cfg = $adapter->getConfig();
        $request = new Entity\RequestObject([
            'usuario' => $cfg->getUsuario(),
            'senha' => $cfg->getSenha(),
            'codAdministrativo' => $cfg->getCodAdministrativo(),
            'contrato' => $cfg->getContrato(),
            'codigo_servico' => $codServico,
            'cartao' => $cartao,
            'destinatario' => $destinatario,
            'coletas_solicitadas' => $coletas_solicitadas,
        ]);

        parent::__construct($adapter, $request);
    }

    public function call()
    {
        return $this->getAdapter()->call(
            'solicitarPostagemReversa',
            $this->getRequest()
        );
    }
}
