<?php

namespace Dafiti\Correios\Adapter;

use Dafiti\Correios\Entity;

/**
 * Connects to the SOAP API using default SoapClient PHP library.
 * All requests and responses are logged if logPath config is specified.
 *
 * @author Flávio Briz <flavio.briz@dafiti.com.br>
 * @license MIT
 */
class SoapAdapter extends \SoapClient
{
    /**
     * Soap adapter which will conect to SIGEP api
     * using an configuration Object.
     *
     * @var Dafiti\Correios\Entity\Config
     */
    private $config;

    public function __construct(Entity\Config $config)
    {
        $context = stream_context_create([
            'ssl' => [
                'verify_peer' => false,
                'verify_peer_name' => false,
                'allow_self_signed' => true,
            ],
        ]);

        $this->setConfig($config);
        parent::__construct(
            $this->getConfig()->getWsdl(),
            [
                'stream_context' => $context,
                'trace' => 1,
            ]
        );
    }

    public function getConfig()
    {
        return $this->config;
    }

    public function setConfig(Entity\Config $config)
    {
        $this->config = $config;
    }

    public function call($method, Entity\RequestObject $obj)
    {
        try {
            $response = $this->$method($obj->getArrayCopy());
            $return = get_object_vars($response);

            return new Entity\ResponseObject(
                get_object_vars($return['return'])
            );
        } catch (\SoapFault $fault) {
            throw new \SoapFault(
                "SOAP Fault: (faultcode: {$fault->faultcode},".
                " faultstring: {$fault->faultstring})",
                E_USER_ERROR
            );
        } finally {
            // log request and response
            if (!empty($this->config->getLogPath())) {
                try {
                    $path = $this->config->getLogPath().date('Y-m-d').'/';
                    !file_exists($path) && mkdir($path);
                    $path .= (time()."_{$method}_");

                    file_put_contents(
                        $path.'REQ.xml', $this->__getLastRequest()
                    );
                    file_put_contents(
                        $path.'RES.xml', $this->__getLastResponse()
                    );
                } catch (\Exception $e) {
                    throw new \Exception('Unable to write log files.');
                }
            }
        }
    }
}
