<?php
session_start();
require_once './commons/core.php';

// Tạo đối tượng PDO
$pdo = new PDO('mysql:host=localhost;dbname=duan11', 'root', '');
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

require_once './commons/env.php';


$act = $_GET['act'] ?? '/';
// $publicRoutes = ['login', 'register'];
// if (!in_array($act, $publicRoutes)) {
//     include_once './clients/views/layout/header.php';
// }


// if (!in_array($act, $publicRoutes)) {
//     include_once './clients/views/layout/footer.php';
// }