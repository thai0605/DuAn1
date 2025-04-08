<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đặt hàng thành công</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f8f9fa;
            color: #343a40;
        }

        .order-success-container {
            background-color: #fff;
            border-radius: 8px;
            padding: 20px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            max-width: 800px;
            margin: auto;
        }

        .success-header {
            text-align: center;
            margin-bottom: 20px;
        }

        .success-header i {
            color: #28a745;
            font-size: 3rem;
        }

        .success-header h2 {
            color: #28a745;
            font-size: 2rem;
            margin-top: 10px;
        }

        .order-info h3 {
            font-size: 1.5rem;
            margin-bottom: 20px;
        }

        .info-grid {
            display: flex;
            flex-wrap: wrap;
            gap: 20px;
        }

        .info-item {
            flex: 1 1 45%;
        }

        .info-item span {
            display: block;
            margin-bottom: 5px;
        }

        .order-summary h3 {
            font-size: 1.5rem;
            margin-bottom: 20px;
        }

        .cart-items {
            margin-bottom: 20px;
        }

        .cart-item {
            display: flex;
            margin-bottom: 15px;
            border-bottom: 1px solid #ddd;
            padding-bottom: 15px;
        }

        .cart-item img {
            width: 80px;
            height: 80px;
            object-fit: cover;
            border-radius: 5px;
        }

        .item-info {
            margin-left: 15px;
            flex-grow: 1;
        }

        .item-info h4 {
            font-size: 1.2rem;
        }

        .item-details {
            font-size: 0.9rem;
            color: #555;
        }

        .summary-footer {
            margin-top: 20px;
        }

        .summary-footer .row {
            margin-bottom: 10px;
        }

        .total {
            font-weight: bold;
            font-size: 1.2rem;
        }

        .action-buttons {
            text-align: center;
            margin-top: 30px;
        }

        .action-buttons .btn {
            padding: 10px 20px;
            font-size: 1rem;
        }

        .btn-outline {
            border-color: #6c757d;
            color: #6c757d;
        }

        .btn-primary {
            background-color: #007bff;
            border-color: #007bff;
        }

        .btn-outline:hover {
            background-color: #6c757d;
            color: #fff;
        }

        .btn-primary:hover {
            background-color: #0056b3;
            border-color: #0056b3;
        }
    </style>
</head>

<body>
    <div class="container mt-5">
        <div class="order-success-container">
            <div class="success-header">
                <i class="fas fa-check-circle"></i>
                <h2>Đặt hàng thành công!</h2>
                <p>Cảm ơn bạn đã đặt hàng. Đơn hàng của bạn đang được xử lý.</p>
            </div>

            <div class="order-info">
                <h3>Thông tin đơn hàng #<?= $order['id'] ?></h3>
                <div class="info-grid">
                    <div class="info-item">
                        <span class="label">Ngày đặt:</span>
                        <span class="value"><?= date('d/m/Y H:i', strtotime($order['order_date'])) ?></span>
                    </div>
                    <div class="info-item">
                        <span class="label">Người nhận:</span>
                        <span class="value"><?= htmlspecialchars($order['receiver_name']) ?></span>
                    </div>
                    <div class="info-item">
                        <span class="label">Số điện thoại:</span>
                        <span class="value"><?= htmlspecialchars($order['phone_car']) ?></span>
                    </div>
                    <div class="info-item">
                        <span class="label">Địa chỉ:</span>
                        <span class="value"><?= htmlspecialchars($order['shipping_address']) ?></span>
                    </div>
                    <div class="info-item">
                        <span class="label">Phương thức thanh toán:</span>
                        <span class="value"><?= htmlspecialchars($order['payment_method']) ?></span>
                    </div>
                    <div class="info-item">
                        <span class="label">Trạng thái thanh toán:</span>
                        <span class="value"><?= htmlspecialchars($order['payment_status']) ?></span>
                    </div>
                </div>
            </div>

            <div class="order-summary">
                <h3>Chi tiết đơn hàng</h3>

                <div class="cart-items">
                    <?php 
                    $totalAmount = 0;
                    // Trường hợp mua ngay
                    if (isset($_SESSION['buy_now_item'])) {
                        $item = $_SESSION['buy_now_item'];
                        $totalAmount = $item['price'] * $item['quantity'];
                    ?>
                        <div class="cart-item">
                            <img src="<?= removeFirstChar($item['image']) ?>" alt="<?= htmlspecialchars($item['title']) ?>">
                            <div class="item-info">
                                <h4><?= htmlspecialchars($item['title']) ?></h4>
                                <div class="item-details">
                                    <span>Số lượng: <?= $item['quantity'] ?></span>
                                    <span class="price"><?= number_format($item['unit_price'], 0, ',', '.') ?>đ</span>
                                </div>
                            </div>
                        </div>
                    <?php
                    } 
                    // Trường hợp đặt hàng từ giỏ hàng
                    else {
                        foreach ($orderItems as $item): 
                            $totalAmount += $item['unit_price'] * $item['quantity'];
                    ?>
                        <div class="cart-item">
                            <img src="<?= removeFirstChar($item['image']) ?>" alt="<?= htmlspecialchars($item['title']) ?>">
                            <div class="item-info">
                                <h4><?= htmlspecialchars($item['title']) ?></h4>
                                <div class="item-details">
                                    <span>Số lượng: <?= $item['quantity'] ?></span>
                                    <span class="price"><?= number_format($item['unit_price'], 0, ',', '.') ?>đ</span>
                                </div>
                            </div>
                        </div>
                        <?php endforeach;
                    }
                    ?>
                </div>

                <div class="summary-footer">
                    <div class="row">
                        <div class="col-6"><strong>Tạm tính:</strong></div>
                        <div class="col-6 text-end"><?= number_format($order['total_amount'], 0, ',', '.') ?>đ</div>
                    </div>
                    <div class="row">
                        <div class="col-6"><strong>Phí vận chuyển:</strong></div>
                        <div class="col-6 text-end">0đ</div>
                    </div>
                    <div class="row total">
                        <div class="col-6"><strong>Tổng cộng:</strong></div>
                        <div class="col-6 text-end"><?= number_format($order['total_amount'], 0, ',', '.') ?>đ</div>
                    </div>
                </div>
            </div>

            <div class="action-buttons">
                <a href="index.php" class="btn btn-primary">Tiếp tục mua sắm</a>
                <a href="?act=don-hang" class="btn btn-outline-secondary">Xem đơn hàng</a>
            </div>
        </div>
    </div>
</body>

</html>
