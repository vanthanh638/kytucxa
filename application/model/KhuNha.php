<?php
require_once (PATH_APPLICATION.'/model/Model.php');

class KhuNha extends Model
{
    public static function getAll()
    {
        $listKhuNha = [];
        $conn = Model::getInstance();
        $sttm = $conn->query('SELECT * FROM khunha');
        foreach ($sttm->fetchAll() as $khuNha) {
            $listKhuNha[] = $khuNha;
        }
        return $listKhuNha;
    }

    public static function getById($id)
    {
        $conn = Model::getInstance();
        $sttm = $conn->query("SELECT * FROM khunha WHERE id = $id");
        $result = $sttm->fetch();
        return $result;
    }

    public static function checkExist($id)
    {
        $conn = Model::getInstance();
        $sttm = $conn->query("SELECT * FROM khunha WHERE id = $id");
        $result = $sttm->fetch();
        if ($result !== false) {
            return true;
        } else {
            return false;
        }
    }

    public static function update($request, $id)
    {
        $conn = Model::getInstance();
        $sttm = $conn->prepare('UPDATE khunha SET TenKhuNha = :tenKhuNha WHERE id = :id');
        $data = [
            'id' => $id,
            'tenKhuNha' => $request['TenKhuNha'],
        ];
        return $sttm->execute($data);
    }

    public static function add($request)
    {
        $conn = Model::getInstance();
        $sttm = $conn->prepare('INSERT INTO khunha(TenKhuNha) VALUES (:tenKhuNha)');
        $data = [
            'tenKhuNha' => $request['TenKhuNha'],
        ];
        return $sttm->execute($data);
    }

    public static function delete($id)
    {
        $conn = Model::getInstance();
        $sttm = $conn->prepare('DELETE FROM khunha WHERE id = :id');
        $data = [
            'id' => $id,
        ];
        return $sttm->execute($data);
    }
}