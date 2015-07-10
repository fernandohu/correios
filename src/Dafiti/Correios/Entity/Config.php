<?php

namespace Dafiti\Correios\Entity;

use Dafiti\Correios\Exception;

/**
 * Configuration file which should be populated with default
 * information for all requests.
 *
 * logPath is optional if request and response log is required.
 *
 * @author Flávio Briz <flavio.briz@dafiti.com.br>
 * @license MIT
 */
class Config extends \ArrayObject
{
    private $wsdl;
    private $usuario;
    private $senha;
    private $codAdministrativo;
    private $contrato;
    private $logPath;

    public function __construct(array $data)
    {
        if ($this->isValid($data)) {
            $this->setWsdl($data['wsdl']);
            $this->setUsuario($data['usuario']);
            $this->setSenha($data['senha']);
            $this->setCodAdministrativo($data['codAdministrativo']);
            $this->setContrato($data['contrato']);

            if (!empty($data['logPath'])) {
                $this->setLogPath($data['logPath']);
            }
        }
    }

    public function setWsdl($wsdl)
    {
        $this->wsdl = $wsdl;
    }

    public function getWsdl()
    {
        return $this->wsdl;
    }

    public function setUsuario($usuario)
    {
        $this->usuario = $usuario;
    }

    public function getUsuario()
    {
        return $this->usuario;
    }

    public function setSenha($senha)
    {
        $this->senha = $senha;
    }

    public function getSenha()
    {
        return $this->senha;
    }

    public function setCodAdministrativo($codAdministrativo)
    {
        $this->codAdministrativo = $codAdministrativo;
    }

    public function getCodAdministrativo()
    {
        return $this->codAdministrativo;
    }

    public function setContrato($contrato)
    {
        $this->contrato = $contrato;
    }

    public function getContrato()
    {
        return $this->contrato;
    }

    public function setLogPath($logPath)
    {
        $this->logPath = $logPath;
    }

    public function getLogPath()
    {
        return $this->logPath;
    }

    /**
     * @param array $data
     *
     * @return bool
     */
    public function isValid($data)
    {
        $invalid = [];

        if (empty($data['wsdl'])) {
            $invalid[] = 'wsdl';
        }

        if (empty($data['usuario'])) {
            $invalid[] = 'usuario';
        }

        if (empty($data['senha'])) {
            $invalid[] = 'senha';
        }

        if (empty($data['codAdministrativo'])) {
            $invalid[] = 'codAdministrativo';
        }

        if (empty($data['contrato'])) {
            $invalid[] = 'contrato';
        }

        if (!empty($invalid)) {
            throw new Exception\InvalidConfiguration($invalid);
        }

        return true;
    }
}
