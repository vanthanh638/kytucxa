<?php
if (!defined('PATH_SYSTEM')) {
    die('Bad requested!');
}

class CoreController
{
    protected $config = NULL;
    protected $view = NULL;
    protected $model = NULL;
    protected $library = NULL;
    protected $helper = NULL;

    public function __construct($is_controller = true) {
        require_once(PATH_SYSTEM . '/core/loader/ConfigLoader.php');
        $this->config = new ConfigLoader();
//        $this->config->load('config');

        require_once(PATH_SYSTEM . '/core/loader/LibraryLoader.php');
        $this->library = new LibraryLoader();

        require_once(PATH_SYSTEM . '/core/loader/HelperLoader.php');
        $this->helper = new HelperLoader();

        require_once(PATH_SYSTEM . '/core/loader/ViewLoader.php');
        $this->view = new ViewLoader();
    }
}