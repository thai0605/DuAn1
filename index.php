
<?php
session_start();
require_once './commons/core.php';

// Tạo đối tượng PDO
$pdo = new PDO('mysql:host=localhost;dbname=duan1main', 'root', '');
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

require_once './commons/env.php';


#require Controller
require_once './clients/controllers/HomeController.php';
require_once './clients/controllers/LoginController.php';
require_once './clients/controllers/AccountController.php';

#require Model

require_once './clients/models/Login.php';
require_once './clients/models/Account.php';
require_once './clients/models/danhmuc.php';



$home = new HomeController();

// Route
$act = $_GET['act'] ?? '/';
$publicRoutes = ['login', 'register'];
if (!in_array($act, $publicRoutes)) {
    include_once './clients/views/layout/header.php';
}
// kiểm tra act và điều hướng tới các controller phù hợp
match ($act) {
    '/' => $home->views_home(),
    'login' => (new LoginController())->login(),
    'logout' => (new LoginController())->logout(),
    'register' => (new LoginController())->register(),

};

if (!in_array($act, $publicRoutes)) {
    include_once './clients/views/layout/footer.php';
}