<?php

namespace Dafiti\Correios\Exception;

/**
 * @package Dafiti\Correios\Exception
 * @author Flávio Briz <flavio.briz@dafiti.com.br>
 * @license MIT
 */
class InvalidResponse extends \Exception
{
    /**
     * Message errors extracted from:
     *
     * {@link http://www.corporativo.correios.com.br/encomendas/sigepweb/doc/Manual_de_Implementacao_do_Web_Service_SIGEPWEB_Logistica_Reversa.pdf}
     *
     * @param object|null  $object
     * @param string $message
     */
    public function __construct($code)
    {
        $message = "Code error $code: ";

        switch ($code) {
            case 3:
                $message .= 'NÃO É PERMITIDO AGENDAR PROCESSAMENTO DE ARQUIVO VIA WEBSERVICE';
                break;
            case 10:
                $message .= 'O ARQUIVO JÁ FOI PROCESSADO';
                break;
            case 103:
                $message .= 'ARQUIVO COM ERRO DE ESTRUTURA';
                break;
            case 104:
                $message .= 'DADOS DE VALIDAÇÃO DA COLETA INCOMPLETOS';
                break;
            case 105:
                $message .= 'CLIENTE NÃO CONFIGURADO PARA USAR O SISTEMA';
                break;
            case 107:
                $message .= 'VERSÃO INVÁLIDA DO ARQUIVO XML';
                break;
            case 108:
                $message .= 'VALOR DECLARADO NÃO PODE SER SUPERIOR A R$ 10.000,00';
                break;
            case 109:
                $message .= 'DADOS DO CONTRATO INVÁLIDOS';
                break;
            case 111:
                $message .= 'COLETA DOMICILIAR NÃO DISPONÍVEL PARA O SERVIÇO SEDEX 10';
                break;
            case 1111:
                $message .= 'COLETA DOMICILIAR NÃO DISPONÍVEL PARA ESSA LOCALIDADE';
                break;
            case 112:
                $message .= 'SERVIÇO NÃO ATENDE O CEP DE DESTINO';
                break;
            case 113:
                $message .= 'CEP DO DESTINATÁRIO INEXISTENTE';
                break;
            case 114:
                $message .= 'CEP DE DESTINO COM FORMATO INVÁLIDO';
                break;
            case 115:
                $message .= 'CEP DE ORIGEM COM FORMATO INVÁLIDO';
                break;
            case 117:
                $message .= 'CEP DO REMETENTE INEXISTENTE';
                break;
            case 120:
                $message .= 'SERVIÇO ESPECIAL (e-SEDEX) NÃO ABRANGE O CEP DE ORIGEM INFORMADO';
                break;
            case 122:
                $message .= 'DADOS DE DESTINATÁRIO INCOMPLETO';
                break;
            case 125:
                $message .= 'DADOS DE REMETENTE INCOMPLETOS';
                break;
            case 134:
                $message .= 'DATA DE AGENDAMENTO INVÁLIDA. VERIFICAR TAG - AGENDAMENTO';
                break;
            case 136:
                $message .= 'NÚMERO DE ENTREGA INVÁLIDO';
                break;
            case 1366:
                $message .= 'SERVIÇO DE SIMULTÂNEA EM AGÊNCIA NÃO ATENDIDO NA REGIÃO DO CEP DO REMETENTE';
                break;
            case 138:
                $message .= 'O ARQUIVO NÃO CONTÉM PEDIDOS DE COLETA. VERIFICAR TAG - coletas_solicitadas';
                break;
            case 140:
                $message .= 'CARTÃO INVÁLIDO PARA O CONTRATO INFORMADO';
                break;
            case 142:
                $message .= 'VALOR INVÁLIDO PARA O TIPO DE SOLICITAÇÃO.VERIFICAR TAG -AG';
                break;
            case 195:
                $message .= 'NÚMERO DE TICKET JÁ UTILIZADO';
                break;
            case 1955:
                $message .= 'NÚMERO DE OBJETO JÁ UTILIZADO NESSE ARQUIVO';
                break;
            case 198:
                $message .= 'NÚMERO DE OBJETO INVÁLIDO OU DÍGITO VERIFICADOR INCORRETO';
                break;
            case 1988:
                $message .= 'FAIXA NUMÉRICA NÃO RESERVADA PARA ESSE CLIENTE';
                break;
            case 19888:
                $message .= 'NÚMERO DE OBJETO JÁ UTILIZADO';
                break;
            case 198888:
                $message .= 'TIPO DE ETIQUETA INVÁLIDO';
                break;
            case 199:
                $message .= "O SERVIÇO ADICIONAL 'AVISO DE RECEBIMENTO' SOMENTE ESTÁ DISPONÍVEL PARA OS PEDIDOS DE AUTORIZAÇÃO DE POSTAGEM";
                break;
            case 200:
                $message .= 'CÓDIGO DE CHECKLIST INVÁLIDO';
                break;
            case 201:
                $message .= 'CÓDIGO DO PRODUTO INVÁLIDO';
                break;
            case 202:
                $message .= 'SERVIÇO ESPECIAL SEDEX 10 NÃO É ATENDIDO POR LOGÍSTICA REVERSA DOMICILIÁRIA';
                break;
            case 203:
                $message .= 'VALOR TAG AR INVÁLIDO;';
                break;
        }

        parent::__construct($message);
    }
}
