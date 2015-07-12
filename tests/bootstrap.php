<?php

if (!file_exists($autoload = 'vendor/autoload.php')) {
    throw new RuntimeException('Dependencies are not installed!');
}

require $autoload;
