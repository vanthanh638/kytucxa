<?php
require_once (PATH_APPLICATION.'/model/HopDong.php');
require_once (PATH_APPLICATION.'/model/SinhVien.php');
require_once (PATH_APPLICATION.'/model/Phong.php');

class HopDongController extends BaseController
{
    public function index()
    {
        $listHD    = HopDong::getAll();
        $listPhong = Phong::getAll();
        $listSV    = SinhVien::getAll();
        $data = [
            'listHD'    => $listHD,
            'listSV'    => $listSV,
            'listPhong' => $listPhong,
        ];
        $this->view->load('/backend/hopdong/index', $data);
        $this->view->show();
    }

    public function add()
    {
        $listPhong = Phong::getPhongTrong();
        $listSV    = SinhVien::getAll();
        $data = [
            'listSV'    => $listSV,
            'listPhong' => $listPhong,
        ];
        $this->view->load('backend/hopdong/add', $data);
        $this->view->show();
    }

    public function save()
    {
        $request = $_POST;
        $id = $_GET['id'];
        if ($id != null) {

        } else {
            $request['NgayTao'] = date('Y-m-d');
            if (HopDong::insert($request)) {
                SinhVien::updatePhong($request['MaSV'], $request['idPhong']);
                $_SESSION['success'] = 'Thêm mới thành công';
                header('location:index.php?c=hopdong');
                exit();
            } else {
                $_SESSION['danger'] = 'Thêm mới không thành công';
                header('location:index.php?c=hopdong');
                exit();
            }
        }
    }
}