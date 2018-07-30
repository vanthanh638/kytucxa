<?php
require_once (PATH_APPLICATION.'/model/Admin.php');

class AuthController extends BaseController
{
    public function login()
    {
        $this->view->load('/backend/auth/login');
        $this->view->show();
    }
    public function postLogin()
    {
        $request = $_POST;
        $result  = Admin::login($request['username'], $request['password']);
        if ($result !== NULL) {
            $_SESSION['infoAdmin'] = $result;
            header('location:index.php?c=sinhvien');
            die();
        } else {
            $_SESSION['danger'] = 'Username or Password is valid!';
            header('location:index.php?c=auth&a=login');
            die();
        }
    }
    public function logout()
    {
        if (isset($_SESSION['infoAdmin'])) {
            unset($_SESSION['infoAdmin']);
        }
        header('location:index.php?c=auth&a=login');
        exit();
    }
    public static function checkAdminlogin() {
        if (!isset($_SESSION['infoAdmin'])) {
            return FALSE;
        } else {
            return TRUE;
        }
    }
}