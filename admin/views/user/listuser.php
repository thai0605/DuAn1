<div class="page-wrapper">
    <h2>Quản lý tài khoản khách hàng</h2>

    <!-- Main content -->
    <section class="content">
        <!-- Notifications -->
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

        <div class="card">
            <div class="card-header">
                <a href="<?= BASE_URL_ADMIN . '?act=add-user' ?>" class="btn btn-success">Thêm tài khoản</a>
            </div>

            <!-- /.card-header -->
            <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>STT</th>
                           
                            <th>Họ tên</th>
                            <th>Email</th>
                            <th>Số điện thoại</th>
                            <th>Ảnh đại diện</th>
                            <th>Role</th>
                            <th>Ngày tạo</th>
                            <th>Thao tác</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                        $use = 1; // Initialize the counter
                        foreach ($users as $user): ?>
                            <tr>
                                <td><?= $use++ ?></td> 
    
                                <td><?= ($user['name']) ?></td>
                                <td><?= ($user['email']) ?></td>
                                <td><?= ($user['phone']) ?></td>
                                <td>
                                    <img src="<?= ($user['avatar']) ?>" style="width:100px" alt="Avatar">
                                </td>
                                <td><?= ($user['role']) ?></td>
                                <td><?= date('d/m/Y H:i', strtotime($user['created_at'])) ?></td>
                                <td>
                                    <a href="<?= BASE_URL_ADMIN . '?act=edit-user&id=' . $user['id'] ?>">
                                        <button class="btn btn-warning">Xem chi tiết</button>
                                    </a>
                                    
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->
    </section>
</div>