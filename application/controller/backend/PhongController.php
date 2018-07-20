<?php
require_once (PATH_APPLICATION.'/model/Phong.php');
require_once (PATH_APPLICATION.'/model/KhuNha.php');

class PhongController extends BaseController
{
    public function index()
    {
        $listPhong = Phong::getAll();
        $listKhuNha = KhuNha::getAll();
        $data = [
            'listPhong'  => $listPhong,
            'listKhuNha' => $listKhuNha,
        ];
        $this->view->load('/backend/phong/index', $data);
        $this->view->show();
    }

    public function add()
    {
        $listKhuNha = KhuNha::getAll();
        $data = [
            'listKhuNha' => $listKhuNha,
        ];
        $this->view->load('/backend/phong/add', $data);
        $this->view->show();
    }

    public function edit()
    {
        $id = $_GET['id'];
        if (Phong::checkExist($id)) {
            $listKhuNha = KhuNha::getAll();
            $phong = Phong::GetById($id);
            $data = [
                'phong'       => $phong,
                'listKhuNha'  => $listKhuNha,
            ];
            $this->view->load('/backend/phong/edit', $data);
            $this->view->show();
        } else {
            $_SESSION['danger'] = 'Không tồn tại phòng';
            header('location:index.php?c=phong');
            exit();
        }
    }

    public function delete()
    {
        $id = $_GET['id'];
        if (Phong::checkExist($id)) {
            if (Phong::delete($id)) {
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
        $id = $_GET['id'];
        $request = $_POST;

        if ($id != null) {
            // insert
            if (Phong::checkExist($id)) {
                $request['id'] = $id;
                if (Phong::update($request)) {
                    $_SESSION['success'] = 'Sửa thành công';
                    header('location:index.php?c=phong');
                    exit();
                } else {
                    $_SESSION['danger'] = 'Sửa thất bại';
                    header('location:index.php?c=phong');
                    exit();
                }
            }
        } else {
            if(Phong::insert($request)) {
                $_SESSION['success'] = 'Thêm thành công';
                header('location:index.php?c=phong');
                exit();
            } else {
                $_SESSION['danger'] = 'Thêm thất bại';
                header('location:index.php?c=phong');
                exit();
            }
        }
    }
}