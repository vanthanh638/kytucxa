<?php
require_once (PATH_APPLICATION.'/model/Model.php');

class SinhVien extends Model
{
    public static function getAll()
    {
        $listSV = [];
        $conn = Model::getInstance();
        $sttm = $conn->query('SELECT * FROM sinhvien ORDER BY TenSV DESC');
        foreach ($sttm->fetchAll() as $sinhVien) {
            $listSV[] = $sinhVien;
        }
        return $listSV;
    }

    public static function insert($request)
    {
        $conn = Model::getInstance();
        $sttm = $conn->prepare('INSERT INTO sinhvien(MaSV, password, TenSV, Lop, Email, GioiTinh, SDT, QueQuan, IdPhong) VALUES (:MaSV, :password, :TenSV, :Lop, :Email, :GioiTinh, :SDT, :QueQuan, :IdPhong)');
        $data = [
            'MaSV' => $request['MaSV'],
            'password' => $request['password'],
            'TenSV'    => $request['TenSV'],
            'Lop'      =>$request['lop'],
            'Email'    => $request['email'],
            'GioiTinh' => $request['GioiTinh'],
            'SDT'      => $request['SDT'],
            'QueQuan'  => $request['QueQuan'],
            'IdPhong'  => $request['IdPhong'],
        ];
        return $sttm->execute($data);
    }

    public static function getById($maSV)
    {
        $conn = Model::getInstance();
        $sttm = $conn->query("SELECT * FROM sinhvien WHERE MaSV = $maSV");
        return $sttm->fetch();
    }

    public static function checkExist($maSV)
    {
        $conn = Model::getInstance();
        $sttm = $conn->query("SELECT * FROM sinhvien WHERE MaSV = $maSV");
        $result = $sttm->fetch();
        if ($result !== false) {
            return true;
        } else {
            return false;
        }
    }

    public static function update($request)
    {
        if ($request['password'] == '') {
            $request['password'] = self::getById($request['MaSV']);
        }
        $conn = Model::getInstance();
        $sttm = $conn->prepare('UPDATE sinhvien SET password = :password, TenSV = :TenSV, Lop = :Lop, Email = :Email, GioiTinh = :GioiTinh, SDT = :SDT, QueQuan = :QueQuan WHERE MaSV = :MaSV');
        $data = [
            'MaSV' => $request['MaSV'],
            'password' => $request['password'],
            'TenSV'    => $request['TenSV'],
            'Lop'      =>$request['lop'],
            'Email'    => $request['email'],
            'GioiTinh' => $request['GioiTinh'],
            'SDT'      => $request['SDT'],
            'QueQuan'  => $request['QueQuan'],
        ];
        return $sttm->execute($data);
    }

    public static function delete($maSV)
    {
        $conn = Model::getInstance();
        $sttm = $conn->prepare("DELETE FROM sinhvien WHERE MaSV = $maSV");
        return $sttm->execute();
    }
}