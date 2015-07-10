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
    public function __construct($code)
    {
        $message = 'Code error '.$code.':';

        $codeMessages = [
            3 => 'NÃO É PERMITIDO AGENDAR PROCESSAMENTO DE ARQUIVO VIA WEBSERVICE',
            10 => 'O ARQUIVO JÁ FOI PROCESSADO',
            103 => 'ARQUIVO COM ERRO DE ESTRUTURA',
            104 => 'DADOS DE VALIDAÇÃO DA COLETA INCOMPLETOS',
            105 => 'CLIENTE NÃO CONFIGURADO PARA USAR O SISTEMA',
            107 => 'VERSÃO INVÁLIDA DO ARQUIVO XML',
            108 => 'VALOR DECLARADO NÃO PODE SER SUPERIOR A R$ 10.000,00',
            109 => 'DADOS DO CONTRATO INVÁLIDOS',
            111 => 'COLETA DOMICILIAR NÃO DISPONÍVEL PARA O SERVIÇO SEDEX 10',
            1111 => 'COLETA DOMICILIAR NÃO DISPONÍVEL PARA ESSA LOCALIDADE',
            112 => 'SERVIÇO NÃO ATENDE O CEP DE DESTINO',
            113 => 'CEP DO DESTINATÁRIO INEXISTENTE',
            114 => 'CEP DE DESTINO COM FORMATO INVÁLIDO',
            115 => 'CEP DE ORIGEM COM FORMATO INVÁLIDO',
            117 => 'CEP DO REMETENTE INEXISTENTE',
            120 => 'SERVIÇO ESPECIAL (e-SEDEX) NÃO ABRANGE O CEP DE ORIGEM INFORMADO',
            122 => 'DADOS DE DESTINATÁRIO INCOMPLETO',
            125 => 'DADOS DE REMETENTE INCOMPLETOS',
            134 => 'DATA DE AGENDAMENTO INVÁLIDA. VERIFICAR TAG - AGENDAMENTO',
            136 => 'NÚMERO DE ENTREGA INVÁLIDO',
            1366 => 'SERVIÇO DE SIMULTÂNEA EM AGÊNCIA NÃO ATENDIDO NA REGIÃO DO CEP DO REMETENTE',
            138 => 'O ARQUIVO NÃO CONTÉM PEDIDOS DE COLETA. VERIFICAR TAG - coletas_solicitadas',
            140 => 'CARTÃO INVÁLIDO PARA O CONTRATO INFORMADO',
            142 => 'VALOR INVÁLIDO PARA O TIPO DE SOLICITAÇÃO.VERIFICAR TAG -AG',
            195 => 'NÚMERO DE TICKET JÁ UTILIZADO',
            1955 => 'NÚMERO DE OBJETO JÁ UTILIZADO NESSE ARQUIVO',
            198 => 'NÚMERO DE OBJETO INVÁLIDO OU DÍGITO VERIFICADOR INCORRETO',
            1988 => 'FAIXA NUMÉRICA NÃO RESERVADA PARA ESSE CLIENTE',
            19888 => 'NÚMERO DE OBJETO JÁ UTILIZADO',
            198888 => 'TIPO DE ETIQUETA INVÁLIDO',
            199 => "O SERVIÇO ADICIONAL 'AVISO DE RECEBIMENTO' SOMENTE ESTÁ DISPONÍVEL PARA OS PEDIDOS DE AUTORIZAÇÃO DE POSTAGEM",
            200 => 'CÓDIGO DE CHECKLIST INVÁLIDO',
            201 => 'CÓDIGO DO PRODUTO INVÁLIDO',
            202 => 'SERVIÇO ESPECIAL SEDEX 10 NÃO É ATENDIDO POR LOGÍSTICA REVERSA DOMICILIÁRIA',
            203 => 'VALOR TAG AR INVÁLIDO,',
        ];

        parent::__construct($message.$codeMessages[$code]);
    }
}
