# Correios
[![Build Status](https://img.shields.io/travis/dafiti/correios/master.svg?style=flat-square)](https://travis-ci.org/dafiti/correios)
[![Scrutinizer Code Quality](https://img.shields.io/scrutinizer/g/dafiti/correios/master.svg?style=flat-square)](https://scrutinizer-ci.com/g/dafiti/correios/?branch=master)
[![Code Coverage](https://img.shields.io/scrutinizer/coverage/g/dafiti/correios/master.svg?style=flat-square)](https://scrutinizer-ci.com/g/dafiti/correios/?branch=master)
[![HHVM](https://img.shields.io/hhvm/dafiti/correios.svg)](https://travis-ci.org/dafiti/correios)
[![Latest Stable Version](https://img.shields.io/packagist/v/dafiti/correios.svg?style=flat-square)](https://packagist.org/packages/dafiti/correios)
[![Total Downloads](https://img.shields.io/packagist/dt/dafiti/correios.svg?style=flat-square)](https://packagist.org/packages/dafiti/correios)
[![License](https://img.shields.io/packagist/l/dafiti/correios.svg?style=flat-square)](https://packagist.org/packages/dafiti/correios)

PHP integration with Correios API

Correios integration, using the following [implementation
manual](http://www.corporativo.correios.com.br/encomendas/sigepweb/doc/Manual_de_Implementacao_do_Web_Service_SIGEPWEB_Logistica_Reversa.pdf).

Methods implemeted until now are:

* solicitarRange
* solicitarPostagemReversa

## Instalation
The package is available on [Packagist](http://packagist.org/packages/dafiti/correios).
Autoloading is [PSR-4](https://github.com/php-fig/fig-standards/blob/master/accepted/PSR-4-autoloader.md) compatible.

```json
{
    "require": {
        "dafiti/correios": "dev-master"
    }
}
```


## Usage
To use any method you need the following information first, which are required
for most of the API calls:

* usuario
* senha
* codAdministrativo
* contrato

To make an API call is quite simple, all you have to do use the client method
with the default configuration file and the information needed to consume it:

```php
<?php
namespace Dafiti\Correios\Service;

use Dafiti\Correios\Entity;

class ClientTest extends \PHPUnit_Framework_TestCase
{
    private $client;

    public function setUp()
    {
        $this->client = new Client(
            new Entity\Config([
                'wsdl' => 'http://webservicescolhomologacao.correios.com.br/ScolWeb/WebServiceScol?wsdl',
                'usuario' => '60618043',
                'senha' => '8o8otn',
                'codAdministrativo' => '08082650',
                'contrato' => '9912208555',
            ])
        );
    }
    public function testSolicitarRange()
    {
        $this->client->solicitarRange('LS', '', 1);
    }
}

```

You can find example for all methods available inside the tests/integration
folder.

## License

MIT License
