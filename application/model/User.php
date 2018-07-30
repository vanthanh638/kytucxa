<?php
require_once (PATH_APPLICATION.'/model/Model.php');

class User extends Model
{

    public static function getByPage($start, $limit)
    {
        $conn = Model::getInstance();
        $sql = "SELECT * FROM admin LIMIT $start, $limit";
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        $listUser = [];
        foreach ($stmt->fetchAll() as $user) {
            $listUser[] = $user;
        }
        return $listUser;
    }

    public static function getCount()
    {
        $conn = Model::getInstance();
        $stmt = $conn->query('SELECT COUNT(*) AS csv FROM admin');
        $result = $stmt->fetch();
        return $result['csv'];
    }

    public static function insert($request)
    {
        $conn = Model::getInstance();
        $sql  = 'INSERT INTO admin(username, password, fullname) VALUES (:username, :password, :fullname)';
        $stmt = $conn->prepare($sql);
        $data = [
            'username' => $request['username'],
            'password' => md5($request['password']),
            'fullname' => $request['fullname'],
        ];
        return $stmt->execute($data);
    }

    public static function updateAvatar($avatar, $username)
    {
        $conn = Model::getInstance();
        $sql = 'UPDATE admin SET avatar = :avatar WHERE username = :username';
        $stmt = $conn->prepare($sql);
        $data = [
            'avatar'   => $avatar,
            'username' => $username,
        ];
        return $stmt->execute($data);
    }

    public static function checkExistUsernae($username)
    {
        $conn = Model::getInstance();
        $sql = 'SELECT * FROM admin WHERE username = :username';
        $stmt = $conn->prepare($sql);
        $data = [
            'username' => $username,
        ];
        $stmt->execute($data);
        $result = $stmt->fetch();
        if ($result !== false) {
            return true;
        } else {
            return false;
        }
    }

    public static function checkExistId($id)
    {
        $conn = Model::getInstance();
        $sql = 'SELECT * FROM admin WHERE id = :id';
        $stmt = $conn->prepare($sql);
        $data = [
            'id' => id,
        ];
        $stmt->execute($data);
        $result = $stmt->fetch();
        if ($result !== false) {
            return true;
        } else {
            return false;
        }
    }

    public static function getById($id)
    {
        $conn = Model::getInstance();
        $stmt = $conn->query("SELECT * FROM admin WHERE id = $id");
        return $stmt->fetch();
    }

    public static function update($request)
    {
        $conn = Model::getInstance();
        $sql  = 'UPDATE admin SET password = :password, fullname = :fullname WHERE id = :id';
        $stmt = $conn->prepare($sql);
        $data = [
            'id' => $request['id'],
            'password' => md5($request['password']),
            'fullname' => $request['fullname'],
        ];
        return $stmt->execute($data);
    }
}