<?php
require_once (PATH_APPLICATION.'/model/Model.php');

class Admin extends Model
{

    public static function login($username, $password)
    {
        $conn = Model::getInstance();
        $stmt = $conn->prepare('SELECT * FROM admin WHERE username = :username AND password = :password LIMIT 1');
        $data = [
            'username' => $username,
            'password' => md5($password),
        ];
        $stmt->execute($data);
        $result = $stmt->fetch();
        if ($result !== false) {
            return $result;
        } else {
            return NULL;
        }
    }
}