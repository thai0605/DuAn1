<div class="page-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h3>Quản lí đơn hàng</h3>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>

  <!-- Main content -->
  <section class="content">


    <div class="card">
      <div class="card-header">
      </div>
      <!-- thong bao   -->
      <?php if (isset($_SESSION['error'])): ?>
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
          <i class="fas fa fa-exclamation-circle"></i> <?= $_SESSION['error'] ?>
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <?php unset($_SESSION['error']); ?>
      <?php endif; ?>

      <?php if (isset($_SESSION['success'])): ?>
        <div class="alert alert-success alert-dismissible fade show" role="alert">
          <i class="fas fa fa-check-circle"></i> <?= $_SESSION['success'] ?>
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <?php unset($_SESSION['success']); ?>
      <?php endif; ?>
      <!-- /.card-header -->
      <div class="card-body">
        <table id="example1" class="table table-bordered table-striped">
          <thead>
            <tr>
              <th>id </th>
              <th>tên khách hàng</th>
              <th>số điện thoại</th>
              <th>tổng giá trị đơn hàng</th>
              <th>phương thức thanh toán</th>
              <th>trạng thái thanh toán</th>
              <th>trạng thái đơn hàng</th>

              <th>Thao tác</th>
            </tr>
          </thead>
          <tbody>
            <?php foreach ($orders as $donhang) { ?>
              <tr>
                <td><?= $donhang['id'] ?></td>
                <!-- Hiển thị tên khách hàng, nếu không có thì hiển thị user_id -->
                <td><?= $donhang['receiver_name'] ?></td>
                <td><?= $donhang['phone_car'] ?></td>
                <td><?= number_format($donhang['total_amount'] ?? 0, 0, ',', '.') ?> đ</td>
                <td><?php

                switch ($donhang['payment_method']) {
                  case 'COD':
                    echo '<span class="badge shadow-sm rounded-pill" style="background-color: #4caf50; color: white; font-size: 15px;">
                <i class="fas fa-box-open me-1"></i> Thanh toán khi nhận hàng
              </span>';
                    break;
                  case 'MOMO':
                    echo '<span class="badge shadow-sm rounded-pill" style="background-color: #ec4899; color: white; font-size: 15px;">
                <i class="fas fa-mobile-alt me-1"></i> Ví điện tử MOMO
              </span>';
                    break;
                  case 'BANKING':
                    echo '<span class="badge shadow-sm rounded-pill" style="background-color: #0ea5e9; color: white; font-size: 15px;">
                <i class="fas fa-university me-1"></i> Chuyển khoản
              </span>';
                    break;
                  case 'CREDIT':
                    echo '<span class="badge shadow-sm rounded-pill" style="background-color: #facc15; color: black; font-size: 15px;">
                <i class="fas fa-credit-card me-1"></i> Thẻ tín dụng
              </span>';
                    break;
                  default:
                    echo '<span class="badge shadow-sm rounded-pill" style="background-color: #6c757d; color: white; font-size: 15px;">
                <i class="fas fa-question-circle me-1"></i> Không xác định
              </span>';
                    break;
                }





                ?> </td>
                <td><?php
                switch ($donhang['payment_status']) {
                  case 'paid': // Đã thanh toán
                    echo '<span class="badge shadow-sm rounded-pill" style="background-color: #22c55e; color: white; font-size: 15px;">
                                                    <i class="fas fa-check-circle me-1"></i> Đã thanh toán
                                                  </span>';
                    break;

                  case 'unpaid': // Chưa thanh toán
                    echo '<span class="badge shadow-sm rounded-pill" style="background-color: #9ca3af; color: white; font-size: 15px;">
                                                    <i class="fas fa-clock me-1"></i> Chưa thanh toán
                                                  </span>';
                    break;

                  case 'refunded': // Đã hoàn tiền
                    echo '<span class="badge shadow-sm rounded-pill" style="background-color: #3b82f6; color: white; font-size: 15px;">
                                                    <i class="fas fa-undo-alt me-1"></i> Đã hoàn tiền
                                                  </span>';
                    break;

                  case 'failed': // Thanh toán thất bại
                    echo '<span class="badge shadow-sm rounded-pill" style="background-color: #ef4444; color: white; font-size: 15px;">
                                                    <i class="fas fa-times-circle me-1"></i> Thanh toán thất bại
                                                  </span>';
                    break;

                  case 'processing': // Đang xử lý
                    echo '<span class="badge shadow-sm rounded-pill" style="background-color: #f59e0b; color: black; font-size: 15px;">
                                                    <i class="fas fa-sync-alt me-1"></i> Đang xử lý
                                                  </span>';
                    break;

                  default: // Không xác định
                    echo '<span class="badge shadow-sm rounded-pill" style="background-color: #6c757d; color: white; font-size: 15px;">
                                                    <i class="fas fa-question-circle me-1"></i> Không xác định
                                                  </span>';
                    break;
                }

                ?></td>
                <td><?php
                switch ($donhang['shipping_status']) {
                  case 'pending': // Chờ xử lý
                    echo '<span class="badge shadow-sm rounded-pill" style="background-color: #fbbf24; color: black; font-size: 15px;">
                                                    <i class="fas fa-hourglass-start me-1"></i> Chờ xử lý
                                                  </span>';
                    break;

                  case 'delivering': // Đang giao hàng
                    echo '<span class="badge shadow-sm rounded-pill" style="background-color: #3b82f6; color: white; font-size: 15px;">
                                                    <i class="fas fa-truck me-1"></i> Đang giao hàng
                                                  </span>';
                    break;

                  case 'delivered': // Đã giao hàng
                    echo '<span class="badge shadow-sm rounded-pill" style="background-color: #10b981; color: white; font-size: 15px;">
                                                    <i class="fas fa-box-check me-1"></i> Đã giao hàng
                                                  </span>';
                    break;

                  case 'returned': // Hoàn trả
                    echo '<span class="badge shadow-sm rounded-pill" style="background-color: #0ea5e9; color: white; font-size: 15px;">
                                                    <i class="fas fa-undo me-1"></i> Hoàn trả
                                                  </span>';
                    break;

                  case 'cancelled': // Đã hủy
                    echo '<span class="badge shadow-sm rounded-pill" style="background-color: #ef4444; color: white; font-size: 15px;">
                                                    <i class="fas fa-ban me-1"></i> Đã hủy
                                                  </span>';
                    break;

                  default: // Không xác định
                    echo '<span class="badge shadow-sm rounded-pill" style="background-color: #6b7280; color: white; font-size: 15px;">
                                                    <i class="fas fa-question-circle me-1"></i> Không xác định
                                                  </span>';
                    break;
                }
                ?>
                </td>

                <td>
                  <a href="?act=order-detail&id=<?= $donhang['id'] ?>" class="btn btn-info btn-sm">
                    <i class="fas fa fa-eye"></i> Chi tiết
                  </a>




                 



                </td>
              </tr>
            <?php } ?>
          </tbody>
        </table>

      </div>
      <!-- /.card-body -->
    </div>
    <!-- /.card -->
</div>
<!-- /.col -->
</div>
<!-- /.row -->
</div>
<!-- /.container-fluid -->
</section>
<!-- /.content -->
</div>
<!-- /.content-wrapper -->