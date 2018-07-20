<?php
require_once (PATH_APPLICATION.'/model/Model.php');

class Phong extends Model
{
    public static function getAll()
    {
        $listPhong = [];
        $conn = Model::getInstance();
        $sttm = $conn->query('SELECT * FROM phong ORDER BY IdKhuNha');
        foreach ($sttm->fetchAll() as $phong) {
            $listPhong[] = $phong;
        }
        return $listPhong;
    }

    public static function insert($request)
    {
        $conn = Model::getInstance();
        $sttm = $conn->prepare('INSERT INTO phong(TenPhong, IdKhuNha, SoSV, DaO) VALUES (:tenPhong, :idKhuNha, :soSV, :daO)');
        $data = [
            'tenPhong' => $request['TenPhong'],
            'idKhuNha' => $request['IdKhuNha'],
            'soSV'     => $request['SoSV'],
            'daO'      => 0,
        ];
        return $sttm->execute($data);
    }

    public static function checkExist($id)
    {
        $conn = Model::getInstance();
        $sttm = $conn->query("SELECT * FROM phong WHERE id = $id");
        $result = $sttm->fetch();
        if ($result !== false) {
            return true;
        } else {
            return false;
        }
    }

    public static function GetById($id)
    {
        $conn = Model::getInstance();
        $sttm = $conn->query("SELECT * FROM phong WHERE id = $id");
        return $sttm->fetch();
    }

    public static function update($request)
    {
        $conn = Model::getInstance();
        $sttm = $conn->prepare('UPDATE phong SET TenPhong = :tenPhong, IdKhuNha = :idKhuNha, SoSV = :soSV WHERE id = :id');
        $data = [
            'tenPhong' => $request['TenPhong'],
            'idKhuNha' => $request['IdKhuNha'],
            'soSV'     => $request['SoSV'],
            'id'       => $request['id'],
        ];
        return $sttm->execute($data);
    }

    public static function delete($id)
    {
        $conn = Model::getInstance();
        $sttm = $conn->prepare("DELETE FROM phong WHERE id = $id");
        return $sttm->execute();
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
        $sttm = $conn->prepare("UPDATE phong SET DaO = DaO + 1 WHERE id = $IdPhong");
        return $sttm->execute();
    }
}