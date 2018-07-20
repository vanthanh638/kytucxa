<?php

class CoreModel
{
    private static $instance = NULL;

    public function __construct()
    {
    }

    public static function getInstance()
    {
        if (!isset(self::$instance)) {
            $pdo_options = [
                PDO::ATTR_ERRMODE   => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            ];
            self::$instance = new PDO('mysql:host=' . DB_HOST . ';dbname=' . DB_NAME, DB_USER, DB_PASSWORD, $pdo_options);
            self::$instance->exec("set names utf8");
        }
        return self::$instance;
    }

    public function item($key, $default_val = '')
    {
        return isset($this->config[$key]) ? $this->config[$key] : $default_val;
    }

    public function set_item($key, $val)
    {
        $this->config[$key] = $val;
    }
}