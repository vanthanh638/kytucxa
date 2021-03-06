<?php
require_once (PATH_APPLICATION.'/model/Model.php');

class SinhVien extends Model
{
    public static function getAll()
    {
        $listSV = [];
        try {
            $conn = Model::getInstance();
            $stmt = $conn->query('SELECT * FROM sinhvien ORDER BY TenSV DESC');
            foreach ($stmt->fetchAll() as $sinhVien) {
                $listSV[] = $sinhVien;
            }
        } catch (PDOException $e) {
        }
        return $listSV;
    }

    public static function insert($request)
    {
        $conn = Model::getInstance();
        $stmt = $conn->prepare('INSERT INTO sinhvien(MaSV, password, TenSV, Lop, Email, GioiTinh, SDT, QueQuan, IdPhong, avatar) VALUES (:MaSV, :password, :TenSV, :Lop, :Email, :GioiTinh, :SDT, :QueQuan, :IdPhong, :avatar)');
        $data = [
            'MaSV' => $request['MaSV'],
            'password' => md5($request['password']),
            'TenSV'    => $request['TenSV'],
            'Lop'      =>$request['lop'],
            'Email'    => $request['email'],
            'GioiTinh' => $request['GioiTinh'],
            'SDT'      => $request['SDT'],
            'QueQuan'  => $request['QueQuan'],
            'IdPhong'  => $request['IdPhong'],
            'avatar'  => $request['avatar'],
        ];
        return $stmt->execute($data);
    }

    public static function getById($maSV)
    {
        $conn = Model::getInstance();
        $stmt = $conn->query("SELECT * FROM sinhvien WHERE MaSV = $maSV");
        return $stmt->fetch();
    }

    public static function checkExist($maSV)
    {
        $conn = Model::getInstance();
        $stmt = $conn->query("SELECT * FROM sinhvien WHERE MaSV = $maSV");
        $result = $stmt->fetch();
        if ($result !== false) {
            return true;
        } else {
            return false;
        }
    }

    public static function update($request)
    {
        $conn = Model::getInstance();
        $stmt = $conn->prepare('UPDATE sinhvien SET password = :password, TenSV = :TenSV, Lop = :Lop, Email = :Email, GioiTinh = :GioiTinh, SDT = :SDT, QueQuan = :QueQuan, avatar = :avatar WHERE MaSV = :MaSV');
        $data = [
            'MaSV' => $request['MaSV'],
            'password' => $request['password'],
            'TenSV'    => $request['TenSV'],
            'Lop'      =>$request['lop'],
            'Email'    => $request['email'],
            'GioiTinh' => $request['GioiTinh'],
            'SDT'      => $request['SDT'],
            'QueQuan'  => $request['QueQuan'],
            'avatar'   => $request['avatar'],
        ];
        return $stmt->execute($data);
    }

    public static function delete($maSV)
    {
        $conn = Model::getInstance();
        $stmt = $conn->prepare("DELETE FROM sinhvien WHERE MaSV = $maSV");
        return $stmt->execute();
    }

    public static function updatePhong($MaSV, $idPhong)
    {
        $conn = Model::getInstance();
        $sql = "UPDATE sinhvien SET IdPhong = $idPhong WHERE MaSV = $MaSV";
        $stmt = $conn->prepare($sql);
        return $stmt->execute();
    }

    public static function search($request, $offset)
    {
        $conn = Model::getInstance();
        $sql = 'SELECT * FROM sinhvien WHERE TenSV LIKE :tenSV AND Lop LIKE :lop';
        $pageSize = PAGE_SIZE;
        if ($request['masv'] != null) {
            $masv = $request['masv'];
            $sql .= ' AND MaSV = '. (int)$masv;
        }
        $sql .= " LIMIT $offset, $pageSize";
        $stmt = $conn->prepare($sql);
        $data = [
            'tenSV' => '%'.$request['tensv'].'%',
            'lop'   => '%'.$request['lop'].'%',
        ];
        echo "<script>console.log( 'Debug Objects: " . $sql . "' );</script>";
        $stmt->execute($data);
        $listSV = [];
        foreach ($stmt->fetchAll() as $sinhvien) {
            $listSV[] = $sinhvien;
        }
        return $listSV;
    }

    public static function getCount()
    {
        $conn = Model::getInstance();
        $stmt = $conn->query('SELECT COUNT(*) AS csv FROM sinhvien');
        $result = $stmt->fetch();
        return $result['csv'];
    }

    public static function getByPage($page)
    {
        $conn = Model::getInstance();
        $start = ($page - 1) * PAGE_SIZE;
        $limit = PAGE_SIZE;
        $sql = "SELECT * FROM sinhvien ORDER BY TenSV DESC LIMIT $start, $limit";
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        $listSV = [];
        foreach ($stmt->fetchAll() as $sinhvien) {
            $listSV[] = $sinhvien;
        }
        return $listSV;
    }

    public static function getRowCount($request)
    {
        $conn = Model::getInstance();
        $sql = 'SELECT * FROM sinhvien WHERE TenSV LIKE :tenSV AND Lop LIKE :lop';
        if ($request['masv'] != null) {
            $masv = $request['masv'];
            $sql .= ' AND MaSV = '. (int)$masv;
        }
        $stmt = $conn->prepare($sql);
        $data = [
            'tenSV' => '%'.$request['tensv'].'%',
            'lop'   => '%'.$request['lop'].'%',
        ];

        return $stmt->rowCount( $stmt->execute($data));
    }
}