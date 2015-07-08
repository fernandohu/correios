<?php

class SoapAdapter extends SoapClient
{

    /**
     * Soap adapter which will conect to SIGEP api
     * using an configuration Object
     *
     * @var array
     * @access private
     */
    private $configs;

    public function __contruct(array $configs)
    {
         
    }
}
