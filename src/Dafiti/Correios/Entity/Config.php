<?php

namespace Dafiti\Correios\Entity;

use Dafiti\Correios\Exception;

/**
 * @package Dafiti\Correios\Entity
 * @author Flávio Briz <flavio.briz@dafiti.com.br>
 * @license MIT
 */
class Config
{
    private $wsdl;
    private $usuario;
    private $senha;
    private $codAdministrativo;
    private $contrato;

    public function __construct(array $data)
    {
        $this->setWsdl(isset($data['wsdl']) ? $data['wsdl'] : null);
        $this->setUsuario(isset($data['usuario']) ? $data['usuario'] : null);
        $this->setSenha(isset($data['senha']) ? $data['senha'] : null);
        $this->setCodAdministrativo(
            isset($data['codAdministrativo']) ? $data['codAdministrativo'] : null
        );
        $this->setContrato(isset($data['contrato']) ? $data['contrato'] : null);

        $this->isValid();
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

    /**
     * @param array $data
     * @return boolean
     */
    public function isValid()
    {
        $invalid = [];

        if (empty($this->getWsdl()) && APP_ENV == 'prod') {
            $invalid[] = 'wsdl';
        }

        if (empty($this->getUsuario())) {
            $invalid[] = 'usuario';
        }

        if (empty($this->getSenha())) {
            $invalid[] = 'senha';
        }

        if (empty($this->getCodAdministrativo())) {
            $invalid[] = 'codAdministrativo';
        }

        if (empty($this->getContrato())) {
            $invalid[] = 'contrato';
        }

        if (count($invalid)) {
            throw new Exception\InvalidConfiguration($invalid);
        }

        return true;
    }
}
