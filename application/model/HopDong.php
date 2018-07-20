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
}