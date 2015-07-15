<?php

namespace Dafiti\Correios\Service;

use Dafiti\Correios\Facade;
use Dafiti\Correios\Entity;
use Dafiti\Correios\Adapter;

/**
 * Calls API methods.
 *
 * @author Flávio Briz <flavio.briz@dafiti.com.br>
 * @license MIT
 */
class Client
{
    /**
     * @var Dafiti\Correios\Facade\FacadeInterface
     */
    private $facade;

    /**
     * @var \Dafiti\Correios\Entity
     */
    private $config;

    /**
     * @var \Dafiti\Correios\Adapter\SoapAdapter
     */
    private $adapter;

    public function __construct(Entity\Config $config)
    {
        $this->setConfig($config);
        $this->setAdapter(new Adapter\SoapAdapter($this->getConfig()));
    }

    public function getConfig()
    {
        return $this->config;
    }

    public function setConfig(Entity\Config $config)
    {
        $this->config = $config;
    }

    public function setFacade(Facade\FacadeInterface $facade)
    {
        $this->facade = $facade;
    }

    public function getFacade()
    {
        return $this->facade;
    }

    public function setAdapter(Adapter\SoapAdapter $adapter)
    {
        $this->adapter = $adapter;
    }

    public function getAdapter()
    {
        return $this->adapter;
    }

    public function solicitarRange($tipo, $servico, $quantidade)
    {
        $this->setFacade(new Facade\SolicitarRange(
            $this->getAdapter(),
            $tipo,
            $servico,
            $quantidade
        ));

        return $this->getFacade()->call();
    }

    public function solicitarPostagemReversa($codServico, $cartao, array $destinatario, array $coletas_solicitadas)
    {
        $this->setFacade(new Facade\SolicitarPostagemReversa(
            $this->getAdapter(),
            $codServico,
            $cartao,
            $destinatario,
            $coletas_solicitadas
        ));

        return $this->getFacade()->call();
    }
}
