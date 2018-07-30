<?php
require_once (PATH_APPLICATION . '/controller/backend/AuthController.php');

class BaseController extends CoreController{
    public $data;

    public function __construct() {
        parent::__construct();

        $this->data =[
        ];
    }

}
