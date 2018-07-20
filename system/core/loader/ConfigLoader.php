<?php
if ( ! defined('PATH_SYSTEM')) {
    die ('Bad requested!');
}

class ConfigLoader
{
    protected $config = [];

    public function __construct()
    {
    }

    public function load($config)
    {
        if (file_exists(PATH_APPLICATION . '/config/'. NAME_APPLICATION . '.php')) {
            $config = require_once(PATH_APPLICATION . '/config/'. NAME_APPLICATION . '.php');

            if( !empty($config) ){
                foreach ($config as $key => $item) {
                    $this->config[$key] = $item;
                }
            }

            return true;
        }

        return false;
    }

}