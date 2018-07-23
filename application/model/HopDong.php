<?php
require_once (PATH_APPLICATION.'/model/Model.php');

class HopDong extends Model
{
    public static function getAll()
    {
        $listSV = [];
        $conn = Model::getInstance();
        $sql = 'SELECT * FROM hopdong ORDER BY NgayKetThuc DESC';
        $sttm = $conn->query($sql);
        foreach ($sttm->fetchAll() as $sinhVien) {
            $listSV[] = $sinhVien;
        }
        return $listSV;
    }

    public static function insert($request)
    {
        $conn = Model::getInstance();
        $sql = 'INSERT INTO hopdong(MaSV, idPhong, NgayBatDau, NgayKetThuc, NgayTao) VALUE (:MaSV, :idPhong, :NgayBatDau, :NgayKetThuc, :NgayTao)';
        $sttm = $conn->prepare($sql);
        $data = [
            'MaSV'        => $request['MaSV'],
            'idPhong'     => $request['idPhong'],
            'NgayBatDau'  => $request['NgayBatDau'],
            'NgayKetThuc' => $request['NgayKetThuc'],
            'NgayTao'     => $request['NgayTao'],
        ];
        return $sttm->execute($data);
    }
}