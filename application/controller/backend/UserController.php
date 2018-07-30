<?php
require_once (PATH_APPLICATION.'/model/User.php');

class UserController extends BaseController
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
        $countPage = ceil(User::getCount()/PAGE_SIZE);
        $start = ($page - 1) * PAGE_SIZE;
        $limit = PAGE_SIZE;
        $listUser = User::getByPage($start, $limit);
        $data = [
            'listUser' => $listUser,
            'cPage'    => $countPage,
        ];
        $this->view->load('/backend/admin/index', $data);
        $this->view->show();
    }
    public function add()
    {
        $this->view->load('/backend/admin/add');
        $this->view->show();
    }
    public function edit()
    {
        $id = $_GET['id'];
        if (User::checkExistId($id)) {
            $_SESSION['danger'] = 'user không tồn tại';
            header('location:index.php?c=user');
            exit();
        } else {
            $user = User::getById($id);
            $data = [
                'user' => $user,
            ];
            $this->view->load('/backend/admin/edit', $data);
            $this->view->show();
        }
    }
    public function save()
    {
        $request = $_POST;
        $id = $_GET['id'];

        if ($id != null) {
            if (User::checkExistId($id)) {
                $_SESSION['danger'] = 'user không tồn tại';
                header('location:index.php?c=user');
                exit();
            } else {
                $user = User::getById($id);
                $request['id'] = $id;
                if (User::update($request)) {
                    if ($_FILES['avatar']['name'] != '') {
                        $this->library->load('file');
                        $avatar = $this->library->file->upload('avatar');
                        User::updateAvatar($avatar, $user['username']);
                        if ($_SESSION['infoAdmin']['id'] = $id) {
                            $_SESSION['infoAdmin']['avatar'] = $avatar;
                        }
                    }
                    if ($request['password'] == '') {
                        $request['password'] = $user['password'];
                    } else {
                        $request['password'] = md5($request['password']);
                    }
                    $_SESSION['success'] = 'Cập nhật thành công';
                    header('location:index.php?c=user');
                    exit();
                } else {
                    $_SESSION['danger'] = 'Cập nhật thất bại';
                    header('location:index.php?c=user');
                    exit();
                }
            }
        } else {
            if (User::checkExistUsernae($request['username'])) {
                $_SESSION['danger'] = 'Username đà tồn tại';
                header('location:index.php?c=user');
                exit();
            } else {
                if (User::insert($request)) {
                    if ($_FILES['avatar']['name'] != '') {
                        $this->library->load('file');
                        $avatar = $this->library->file->upload('avatar');
                        User::updateAvatar($avatar, $request['username']);
                    }
                    $_SESSION['success'] = 'Thêm thành công';
                    header('location:index.php?c=user');
                    exit();
                } else {
                    $_SESSION['danger'] = 'Thêm thất bại';
                    header('location:index.php?c=user');
                    exit();
                }
            }
        }
    }
}