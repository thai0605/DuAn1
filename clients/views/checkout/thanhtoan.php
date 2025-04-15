<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thanh toán</title>
    <!-- Update to latest Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        :root {
            --primary-color: #4e73df;
            --secondary-color: #f8f9fc;
            --accent-color: #1cc88a;
            --dark-color: #5a5c69;
            --light-border: #e3e6f0;
        }
        
        body {
            background-color: #f8f9fc;
            font-family: 'Nunito', -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, 'Helvetica Neue', Arial, sans-serif;
            color: #5a5c69;
        }
        
        .checkout-container {
            max-width: 1200px;
            margin: 2rem auto;
            padding: 0 1rem;
        }
        
        .checkout-header {
            margin-bottom: 2rem;
            text-align: center;
        }
        
        .checkout-header h2 {
            color: var(--primary-color);
            font-weight: 700;
            position: relative;
            display: inline-block;
            padding-bottom: 0.5rem;
        }
        
        .checkout-header h2:after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 25%;
            width: 50%;
            height: 3px;
            background: var(--accent-color);
            border-radius: 5px;
        }
        
        .checkout-content {
            display: flex;
            flex-direction: column;
            gap: 2rem;
        }
        
        @media (min-width: 992px) {
            .checkout-content {
                flex-direction: row;
            }
            
            .checkout-form {
                flex: 3;
            }
            
            .order-summary {
                flex: 2;
            }
        }
        
        .card {
            border: none;
            box-shadow: 0 0.15rem 1.75rem 0 rgba(58, 59, 69, 0.15);
            border-radius: 0.5rem;
            overflow: hidden;
            transition: all 0.3s ease;
        }
        
        .card:hover {
            box-shadow: 0 0.15rem 1.75rem 0 rgba(58, 59, 69, 0.25);
        }
        
        .card-header {
            background-color: var(--primary-color);
            color: white;
            font-weight: 700;
            padding: 1rem;
            border-bottom: 1px solid var(--light-border);
        }
        
        .form-label {
            font-weight: 600;
            color: var(--dark-color);
            margin-bottom: 0.5rem;
        }
        
        .form-control, .form-select {
            padding: 0.75rem 1rem;
            border-radius: 0.35rem;
            border: 1px solid var(--light-border);
            transition: all 0.2s;
        }
        
        .form-control:focus, .form-select:focus {
            border-color: var(--primary-color);
            box-shadow: 0 0 0 0.25rem rgba(78, 115, 223, 0.25);
        }
        
        .cart-item {
            display: flex;
            margin-bottom: 1rem;
            padding-bottom: 1rem;
            border-bottom: 1px solid var(--light-border);
        }
        
        .cart-item img {
            width: 70px;
            height: 70px;
            object-fit: cover;
            border-radius: 0.35rem;
            margin-right: 1rem;
        }
        
        .item-info {
            flex: 1;
        }
        
        .item-info h4 {
            font-size: 1rem;
            margin-bottom: 0.5rem;
            font-weight: 600;
        }
        
        .item-details {
            display: flex;
            justify-content: space-between;
            color: var(--dark-color);
            font-size: 0.9rem;
        }
        
        .summary-footer {
            margin-top: 1rem;
            padding-top: 1rem;
            border-top: 1px solid var(--light-border);
        }
        
        .subtotal, .shipping, .total {
            display: flex;
            justify-content: space-between;
            margin-bottom: 0.5rem;
        }
        
        .total {
            font-weight: 700;
            font-size: 1.1rem;
            color: var(--primary-color);
            padding-top: 0.5rem;
            margin-top: 0.5rem;
            border-top: 1px solid var(--light-border);
        }
        
        .btn-checkout {
            width: 100%;
            padding: 0.75rem;
            background-color: var(--accent-color);
            color: white;
            border: none;
            border-radius: 0.35rem;
            font-weight: 700;
            transition: all 0.3s;
            margin-top: 1rem;
        }
        
        .btn-checkout:hover {
            background-color: #169970;
            transform: translateY(-2px);
        }
        
        .bank-info, .momo-info {
            background-color: rgba(78, 115, 223, 0.05);
            transition: all 0.3s;
        }
        
        .bank-info:hover, .momo-info:hover {
            background-color: rgba(78, 115, 223, 0.1);
        }
    </style>
