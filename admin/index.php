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
require_once './controllers/GiaodienController.php';


require_once './models/VariantSanPham.php';
require_once './models/DanhMuc.php';
require_once './models/Thongke.php';
require_once './models/SanPham.php';
require_once './models/AuthModel.php';
require_once './models/AdminBanner.php';
$home = new HomeController();

// Include header nếu không phải trang login
if (!in_array($act, $publicRoutes)) {
    include_once "./views/layout/header.php";
    include_once "./views/layout/sidebar.php";
}

match ($act) {
    '' => !isset($_SESSION['admin_id'])
    ? header('Location: ?act=show-login-form')
    : $home->views_home(),
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

    //rou bien the sp
    'chi-tiet-bien-the-sp' => (new SanPhamController())->danhSachVariants(),
    'form-them-bien-the' => (new SanPhamController())->formAddVariant(),
    'them-bien-the' => (new SanPhamController())->postAddVariant(),
    'form-sua-bien-the' => (new SanPhamController())->formEditVariant(),
    'sua-bien-the' => (new SanPhamController())->postEditVariant(),
    'xoa-bien-the' => (new SanPhamController())->postDeleteVariant(),

    //banner
    'giao-dien' => (new AdminGiaodienController())->listBanner(),
    'form-add-banner' => (new AdminGiaodienController())->formaddBanner(),
    'add-banner' => (new AdminGiaodienController())->postaddBanner(),
    'toggle-banner-status' => (new AdminGiaodienController())->UpdataBannerStatus(),
    'delete-banner' => (new AdminGiaodienController())->deleteBanner(),
    'form-edit-banner' => (new AdminGiaodienController())->formEditBanner(),
    'edit-banner' => (new AdminGiaodienController())->postEditBanner(),

    default => header('Location: ?act=show-login-form')
};

// Include footer nếu không phải trang login
if (!in_array($act, $publicRoutes)) {
    include_once "./views/layout/footer.php";
}