<?php
require_once './clients/models/MoMoPayment.php';


class PaymentController
{
    public function processMomoPayment()
    {
        try {
            if (!isset($_SESSION['user'])) {
                throw new Exception("Vui lòng đăng nhập để thanh toán");
            }

            $userId = $_SESSION['user']['id'];
            $orderId = time(); // Mã đơn hàng
            $amount = $_POST['momo_amount']; // Số tiền thanh toán
            $orderInfo = $_POST['momo_note']; // Nội dung thanh toán
            $redirectUrl = "http://localhost/DuAn1/clients/views/checkout/order-success.php";
            $ipnUrl = "http://localhost/DuAn1/clients/views/checkout/ipn.php";

            $payUrl = MoMoPayment::createPayment($orderId, $amount, $orderInfo, $redirectUrl, $ipnUrl);

            if ($payUrl) {
                header("Location: $payUrl");
                exit;
            } else {
                throw new Exception("Không thể tạo thanh toán MoMo");
            }
        } catch (Exception $e) {
            $_SESSION['error'] = $e->getMessage();
            header('Location: ?act=checkout');
            exit;
        }
    }
}
?>