</head>
<body>

<div class="checkout-container">
    <div class="checkout-header">
        <h2 class="mb-4">Thanh toán đơn hàng</h2>
    </div>

    <?php if (isset($_SESSION['error'])): ?>
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <?= $_SESSION['error']; unset($_SESSION['error']); ?>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    <?php endif; ?>

    <div class="checkout-content">
        <?php if (isset($_SESSION['buy_now_item'])): ?>
            <!-- Hiển thị thông tin "Mua ngay" -->
            <?php $item = $_SESSION['buy_now_item']; ?>
            <div class="card mb-3">
                <div class="row g-0 align-items-center">
                    <div class="col-md-2 text-center">
                        <img src="<?= removeFirstChar($item['image']) ?>" class="img-fluid rounded-start" alt="<?= $item['title'] ?>">
                    </div>
                    <div class="col-md-10">
                        <div class="card-body">
                            <h5 class="card-title"><?= htmlspecialchars($item['title']) ?></h5>
                            <p class="card-text">Giá: <?= number_format($item['price'], 0, ',', '.') ?>đ</p>
                            <p class="card-text">Số lượng: <?= $item['quantity'] ?></p>
                            <p class="card-text"><strong>Tổng cộng: <?= number_format($item['total_amount'], 0, ',', '.') ?>đ</strong></p>
                        </div>
                    </div>
                </div>
            </div>
        <?php elseif (empty($cartItems)): ?>
            <!-- Hiển thị thông tin giỏ hàng -->
            <?php foreach ($cartItems as $item): ?>
                <div class="card mb-3">
                    <div class="row g-0 align-items-center">
                        <div class="col-md-2 text-center">
                            <img src="<?= removeFirstChar($item['image']) ?>" class="img-fluid rounded-start" alt="<?= $item['title'] ?>">
                        </div>
                        <div class="col-md-10">
                            <div class="card-body">
                                <h5 class="card-title"><?= htmlspecialchars($item['title']) ?></h5>
                                <p class="card-text">Giá: <?= number_format($item['price'], 0, ',', '.') ?>đ</p>
                                <p class="card-text">Số lượng: <?= $item['quantity'] ?></p>
                                <p class="card-text"><strong>Thành tiền: <?= number_format($item['price'] * $item['quantity'], 0, ',', '.') ?>đ</strong></p>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
            <div class="text-end">
                <h5><strong>Tổng tiền thanh toán: <?= number_format($totalAmount, 0, ',', '.') ?>đ</strong></h5>
            </div>
        <?php else: ?>
           
        <?php endif; ?>
    </div>

    <!-- Thêm form thanh toán tại đây nếu cần -->
    <div class="checkout-content">
            <!-- Form thanh toán -->
            <div class="checkout-form">
                <div class="card mb-4">
                    <div class="card-header">
                        <h5 class="mb-0">Thông tin thanh toán</h5>
                    </div>
                    <div class="card-body">
                        <form action="?act=process-checkout" method="POST" id="checkout-form">
                            <div class="mb-3">
                                <label for="receiver_name" class="form-label">Họ tên người nhận:</label>
                                <input type="text" class="form-control" id="receiver_name" name="receiver_name" required 
                                      value="<?= $_SESSION['user']['name'] ?? '' ?>">
                            </div>

                            <div class="mb-3">
                                <label for="phone_car" class="form-label">Số điện thoại:</label>
                                <input type="tel" class="form-control" id="phone_car" name="phone_car" required 
                                      value="<?= $_SESSION['user']['phone'] ?? '' ?>">
                            </div>

                            <div class="mb-3">
                                <label for="shipping_address" class="form-label">Địa chỉ giao hàng:</label>
                                <textarea class="form-control" id="shipping_address" name="shipping_address" rows="3" required><?= $_SESSION['user']['address'] ?? '' ?></textarea>
                            </div>

                            <div class="mb-4">
                                <label for="payment-method" class="form-label">Phương thức thanh toán:</label>
                                <select class="form-select" id="payment-method" name="payment_method" required>
                                    <option value="">Chọn phương thức thanh toán</option>
                                    <option value="COD">Thanh toán khi nhận hàng</option>
                                    <option value="BANKING">Chuyển khoản ngân hàng</option>
                                    <option value="MOMO">Ví MoMo</option>
                                </select>
                            </div>

                            <!-- Form thẻ tín dụng -->
                            <div class="credit-card-form" id="credit-card-form" style="display: none;">
                                <div class="card mb-4">
                                    <div class="card-header bg-light text-dark">
                                        <h5 class="mb-0">Thông tin thẻ tín dụng</h5>
                                    </div>
                                    <div class="card-body">
                                        <div class="mb-3">
                                            <label for="card-number" class="form-label">Số thẻ</label>
                                            <div class="input-group">
                                                <span class="input-group-text">
                                                    <i class="fas fa-credit-card"></i>
                                                </span>
                                                <input type="text" class="form-control" id="card-number" 
                                                      placeholder="1234 5678 9012 3456" 
                                                      maxlength="19">
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-7 mb-3">
                                                <label for="expiry-date" class="form-label">Ngày hết hạn</label>
                                                <input type="text" class="form-control" id="expiry-date" 
                                                      placeholder="MM/YY" maxlength="5">
                                            </div>
                                            <div class="col-md-5 mb-3">
                                                <label for="cvv" class="form-label">CVV</label>
                                                <div class="input-group">
                                                    <input type="password" class="form-control" id="cvv" 
                                                          placeholder="***" maxlength="3">
                                                    <span class="input-group-text">
                                                        <i class="fas fa-question-circle" 
                                                          data-bs-toggle="tooltip" 
                                                          title="3 số ở mặt sau thẻ"></i>
                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="mb-3">
                                            <label for="card-holder" class="form-label">Tên chủ thẻ</label>
                                            <input type="text" class="form-control" id="card-holder" 
                                                  placeholder="NGUYEN VAN A">
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Form Internet Banking -->
                            <div class="banking-form" id="banking-form" style="display: none;">
                                <div class="card mb-4">
                                    <div class="card-header bg-light text-dark">
                                        <h5 class="mb-0">Chuyển khoản ngân hàng</h5>
                                    </div>
                                    <div class="card-body">
                                        <div class="mb-3">
                                            <label for="bank-select" class="form-label">Chọn ngân hàng</label>
                                            <select class="form-select" id="bank-select">
                                                <option value="">Chọn ngân hàng</option>
                                                <option value="MB">MB Bank</option>
                                                <option value="VCB">Vietcombank</option>
                                                <option value="TCB">Techcombank</option>
                                                <option value="VTB">Vietinbank</option>
                                                <option value="BIDV">BIDV</option>
                                                <option value="ACB">ACB</option>
                                            </select>
                                        </div>
                                        
                                        <!-- Thông tin tài khoản MB Bank -->
                                        <div class="bank-details" id="MB-details" style="display: none;">
                                            <div class="bank-info mb-3 p-3 border rounded">
                                                <div class="d-flex align-items-center mb-3">
                                                    <img src="./clients/assets/img/mb-bank-logo.png" alt="MB Bank" height="40" class="me-2">
                                                    <h5 class="mb-0">MB Bank</h5>
                                                </div>
                                                <div class="account-details">
                                                    <p class="mb-2"><strong>Số tài khoản:</strong> 0989315010</p>
                                                    <p class="mb-2"><strong>Chủ tài khoản:</strong> NGUYEN TIEN THINH</p>
                                                    <p class="mb-2"><strong>Chi nhánh:</strong> MB Hà Nội</p>
                                                    <p class="mb-2"><strong>Nội dung:</strong> <span id="mb-content">DH<?= time() ?></span></p>
                                                    <button type="button" class="btn btn-outline-primary btn-sm" onclick="copyToClipboard('mb-content')">
                                                        <i class="fas fa-copy"></i> Sao chép
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                        
                                        <!-- Thông tin tài khoản Vietcombank -->
                                        <div class="bank-details" id="VCB-details" style="display: none;">
                                            <div class="bank-info mb-3 p-3 border rounded">
                                                <div class="d-flex align-items-center mb-3">
                                                    <img src="./clients/assets/img/vcb-logo.png" alt="Vietcombank" height="40" class="me-2">
                                                    <h5 class="mb-0">Vietcombank</h5>
                                                </div>
                                                <div class="account-details">
                                                    <p class="mb-2"><strong>Số tài khoản:</strong> 1234567890</p>
                                                    <p class="mb-2"><strong>Chủ tài khoản:</strong> NGUYEN TIEN THINH</p>
                                                    <p class="mb-2"><strong>Chi nhánh:</strong> VCB Hà Nội</p>
                                                    <p class="mb-2"><strong>Nội dung:</strong> <span id="vcb-content">DH<?= time() ?></span></p>
                                                    <button type="button" class="btn btn-outline-primary btn-sm" onclick="copyToClipboard('vcb-content')">
                                                        <i class="fas fa-copy"></i> Sao chép
                                                    </button>
                                                </div>
                                            </div>
                                        </div>

                                        <!-- Include other bank details similarly -->
                                        <!-- Thông tin tài khoản Techcombank -->
                                        <div class="bank-details" id="TCB-details" style="display: none;">
                                            <div class="bank-info mb-3 p-3 border rounded">
                                                <div class="d-flex align-items-center mb-3">
                                                    <img src="./clients/assets/img/tcb-logo.png" alt="Techcombank" height="40" class="me-2">
                                                    <h5 class="mb-0">Techcombank</h5>
                                                </div>
                                                <div class="account-details">
                                                    <p class="mb-2"><strong>Số tài khoản:</strong> 0989315010</p>
                                                    <p class="mb-2"><strong>Chủ tài khoản:</strong> NGUYEN TIEN THINH</p>
                                                    <p class="mb-2"><strong>Chi nhánh:</strong> TCB Hà Nội</p>
                                                    <p class="mb-2"><strong>Nội dung:</strong> <span id="tcb-content">DH<?= time() ?></span></p>
                                                    <button type="button" class="btn btn-outline-primary btn-sm" onclick="copyToClipboard('tcb-content')">
                                                        <i class="fas fa-copy"></i> Sao chép
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                        
                                        <!-- Thông tin tài khoản Vietinbank -->
                                        <div class="bank-details" id="VTB-details" style="display: none;">
                                            <div class="bank-info mb-3 p-3 border rounded">
                                                <div class="d-flex align-items-center mb-3">
                                                    <img src="./clients/assets/img/vtb-logo.png" alt="Vietinbank" height="40" class="me-2">
                                                    <h5 class="mb-0">Vietinbank</h5>
                                                </div>
                                                <div class="account-details">
                                                    <p class="mb-2"><strong>Số tài khoản:</strong> 0989315010</p>
                                                    <p class="mb-2"><strong>Chủ tài khoản:</strong> NGUYEN TIEN THINH</p>
                                                    <p class="mb-2"><strong>Chi nhánh:</strong> VTB Hà Nội</p>
                                                    <p class="mb-2"><strong>Nội dung:</strong> <span id="vtb-content">DH<?= time() ?></span></p>
                                                    <button type="button" class="btn btn-outline-primary btn-sm" onclick="copyToClipboard('vtb-content')">
                                                        <i class="fas fa-copy"></i> Sao chép
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                        
                                        <!-- Other bank details (BIDV, ACB) -->
                                        <div class="bank-details" id="BIDV-details" style="display: none;">
                                            <div class="bank-info mb-3 p-3 border rounded">
                                                <div class="d-flex align-items-center mb-3">
                                                    <img src="./clients/assets/img/bidv-logo.png" alt="BIDV" height="40" class="me-2">
                                                    <h5 class="mb-0">BIDV</h5>
                                                </div>
                                                <div class="account-details">
                                                    <p class="mb-2"><strong>Số tài khoản:</strong> 0989315010</p>
                                                    <p class="mb-2"><strong>Chủ tài khoản:</strong> NGUYEN TIEN THINH</p>
                                                    <p class="mb-2"><strong>Chi nhánh:</strong> BIDV Hà Nội</p>
                                                    <p class="mb-2"><strong>Nội dung:</strong> <span id="bidv-content">DH<?= time() ?></span></p>
                                                    <button type="button" class="btn btn-outline-primary btn-sm" onclick="copyToClipboard('bidv-content')">
                                                        <i class="fas fa-copy"></i> Sao chép
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                        
                                        <div class="bank-details" id="ACB-details" style="display: none;">
                                            <div class="bank-info mb-3 p-3 border rounded">
                                                <div class="d-flex align-items-center mb-3">
                                                    <img src="./clients/assets/img/acb-logo.png" alt="ACB" height="40" class="me-2">
                                                    <h5 class="mb-0">ACB</h5>
                                                </div>
                                                <div class="account-details">
                                                    <p class="mb-2"><strong>Số tài khoản:</strong> 0989315010</p>
                                                    <p class="mb-2"><strong>Chủ tài khoản:</strong> NGUYEN TIEN THINH</p>
                                                    <p class="mb-2"><strong>Chi nhánh:</strong> ACB Hà Nội</p>
                                                    <p class="mb-2"><strong>Nội dung:</strong> <span id="acb-content">DH<?= time() ?></span></p>
                                                    <button type="button" class="btn btn-outline-primary btn-sm" onclick="copyToClipboard('acb-content')">
                                                        <i class="fas fa-copy"></i> Sao chép
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Form Ví MoMo -->
                            <div class="momo-form" id="momo-form" style="display: none;">
                                <div class="card mb-4">
                                    <div class="card-header bg-light text-dark">
                                        <h5 class="mb-0">Thanh toán qua MoMo</h5>
                                    </div>
                                    <div class="card-body text-center">
                                        <div class="mb-3">
                                            <img src="./clients/assets/img/momo-logo.png" alt="MoMo" style="height: 50px;">
                                        </div>
                                        <div class="momo-info p-4 border rounded mx-auto" style="max-width: 350px;">
                                            <div class="mb-4">
                                                <img src="./clients/assets/img/paymomo.jpg" alt="MoMo QR" class="img-fluid" style="max-width: 200px;">
                                            </div>
                                            <div class="account-details text-start">
                                                <p class="mb-2"><strong>Số điện thoại:</strong> 0989315010</p>
                                                <p class="mb-2"><strong>Chủ tài khoản:</strong> NGUYEN TIEN THINH</p>
                                                <p class="mb-2"><strong>Số tiền:</strong> 
                                                    <?php
                                                    if (isset($_SESSION['buy_now_item'])) {
                                                        $displayAmount = $_SESSION['buy_now_item']['price'] * $_SESSION['buy_now_item']['quantity'];
                                                    } else {
                                                        $displayAmount = $totalAmount;
                                                    }
                                                    echo number_format($displayAmount, 0, ',', '.') . 'đ';
                                                    ?>
                                                </p>
                                                <p class="mb-2"><strong>Nội dung:</strong> 
                                                    <span id="momo-content">
                                                        <?php
                                                        if (isset($_SESSION['buy_now_item'])) {
                                                            echo "Thanh toan don hang " . $_SESSION['buy_now_item']['title'] . " " . time();
                                                        } else {
                                                            echo "Thanh toan don hang " . time();
                                                        }
                                                        ?>
                                                    </span>
                                                </p>
                                                <div class="text-center mt-3">
                                                    <button type="button" class="btn btn-outline-primary" onclick="copyToClipboard('momo-content')">
                                                        <i class="fas fa-copy"></i> Sao chép nội dung chuyển khoản
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="mb-3">
                                <label for="note" class="form-label">Ghi chú:</label>
                                <textarea class="form-control" id="note" name="note" rows="3" placeholder="Ghi chú về đơn hàng"></textarea>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <!-- Thông tin đơn hàng -->
            <div class="order-summary">
                <div class="card sticky-top" style="top: 20px;">
                    <div class="card-header">
                        <h5 class="mb-0">Thông tin đơn hàng</h5>
                    </div>
                    <div class="card-body">
                        <!-- Phần hiển thị sản phẩm -->
                        <div class="cart-items">
                            <?php 
                            $totalAmount = 0;
                            // Kiểm tra nếu có sản phẩm "mua ngay"
                            if (isset($_SESSION['buy_now_item'])) {
                                $item = $_SESSION['buy_now_item'];
                                ?>
                                <div class="cart-item">
                                    <img src="<?= removeFirstChar($item['image']) ?>" alt="<?= $item['title'] ?>">
                                    <div class="item-info">
                                        <h4><?= $item['title'] ?></h4>
                                        <div class="item-details">
                                            <span>Số lượng: <?= $item['quantity'] ?></span>
                                            <span class="price"><?= number_format($item['price'], 0, ',', '.') ?>đ</span>
                                        </div>
                                    </div>
                                </div>
                                <?php
                                $totalAmount += $item['price'] * $item['quantity'];
                            } else if (isset($_POST['selected_items'])) {
                                // Xử lý các sản phẩm được chọn từ giỏ hàng
                                $selectedItems = json_decode($_POST['selected_items'], true);
                                
                                foreach ($selectedItems as $selectedItem) {
                                    // Lấy thông tin chi tiết sản phẩm từ giỏ hàng
                                    foreach ($cartItems as $item) {
                                        if ($item['id'] == $selectedItem['id']) {
                                            ?>
                                            <div class="cart-item">
                                                <img src="<?= removeFirstChar($item['image']) ?>" alt="<?= $item['title'] ?>">
                                                <div class="item-info">
                                                    <h4><?= $item['title'] ?></h4>
                                                    <div class="item-details">
                                                        <span>Số lượng: <?= $item['quantity'] ?></span>
                                                        <span class="price"><?= number_format($item['price'], 0, ',', '.') ?>đ</span>
                                                    </div>
                                                </div>
                                            </div>
                                            <?php
                                            $totalAmount += $item['price'] * $item['quantity'];
                                            break;
                                        }
                                    }
                                }
                            }
                            ?>
                        </div>

                        <!-- Phần tổng tiền -->
                        <div class="summary-footer">
                            <div class="subtotal">
                                <span>Tạm tính:</span>
                                <span><?= number_format($totalAmount, 0, ',', '.') ?>đ</span>
                            </div>
                            <div class="shipping">
                                <span>Phí vận chuyển:</span>
                                <span class="text-success">Miễn phí</span>
                            </div>
                            <div class="total">
                                <span>Tổng cộng:</span>
                                <span class="total-amount"><?= number_format($totalAmount, 0, ',', '.') ?>đ</span>
                            </div>
                            <button type="submit" form="checkout-form" class="btn-checkout">
                                <i class="fas fa-shopping-cart me-2"></i> Đặt hàng (<?= number_format($totalAmount, 0, ',', '.') ?>đ)
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</div>



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://kit.fontawesome.com/your-font-awesome-kit.js" crossorigin="anonymous"></script>
<script>
// Xử lý hiển thị form thẻ tín dụng
document.getElementById('payment-method').addEventListener('change', function() {
const creditCardForm = document.getElementById('credit-card-form');
const bankingForm = document.getElementById('banking-form');
const momoForm = document.getElementById('momo-form');

// Ẩn tất cả form
creditCardForm.style.display = 'none';
bankingForm.style.display = 'none';
momoForm.style.display = 'none';

// Hiển thị form tương ứng
switch(this.value) {
case 'CREDIT':
creditCardForm.style.display = 'block';
break;
case 'BANKING':
bankingForm.style.display = 'block';
break;
case 'MOMO':
momoForm.style.display = 'block';
break;
}
});

