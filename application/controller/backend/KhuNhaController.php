<?php
require_once (PATH_APPLICATION.'/model/KhuNha.php');

class KhuNhaController extends BaseController
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
        $listKhuNha = KhuNha::getAll();

        $data = [
            'listKhuNha' => $listKhuNha,
        ];

        $this->view->load('/backend/khunha/index', $data);
        $this->view->show();
    }

    public function edit()
    {
        $id = $_GET['id'];
        if (KhuNha::checkExist($id)) {
            $khuNha = KhuNha::getById($id);
            $data = [
                'khuNha' => $khuNha,
            ];
            $this->view->load('/backend/khunha/edit', $data);
            $this->view->show();
        } else {
            $_SESSION['danger'] = 'Không tồn tại khu nhà!';
            header('location:index.php?c=khunha');
            exit();
        }
    }

    public function add()
    {
        $this->view->load('/backend/khunha/add');
        $this->view->show();
    }

    public function delete()
    {
        $id = $_GET['id'];
        if (KhuNha::checkExist($id)) {
            if (KhuNha::delete($id)) {
                $_SESSION['success'] = 'Xóa thành công';
                header('location:index.php?c=khunha');
                exit();
            } else {
                $_SESSION['danger'] = 'Xóa không thành công';
                header('location:index.php?c=khunha');
                exit();
            }
        } else {
            $_SESSION['danger'] = 'Không tồn tại khu nhà!';
            header('location:index.php?c=khunha');
            exit();
        }
    }

    public function save()
    {
        $id = $_GET['id'];
        $request = $_POST;
        if ($id != null) {
            if (KhuNha::checkExist($id)) {
                // update
                $result = KhuNha::update($request, $id);
                if ($result) {
                    $_SESSION['success'] = 'Cập nhật thành công';
                    header('location:index.php?c=khunha');
                    exit();
                } else {
                    $_SESSION['danger'] = 'Cập nhật không thành công';
                    header('location:index.php?c=khunha');
                    exit();
                }
            } else {
                $_SESSION['danger'] = 'Không tồn tại khu nhà!';
                header('location:index.php?c=khunha');
                exit();
            }
        } else {
            // thêm mới
            $result = KhuNha::add($request);
            if ($result) {
                $_SESSION['success'] = 'Thêm mới thành công';
                header('location:index.php?c=khunha');
                exit();
            } else {
                $_SESSION['danger'] = 'Thêm mới không thành công';
                header('location:index.php?c=khunha');
                exit();
            }
        }
    }
}