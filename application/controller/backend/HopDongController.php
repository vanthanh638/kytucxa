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
}