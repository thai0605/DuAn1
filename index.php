<?php
session_start();
session_unset();
session_destroy();

require_once './commons/core.php';

// Tạo đối tượng PDO
$pdo = new PDO('mysql:host=localhost;dbname=duan1main', 'root', '');
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

require_once './commons/env.php';

require_once './clients/controllers/LoginController.php';
require_once './clients/controllers/AccountController.php';
require_once './clients/controllers/HomeController.php';

require_once './clients/models/banner.php';
require_once './clients/models/danhmuc.php';
require_once './clients/models/sanpham.php';
require_once './clients/models/Login.php';
require_once './clients/models/Account.php';

$act = $_GET['act'] ?? '/';
$publicRoutes = ['login', 'register'];
if (!in_array($act, $publicRoutes)) {
    include_once './clients/views/layouts/header.php';
}
match ($act) {

    '/' => (new HomeController())->home(),
    'chitietsp' => (new HomeController())->chitietsanpham(),
    'sanpham' => (new HomeController())->sanpham(),
    'search' =>(new HomeController())->search(),
    'lienhe' =>(new HomeController())->lienhe(),
    'login' => (new LoginController())->login(),
    'logout' => (new LoginController())->logout(),
    'register' => (new LoginController())->register(),

};

if (!in_array($act, $publicRoutes)) {
    include_once './clients/views/layouts/footer.php';
}
