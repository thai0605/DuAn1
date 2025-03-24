<?php
session_start();

require_once '../commons/env.php';
require_once '../commons/core.php';
require_once './models/AuthModel.php';

// Lấy action từ URL
$act = $_GET['act'] ?? '';
$publicRoutes = ['loginAdmin', 'show-login-form', 'end-session'];

require_once './controllers/DanhMucController.php';
require_once './controllers/HomeController.php';
require_once './controllers/SanPhamController.php';
require_once './controllers/AuthController.php';

require_once './models/DanhMuc.php';
require_once './models/Thongke.php';
require_once './models/SanPham.php';
require_once './models/AuthModel.php';

$home = new HomeController();

// Include header nếu không phải trang login
if (!in_array($act, $publicRoutes)) {
    include_once "./views/layout/header.php";
    include_once "./views/layout/sidebar.php";
}

match ($act) {
    // '' => !isset($_SESSION['admin_id'])
    // ? header('Location: ?act=show-login-form')
    // : $home->views_home(),
    // 'show-login-form' => (new AuthController())->showLoginForm(),

    '/' => $home->views_home(),

    //danh mục
    'listdm' => (new DanhMucController())->danhsachDanhMuc(),
    'form-them-danh-muc' => (new DanhMucController())->formAddDanhMuc(),
    'post-danh-muc' => (new DanhMucController())->postAddDanhMuc(),
    'form-sua-danh-muc' => (new DanhMucController())->formEditDanhMuc(),
    'sua-danh-muc' => (new DanhMucController())->postEditDanhMuc(),
    'xoa-danh-muc' => (new DanhMucController())->deleteDanhMuc(),
    //sanpham
    'san-pham' => (new SanPhamController())->danhSachSanPham(),
    'form-them-san-pham' => (new SanPhamController())->formAddSanPham(),
    'them-san-pham' => (new SanPhamController())->postAddSanPham(),
    'form-sua-san-pham' => (new SanPhamController())->formEditSanPham(),
    'sua-san-pham' => (new SanPhamController())->postEditSanPham(),
    'xoa-san-pham' => (new SanPhamController())->postDeleteSanPham(),


};

// Include footer nếu không phải trang login
if (!in_array($act, $publicRoutes)) {
    include_once "./views/layout/footer.php";
}