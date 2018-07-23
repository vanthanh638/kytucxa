<?php
require_once (PATH_APPLICATION.'/model/Model.php');

class Phong extends Model
{
    public static function getAll()
    {
        $listPhong = [];
        $conn = Model::getInstance();
        $stmt = $conn->query('SELECT * FROM phong ORDER BY IdKhuNha');
        foreach ($stmt->fetchAll() as $phong) {
            $listPhong[] = $phong;
        }
        return $listPhong;
    }

    public static function insert($request)
    {
        $conn = Model::getInstance();
        $stmt = $conn->prepare('INSERT INTO phong(TenPhong, IdKhuNha, SoSV, DaO) VALUES (:tenPhong, :idKhuNha, :soSV, :daO)');
        $data = [
            'tenPhong' => $request['TenPhong'],
            'idKhuNha' => $request['IdKhuNha'],
            'soSV'     => $request['SoSV'],
            'daO'      => 0,
        ];
        return $stmt->execute($data);
    }

    public static function checkExist($id)
    {
        $conn = Model::getInstance();
        $stmt = $conn->query("SELECT * FROM phong WHERE id = $id");
        $result = $stmt->fetch();
        if ($result !== false) {
            return true;
        } else {
            return false;
        }
    }

    public static function GetById($id)
    {
        $conn = Model::getInstance();
        $stmt = $conn->query("SELECT * FROM phong WHERE id = $id");
        return $stmt->fetch();
    }

    public static function update($request)
    {
        $conn = Model::getInstance();
        $stmt = $conn->prepare('UPDATE phong SET TenPhong = :tenPhong, IdKhuNha = :idKhuNha, SoSV = :soSV WHERE id = :id');
        $data = [
            'tenPhong' => $request['TenPhong'],
            'idKhuNha' => $request['IdKhuNha'],
            'soSV'     => $request['SoSV'],
            'id'       => $request['id'],
        ];
        return $stmt->execute($data);
    }

    public static function delete($id)
    {
        $conn = Model::getInstance();
        $stmt = $conn->prepare("DELETE FROM phong WHERE id = $id");
        return $stmt->execute();
    }

    public static function getPhongTrong()
    {
        $listPhong = [];
        $conn = Model::getInstance();
        $sttm = $conn->query('SELECT * FROM phong WHERE (SoSV - DaO) > 0 ORDER BY IdKhuNha');
        foreach ($sttm->fetchAll() as $phong) {
            $listPhong[] = $phong;
        }
        return $listPhong;
    }

    public static function updateDaO($IdPhong)
    {
        $conn = Model::getInstance();
        $stmt = $conn->prepare("UPDATE phong SET DaO = DaO + 1 WHERE id = $IdPhong");
        return $stmt->execute();
    }
}