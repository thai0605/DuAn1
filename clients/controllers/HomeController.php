<?php

class HomeController{
    public $home;
    public $danhmuc;
    public $sanpham;
    public $banner;


    public function __construct(){
        $this->danhmuc = new Danhmuc();
        $this->sanpham = new SanPham();
    }

    public function home(){
        try {
           $listDanhMuc = $this->danhmuc->getAllDanhMuc();
           $sanphamnew = $this->sanpham->getAllSanPham();
           $sanphams_hot = $this->sanpham->getAllSanPhamHot();
        //    $sanphams_sale=$this->modelSanPham->getAllSanPhamSale();
        //    $listbanner=$this->banner->getAllbanner();

        require_once 'clients/views/layouts/navbar.php';
        require_once 'clients/views/home.php'; 
        } catch (\Throwable $th) {
            error_log("Lỗi trong home: " . $th->getMessage());
        }
    }

    public function chitietsanpham(){
        if (!isset($_GET['id'])) {
            // Xử lý khi không có id
            header('Location: clients');
            return;
        }

        $sanphamCT = $this->sanpham->getSanPhamById($_GET['id']);
        require_once 'clients/views/chitietsp.php';
    }

    public function sanpham() {
        $listDanhMuc = $this->danhmuc->getAllDanhMuc();
        $listsp= $this->sanpham->getAllSanPham();
        require_once 'clients/views/sanpham.php';
    }
}