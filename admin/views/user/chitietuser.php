<div class="page-wrapper">
  <div class="content-wrapper">
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col">
            <h2>Thông tin tài khoản khách hàng</h2>
          </div>
        </div>
      </div>
    </section>

    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <?php if (isset($_SESSION['error'])): ?>
              <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <i class="fas fa fa-exclamation-circle"></i> <?= $_SESSION['error'] ?>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <?php unset($_SESSION['error']); ?>
            <?php endif; ?>

            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Chi tiết người dùng</h3>
              </div>

              <form>
                

                  <div class="form-group col-12">
                    <label>Họ tên</label>
                    <input type="text" class="form-control" value="<?= $taikhoan['name'] ?>" readonly>
                  </div>

                  <div class="form-group col-12">
                    <label>Email</label>
                    <input type="email" class="form-control" value="<?= $taikhoan['email'] ?>" readonly>
                  </div>

                  <div class="form-group col-12">
                    <label>Số điện thoại</label>
                    <input type="text" class="form-control" value="<?= $taikhoan['phone'] ?>" readonly>
                  </div>

                  <div class="form-group col-12">
                    <label>Ngày tạo</label>
                    <input type="text" class="form-control" value="<?= $taikhoan['created_at'] ?>" readonly>
                  </div>

                  <div class="form-group col-12">
                    <label>Ảnh đại diện</label><br>
                    <img src="<?= $taikhoan['avatar'] ?>" style="max-width: 200px;" alt="avatar">
                  </div>
                </div>

                <div class="card-footer">
                  <a href="?act=user" class="btn btn-secondary">Quay lại</a>
                </div>
              </form>

            </div>
          </div>
        </div>
      </div>
    </section>
  </div>
</div>