// Xử lý khi chọn ngân hàng
document.getElementById('bank-select').addEventListener('change', function() {
// Ẩn tất cả thông tin ngân hàng
document.querySelectorAll('.bank-details').forEach(element => {
element.style.display = 'none';
});

// Hiển thị thông tin ngân hàng được chọn
if (this.value) {
const selectedBank = document.getElementById(this.value + '-details');
if (selectedBank) {
selectedBank.style.display = 'block';
}
}
});

// Hàm copy nội dung
function copyToClipboard(elementId) {
const content = document.getElementById(elementId).textContent;
navigator.clipboard.writeText(content).then(() => {
// Hiển thị thông báo đã copy
const button = event.target.closest('button');
const originalText = button.innerHTML;
button.innerHTML = '<i class="fas fa-check"></i> Đã sao chép';
setTimeout(() => {
button.innerHTML = originalText;
}, 2000);
});
}

// Validate form trước khi submit
document.getElementById('checkout-form').addEventListener('submit', function(e) {
const paymentMethod = document.getElementById('payment-method').value;

switch(paymentMethod) {
case 'BANKING':
if (!document.getElementById('bank-select').value) {
    e.preventDefault();
    alert('Vui lòng chọn ngân hàng');
    return;
}
break;

case 'MOMO':
// Có thể thêm validation cho MoMo nếu cần
break;
}
});

