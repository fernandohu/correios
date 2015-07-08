<?php

namespace Dafiti\Correios\Entity;

/**
 * @package Dafiti\Correios\Entity
 * @author Flávio Briz <flavio.briz@dafiti.com.br>
 * @license MIT
 */
class Config
{
    private $usuario;
    private $senha;
    private $codAdministrativo;
    private $contrato;

    public function __contruct(array $data)
    {
        if ($this->isValid($data)) {
            $this->setUsuario($data['usuario']);
            $this->setSenha($data['senha']);
            $this->setCodAdministrativo($data['codAdministrativo']);
            $this->setContrato($data['contrato']);
        }
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

    public function isValid()
    {
        return true;
    }

    /**
     * Load config for integration tests
     *
     * @access public
     * @return void
     */
    public function loadConfig()
    {
        $ini = parse_ini_file(ROOT . "/configs/config.ini");
        $data = $ini[APP_ENV]['sigep'];

        $this->setUsuario($data['usuario']);
        $this->setSenha($data['senha']);
        $this->setCodAdministrativo($data['codAdministrativo']);
        $this->setContrato($data['contrato']);
    }
}
