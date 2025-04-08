<div class="page-wrapper p-4">
  <!-- Alerts -->
  <?php if (isset($_SESSION['error'])): ?>
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
      <i class="fas fa-exclamation-circle me-2"></i> <?= htmlspecialchars($_SESSION['error'], ENT_QUOTES, 'UTF-8') ?>
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    <?php unset($_SESSION['error']); ?>
  <?php endif; ?>

  <?php if (isset($_SESSION['success'])): ?>
    <div class="alert alert-success alert-dismissible fade show" role="alert">
      <i class="fas fa-check-circle me-2"></i> <?= htmlspecialchars($_SESSION['success'], ENT_QUOTES, 'UTF-8') ?>
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    <?php unset($_SESSION['success']); ?>
  <?php endif; ?>

  <!-- Card with shadow and rounded corners -->
  <div class="row">
    <div class="col-12">
      <div class="card shadow-sm border-0 rounded-3 overflow-hidden">
        <!-- Card header with gradient background -->
        <div class="card-header bg-gradient-primary d-flex justify-content-between align-items-center py-3">
          <h5 class="card-title text-white mb-0">Quản Lý Danh Mục</h5>
          <a href="<?= BASE_URL_ADMIN . '?act=form-them-danh-muc' ?>" class="text-decoration-none">
            <button class="btn btn-light">
              <i class="fas fa-plus-circle me-2"></i>Thêm Danh Mục
            </button>
          </a>
        </div>

        <!-- Table content -->
        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-hover align-middle">
              <thead class="table-light">
                <tr>
                  <th scope="col" width="5%" class="text-center">STT</th>
                  <th scope="col" width="25%">Tên danh mục</th>
                  <th scope="col" width="45%">Mô tả</th>
                  <th scope="col" width="25%" class="text-center">Thao tác</th>
                </tr>
              </thead>
              <tbody>
                <?php foreach ($listDanhMuc as $key => $danhMuc) : ?>
                  <tr>
                    <td class="text-center"><?= $key + 1 ?></td>
                    <td class="fw-medium"><?= htmlspecialchars($danhMuc['name'], ENT_QUOTES, 'UTF-8') ?></td>
                    <td>
                      <div class="text-truncate" style="max-width: 400px;">
                        <?= htmlspecialchars($danhMuc['description'], ENT_QUOTES, 'UTF-8') ?>
                      </div>
                    </td>
                    <td>
                      <div class="d-flex justify-content-center gap-2">
                        <a href="<?= BASE_URL_ADMIN . '?act=form-sua-danh-muc&id=' . $danhMuc['id'] ?>" class="text-decoration-none">
                          <button class="btn btn-outline-primary btn-sm">
                            <i class="fas fa-edit me-1"></i>Sửa
                          </button>
                        </a>
                        <a href="<?= BASE_URL_ADMIN . '?act=xoa-danh-muc&id=' . $danhMuc['id'] ?>"
                          onclick="return confirm('Bạn có đồng ý xóa danh mục này không?')" class="text-decoration-none">
                          <button class="btn btn-outline-danger btn-sm">
                            <i class="fas fa-trash-alt me-1"></i>Xóa
                          </button>
                        </a>
                      </div>
                    </td>
                  </tr>
                <?php endforeach ?>
                
                <?php if (empty($listDanhMuc)) : ?>
                  <tr>
                    <td colspan="4" class="text-center py-4 text-muted">Không có danh mục nào</td>
                  </tr>
                <?php endif; ?>
              </tbody>
            </table>
          </div>
        </div>
        
        <!-- Card footer for pagination if needed -->
        <div class="card-footer bg-light d-flex justify-content-between align-items-center py-3">
          <div>
            <small class="text-muted">Tổng số danh mục: <?= count($listDanhMuc) ?></small>
          </div>
          <!-- Pagination placeholder -->
          <div>
            <!-- Pagination controls would go here -->
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- Custom styles -->
<style>
  .bg-gradient-primary {
    background: linear-gradient(45deg, #4e73df, #224abe);
  }
  
  .table th {
    font-weight: 600;
    text-transform: uppercase;
    font-size: 0.8rem;
    letter-spacing: 0.5px;
  }
  
  .btn-outline-primary, .btn-outline-danger {
    transition: all 0.2s;
  }
  
  .btn-outline-primary:hover {
    background-color: #4e73df;
    border-color: #4e73df;
  }
  
  .btn-outline-danger:hover {
    background-color: #e74a3b;
    border-color: #e74a3b;
  }
  
  .alert {
    border-left: 4px solid;
  }
  
  .alert-success {
    border-left-color: #1cc88a;
  }
  
  .alert-danger {
    border-left-color: #e74a3b;
  }
</style>