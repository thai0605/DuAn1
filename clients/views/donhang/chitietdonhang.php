<?php
// Kiểm tra nếu có chi tiết đơn hàng
if (!empty($orderDetails)):
?>

<div class="order-details-container">
    <h2 class="text-center mb-4">Chi Tiết Đơn Hàng</h2>
    
    <!-- Thông tin đơn hàng -->
    <div class="order-info mb-4">
        <p><strong>Tên khách hàng:</strong> <?php echo $orderInfo['receiver_name']; ?></p>
        <p><strong>Liên hệ:</strong> <?php echo $orderInfo['phone_car']; ?></p>
        <p><strong>Mã đơn hàng:</strong> <?php echo $orderDetails[0]['order_id']; ?></p>
        <p><strong>Ngày đặt hàng:</strong> <?php echo date('d/m/Y', strtotime($orderDetails[0]['order_date'])); ?></p>
        <p><strong>Trạng thái giao hàng:</strong> <?php echo $orderDetails[0]['shipping_status']; ?></p>
        <p><strong>Địa chỉ giao hàng:</strong> <?php echo $orderDetails[0]['shipping_address']; ?></p>
    </div>

    <hr>

    <!-- Danh sách sản phẩm trong đơn hàng -->
    <h3>Sản phẩm trong đơn hàng</h3>
    <table class="table table-striped table-bordered">
        <thead>
            <tr>
                <th>Tên sản phẩm</th>
                <th>Hình ảnh</th>
                <th>Số lượng</th>
                <th>Đơn giá</th>
                <th>Tổng giá</th>
            </tr>
        </thead>
        <tbody>
            <?php 
            $total = 0;
            foreach ($orderDetails as $item): 
                $subtotal = $item['subtotal'];
                $total += $subtotal;
            ?>
            <tr>
                <td><?php echo htmlspecialchars($item['title']); ?></td>
                <td>
                    <img src="<?php echo removeFirstChar($item['image']); ?>" alt="<?php echo htmlspecialchars($item['title']); ?>" style="width: 50px; height: 50px;">
                </td>
                <td><?php echo $item['quantity']; ?></td>
                <td><?php echo number_format($item['unit_price'], 0, ',', '.'); ?> VND</td>
                <td><?php echo number_format($subtotal, 0, ',', '.'); ?> VND</td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

    <hr>

    <!-- Tổng giá trị đơn hàng -->
    <div class="order-total">
        <p><strong>Tổng đơn hàng:</strong> <?php echo number_format($total, 0, ',', '.'); ?> VND</p>
    </div>

<?php else: ?>
    <p class="alert alert-warning">Không tìm thấy chi tiết đơn hàng này.</p>
<?php endif; ?>
</div>

<!-- Thêm CSS để làm đẹp cho phần hiển thị -->
<style>
    .order-details-container {
        width: 80%;
        margin: 0 auto;
        padding: 20px;
        background-color: #f8f9fa;
        border-radius: 10px;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    }
    .order-info p {
        font-size: 16px;
        margin-bottom: 10px;
    }
    .table {
        width: 100%;
        margin-top: 20px;
        border-collapse: collapse;
    }
    .table th, .table td {
        padding: 12px;
        text-align: center;
    }
    .table-striped tbody tr:nth-of-type(odd) {
        background-color: #f2f2f2;
    }
    .table-bordered {
        border: 1px solid #ddd;
    }
    .table-bordered th, .table-bordered td {
        border: 1px solid #ddd;
    }
    .order-total {
        font-size: 18px;
        font-weight: bold;
        margin-top: 20px;
    }
    .order-details-container hr {
        margin: 20px 0;
    }
</style>
