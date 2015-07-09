<?php

date_default_timezone_set('America/Sao_Paulo');

defined('DS') || define('DS', DIRECTORY_SEPARATOR);
define('ROOT', realpath(__DIR__) . DS);

if (!file_exists($autoload = ROOT . 'vendor/autoload.php')) {
    throw new RuntimeException('Dependencies are not installed!');
}

if (!defined('APP_ENV')) {
    define('APP_ENV', (getenv('APP_ENV') ? getenv('APP_ENV') : 'prod'));
}

require $autoload;