// Format số thẻ
document.getElementById('card-number').addEventListener('input', function(e) {
let value = e.target.value.replace(/\D/g, '');
value = value.replace(/(.{4})/g, '$1 ').trim();
e.target.value = value;
});

// Format ngày hết hạn
document.getElementById('expiry-date').addEventListener('input', function(e) {
let value = e.target.value.replace(/\D/g, '');
if (value.length >= 2) {
value = value.slice(0,2) + '/' + value.slice(2);
}
e.target.value = value;
});

// Validate form trước khi submit
document.getElementById('checkout-form').addEventListener('submit', function(e) {
const paymentMethod = document.getElementById('payment-method').value;

if (paymentMethod === 'CREDIT') {
const cardNumber = document.getElementById('card-number').value;
const expiryDate = document.getElementById('expiry-date').value;
const cvv = document.getElementById('cvv').value;
const cardHolder = document.getElementById('card-holder').value;

if (!cardNumber || !expiryDate || !cvv || !cardHolder) {
e.preventDefault();
alert('Vui lòng điền đầy đủ thông tin thẻ tín dụng');
return;
}

// Validate card number (Luhn algorithm)
if (!validateCardNumber(cardNumber.replace(/\s/g, ''))) {
e.preventDefault();
alert('Số thẻ không hợp lệ');
return;
}

// Validate expiry date
if (!validateExpiryDate(expiryDate)) {
e.preventDefault();
alert('Ngày hết hạn không hợp lệ');
return;
}
}
});

// Validate số thẻ using Luhn algorithm
function validateCardNumber(number) {
let sum = 0;
let isEven = false;

for (let i = number.length - 1; i >= 0; i--) {
let digit = parseInt(number.charAt(i));

if (isEven) {
digit *= 2;
if (digit > 9) {
    digit -= 9;
}
}

sum += digit;
isEven = !isEven;
}

return sum % 10 === 0;
}

// Validate ngày hết hạn
function validateExpiryDate(expiry) {
const [month, year] = expiry.split('/');
const expDate = new Date(2000 + parseInt(year), parseInt(month) - 1);
const today = new Date();
return expDate > today;
}

// Initialize tooltips
var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
return new bootstrap.Tooltip(tooltipTriggerEl)
});

// Thêm CSS cho phần bank-details

</script>
</body>
</html>
