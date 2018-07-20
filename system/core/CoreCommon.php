<?php
if (!defined('PATH_SYSTEM')) {
    die('Bad requested!');
}

class CoreCommon
{
    protected $config;

    public function __construct()
    {
    }

    public function load()
    {
        $config = require_once (PATH_SYSTEM.'/config/config.php');

        $controller = empty($_GET['c']) ? $config['default_controller'] : $_GET['c'];

        $action = empty($_GET['a']) ? $config['default_action'] : $_GET['a'];

        $controller = ucfirst(strtolower($controller)) . 'Controller';

        $action = strtolower($action);

        if (!file_exists(PATH_APPLICATION . '/controller/' . NAME_APPLICATION . '/' . $controller . '.php')) {
            require_once(PATH_APPLICATION . '/view/error/404.php');
            die();
        }else{
            require_once(PATH_SYSTEM . '/core/CoreController.php');
            require_once(PATH_SYSTEM . '/core/CoreModel.php');

            // Load Base_Controller
            if (file_exists(PATH_APPLICATION . '/controller/' . NAME_APPLICATION . '/BaseController.php')){
                require_once(PATH_APPLICATION . '/controller/' . NAME_APPLICATION . '/BaseController.php');
            }

            require_once(PATH_APPLICATION . '/controller/' . NAME_APPLICATION . '/' . $controller . '.php');

            if (!class_exists($controller)) {
                require_once(PATH_APPLICATION . '/view/error/404.php');
            }else{
                $controllerObject = new $controller();

                if (!method_exists($controllerObject, $action)) {
                    require_once(PATH_APPLICATION . '/view/error/404.php');
                    die();
                }else{
                    $controllerObject->{$action}();
                }
            }
        }
    }
}