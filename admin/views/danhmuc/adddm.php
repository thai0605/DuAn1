<div class="page-wrapper py-4">
  <div class="container-fluid">
    <div class="row justify-content-center">
      <div class="col-lg-8 col-md-10 col-12">

        <div class="card shadow-sm border-0 rounded-3 overflow-hidden">
          <div class="card-header bg-gradient-primary py-3">
            <h3 class="card-title text-white mb-0">
              <i class="fas fa-folder-plus me-2"></i>Thêm Danh Mục
            </h3>
          </div> 

          <form action="?act=post-danh-muc" method="POST">
            <div class="card-body p-4">
              <div class="form-group mb-4">
                <label class="form-label fw-medium">Tên Danh Mục</label>
                <input type="text" class="form-control form-control-lg rounded-3" name="name" placeholder="Nhập tên danh mục" required>
                <small class="text-muted">Tên danh mục nên ngắn gọn và dễ hiểu</small>
              </div>

              <div class="form-group mb-3">
                <label class="form-label fw-medium">Mô tả</label>
                <textarea name="description" class="form-control rounded-3" rows="4" placeholder="Nhập mô tả chi tiết về danh mục"></textarea>
              </div>
            </div>

            <div class="card-footer bg-light d-flex justify-content-between py-3">
              <a href="<?= BASE_URL_ADMIN ?>?act=danh-muc" class="btn btn-outline-secondary px-4">
                <i class="fas fa-arrow-left me-2"></i>Quay lại
              </a>
              <button type="submit" class="btn btn-primary px-4">
                <i class="fas fa-save me-2"></i>Thêm danh mục
              </button>
            </div>
          </form>
        </div>
        
      </div>
    </div>
  </div>
</div>

<style>
  .bg-gradient-primary {
    background: linear-gradient(45deg, #4e73df, #224abe);
  }
  
  .form-control:focus {
    border-color: #4e73df;
    box-shadow: 0 0 0 0.2rem rgba(78, 115, 223, 0.25);
  }
  
  .btn-primary {
    background-color: #4e73df;
    border-color: #4e73df;
  }
  
  .btn-primary:hover {
    background-color: #2e59d9;
    border-color: #2653d4;
  }
  
  .btn-outline-secondary:hover {
    background-color: #f8f9fc;
    color: #5a5c69;
  }
</style>