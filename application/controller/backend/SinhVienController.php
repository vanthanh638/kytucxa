<?php
require_once (PATH_APPLICATION.'/model/SinhVien.php');
require_once (PATH_APPLICATION.'/model/Phong.php');

class SinhVienController extends BaseController
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
        $page = empty($_GET['p']) ? 1 : $_GET['p'];
        $cPage = ceil(SinhVien::getCount()/PAGE_SIZE);
        $listSV = SinhVien::getByPage($page);
        $data = [
            'listSV' => $listSV,
            'cPage'  => $cPage,
            'page'   => $page,
        ];
        $this->view->load('/backend/sinhvien/index', $data);
        $this->view->show();
    }

    public function add()
    {
        $listPhong = Phong::getPhongTrong();
//        $data = [
//            'listPhong' => $listPhong,
//        ];
        $this->view->load('/backend/sinhvien/add');
        $this->view->show();
    }

    public function edit()
    {
        $maSV = $_GET['id'];
        if (SinhVien::checkExist($maSV)) {
            $sinhVien = SinhVien::getById($maSV);
            $data = [
                'sinhVien' => $sinhVien,
            ];
            $this->view->load('/backend/sinhvien/edit', $data);
            $this->view->show();
        } else {
            $_SESSION['danger'] = 'Không tồn sinh viên';
            header('location:index.php?c=sinhvien');
            exit();
        }
    }

    public function delete()
    {
        $maSV = $_GET['id'];
        if (SinhVien::checkExist($maSV)) {
            if (SinhVien::delete($maSV)) {
                $_SESSION['success'] = 'Xóa thành công';
                header('location:index.php?c=sinhvien');
                exit();
            } else {
                $_SESSION['danger'] = 'Xóa thất bại';
                header('location:index.php?c=sinhvien');
                exit();
            }
        } else {
            $_SESSION['danger'] = 'Không tồn tại sinh viên';
            header('location:index.php?c=sinhvien');
            exit();
        }
    }

    public function save()
    {
        $id = $_GET['id'];
        $request = $_POST;
        if ($id != null) {
            if (SinhVien::checkExist($id)) {
                $request['MaSV'] = $id;
                $sv = SinhVien::getById($id);
                if ($_FILES['avatar']['name'] != '') {
                    $this->library->load('file');
                    $request['avatar'] = $this->library->file->upload('avatar');
                    $this->library->file->deleteFile($sv['avatar']);
                } else {
                    $request['avatar'] = $sv['avatar'];
                }
                if ($request['password'] == '') {
                    $request['password'] = $sv['password'];
                } else {
                    $request['password'] = md5($request['password']);
                }
                if (SinhVien::update($request)) {
                    $_SESSION['success'] = 'Sửa thành công';
                    header('location:index.php?c=sinhvien');
                    exit();
                } else {
                    $_SESSION['danger'] = 'Sửa thất bại';
                    header('location:index.php?c=sinh viên');
                    exit();
                }
            } else {
                $_SESSION['danger'] = 'Không tồn sinh viên';
                header('location:index.php?c=sinhvien');
                exit();
            }
        } else {
            if ($_FILES['avatar']['name'] != '') {
                $this->library->load('file');
                $request['avatar'] = $this->library->file->upload('avatar');
            } else {
                $request['avatar'] = '';
            }
            if (SinhVien::insert($request)) {
//                Phong::updateDaO($request['IdPhong']);
                $_SESSION['success'] = 'Thêm thành công';
                header('location:index.php?c=sinhvien');
                exit();
            } else {
                $_SESSION['danger'] = 'Thêm thất bại';
                header('location:index.php?c=sinh viên');
                exit();
            }
        }
    }
    public function search()
    {
        $request = $_POST;
        $page = empty($_POST['p']) ? 1 : $_POST['p'];
        $cPage = ceil(SinhVien::getRowCount($request)/PAGE_SIZE);
        $offset = ($page - 1) * PAGE_SIZE;
        $listSV = SinhVien::search($request, $offset);
        $data = [
            'listSV' => $listSV,
            'cPage'  => $cPage,
            'page'   => $page,
        ];
        $data = array_merge($data, $this->data);
        $this->view->load('/backend/sinhvien/list', $data);
        $this->view->show();
    }
}