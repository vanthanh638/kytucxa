<?php
if ( ! defined('PATH_SYSTEM')) {
    die ('Bad requested!');
}

class HelperLoader
{

    public function __construct()
    {
    }

    public function load($helper)
    {
        $helper = ucfirst($helper) . '_Helper';
        require_once(PATH_SYSTEM . '/helper/' . $helper . '.php');
    }
}