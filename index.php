<?php
session_start();
require_once './commons/core.php';

// Tạo đối tượng PDO
$pdo = new PDO('mysql:host=localhost;dbname=duan1main', 'root', '');
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

require_once './commons/env.php';

require_once './clients/controllers/HomeController.php';

require_once './clients/models/banner.php';
require_once './clients/models/danhmuc.php';
require_once './clients/models/sanpham.php';

$act = $_GET['act'] ?? '/';
$publicRoutes = ['login', 'register'];
if (!in_array($act, $publicRoutes)) {
    include_once './clients/views/layouts/header.php';
}
match ($act) {

    '/' => (new HomeController())->home(),
    'chitietsp' => (new HomeController())->chitietsanpham(),
    'sanpham' => (new HomeController())->sanpham(),
// 'view-shopping-cart' => (new CartController())->view_shoppingCart(),

};

if (!in_array($act, $publicRoutes)) {
    include_once './clients/views/layouts/footer.php';
}