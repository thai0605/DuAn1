<?php

class HomeController{

    public $danhmuc;
    public $sanpham;
    public $banner;
    public $sanphamdm;
    public $binhluan;


    public function __construct(){
        $this->danhmuc = new Danhmuc();
        $this->sanpham = new SanPham();
        $this->banner = new Banner();
        $this->binhluan = new BinhLuan();
        
    }

    public function home(){
        try {
           $listDanhMuc = $this->danhmuc->getAllDanhMuc();
           $sanphamnew = $this->sanpham->getAllSanPham();
           $sanphams_hot = $this->sanpham->getAllSanPhamHot();
           $sanphams_sale=$this->sanpham->getAllSanPhamSale();
           $listbanner=$this->banner->getAllbanner();

        require_once 'clients/views/layouts/navbar.php';
        require_once 'clients/views/home.php'; 
        } catch (\Throwable $th) {
            error_log("Lỗi trong home: " . $th->getMessage());
        }
    }

    public function chitietsanpham(){

        $binhluans = $this->binhluan->getAllBinhLuan();
        $danhgias = $this->binhluan->getAllDanhGia();
        if (!isset($_GET['id'])) {
            // Xử lý khi không có id
            header('Location: clients');
            return;
        }

        $sanphamCT = $this->sanpham->getSanPhamById($_GET['id']);
        $sanphamCT['variants'] = $this->sanpham->getSanPhamAllVariant($_GET['id']);
        $sanphamCL = [];
        if ($sanphamCT) {
            $sanphamCL = $this->sanpham->getSanPhamCungLoai($sanphamCT['category_id'],$_GET['id']);
        } 
        require_once 'clients/views/chitietsp.php';
    }

    public function sanpham() {
        $listDanhMuc = $this->danhmuc->getAllDanhMuc();
        $listsp= $this->sanpham->getAllSanPham();
        require_once 'clients/views/sanpham.php';
    }
    public function search() {
        try {
            // Lấy tham số tìm kiếm từ URL
            $keyword = isset($_GET['keyword']) ? trim($_GET['keyword']) : '';
            $category_id = isset($_GET['category_id']) ? $_GET['category_id'] : '';
            $price_range = isset($_GET['price_range']) ? $_GET['price_range'] : '';
            $sort = isset($_GET['sort']) ? $_GET['sort'] : '';

            // Xử lý price range
            $price_min = 0;
            $price_max = PHP_INT_MAX;
            if (!empty($price_range)) {
                list($price_min, $price_max) = explode('-', $price_range);
            }

            // Lấy danh sách danh mục cho form lọc
            $listdm = $this->danhmuc->getAllDanhMuc();

            // Tìm kiếm sản phẩm
            $listsp = $this->sanpham->searchProducts(
                $keyword,
                $category_id,
                $price_min,
                $price_max,
                $sort
            );

            // Load view
            require_once 'clients/views/search.php';
        } catch (Exception $e) {
            error_log("Lỗi trong views_search: " . $e->getMessage());
            $error_message = "Đã xảy ra lỗi khi tìm kiếm sản phẩm.";
            require_once 'clients/views/search.php';
           
        }
    }  
    public function addBinhluan() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $user_id = $_POST['user_id'] ?? null;
            $comics_id = $_POST['comics_id'] ?? null;
            $Content = $_POST['Content'] ?? null;

            if ($user_id && $comics_id && $Content) {
                $result = $this->binhluan->addComment($user_id, $comics_id, $Content);
    
                if ($result) {
                    header('location:?act=chitietsp&id='.$comics_id);
                } else {
                    echo "Đã có lỗi xảy ra khi thêm bình luận.";
                }
            } else {
                echo "Vui lòng nhập đầy đủ thông tin.";
            }
        }
    }

    public function addDanhGia() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $user_id = $_POST['user_id'] ?? null;
            $comic_id = $_POST['comic_id'] ?? null;
            $rating = $_POST['rating'] ?? null;
            $review_text = $_POST['review_text'] ?? null;

            if ($user_id && $comic_id && $rating && $review_text) {
                $result = $this->binhluan->addDanhGia($user_id, $comic_id, $rating, $review_text);

                if ($result) {
                    header('location:?act=chitietsp&id=' . $comic_id);
                } else {
                    echo "Đã có lỗi xảy ra khi thêm đánh giá.";
                }
            } else {
                echo "Vui lòng nhập đầy đủ thông tin.";
            }
        }
    }

    public function lienhe(){
        require_once 'clients/views/lienhe.php';
    }
    
}