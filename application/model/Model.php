<?php

require_once (PATH_SYSTEM . '/config/database.php');
class Model extends CoreModel
{
    public function __construct()
    {
        parent::__construct();
    }

    private function __clone()
    {
    }

}