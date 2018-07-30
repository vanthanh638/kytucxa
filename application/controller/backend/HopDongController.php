<?php
require_once (PATH_APPLICATION.'/model/HopDong.php');
require_once (PATH_APPLICATION.'/model/SinhVien.php');
require_once (PATH_APPLICATION.'/model/Phong.php');

class HopDongController extends BaseController
{
    public function __construct()
    {
        parent::__construct();
        if (! AuthController::checkAdminlogin() ) {
            header('location:index.php?c=auth&a=login');
            exit();
        }
    }
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

    public function delete()
    {
        $id = $_GET['id'];
        if (HopDong::checkExist($id)) {
            if (HopDong::delete($id)) {
                $_SESSION['success'] = 'Xóa thành công';
                header('location:index.php?c=phong');
                exit();
            } else {
                $_SESSION['danger'] = 'Xóa thất bại';
                header('location:index.php?c=phong');
                exit();
            }
        } else {
            $_SESSION['danger'] = 'Không tồn tại phòng';
            header('location:index.php?c=phong');
            exit();
        }
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