<?php
require_once (PATH_APPLICATION.'/model/Model.php');

class HopDong extends Model
{
    public static function getAll()
    {
        $listSV = [];
        $conn = Model::getInstance();
        $sql = 'SELECT * FROM hopdong ORDER BY NgayTao DESC';
        $stmt = $conn->query($sql);
        foreach ($stmt->fetchAll() as $sinhVien) {
            $listSV[] = $sinhVien;
        }
        return $listSV;
    }

    public static function insert($request)
    {
        $conn = Model::getInstance();
        $sql = 'INSERT INTO hopdong(MaSV, idPhong, NgayBatDau, NgayKetThuc, NgayTao) VALUE (:MaSV, :idPhong, :NgayBatDau, :NgayKetThuc, :NgayTao)';
        $stmt = $conn->prepare($sql);
        $data = [
            'MaSV'        => $request['MaSV'],
            'idPhong'     => $request['idPhong'],
            'NgayBatDau'  => $request['NgayBatDau'],
            'NgayKetThuc' => $request['NgayKetThuc'],
            'NgayTao'     => $request['NgayTao'],
        ];
        return $stmt->execute($data);
    }
}