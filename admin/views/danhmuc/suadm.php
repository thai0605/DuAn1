<div class="page-wrapper py-4">
  <div class="container-fluid">
    <div class="row justify-content-center">
      <div class="col-lg-8 col-md-10 col-12">

        <div class="card shadow-sm border-0 rounded-3 overflow-hidden">
          <div class="card-header bg-gradient-primary py-3">
            <h3 class="card-title text-white mb-0">
              <i class="fas fa-edit me-2"></i>Sửa Danh Mục
            </h3>
          </div> 

          <form action="?act=sua-danh-muc" method="POST">
            <div class="card-body p-4">
              <input type="hidden" name="id" value="<?= $danhMuc['id'] ?>">
              
              <div class="form-group mb-4">
                <label class="form-label fw-medium">Tên Danh Mục</label>
                <input type="text" class="form-control form-control-lg rounded-3" name="name" 
                       placeholder="Nhập tên danh mục" 
                       value="<?= htmlspecialchars($danhMuc['name'], ENT_QUOTES, 'UTF-8') ?>" required>
                <small class="text-muted">Tên danh mục nên ngắn gọn và dễ hiểu</small>
              </div>

              <div class="form-group mb-3">
                <label class="form-label fw-medium">Mô tả</label>
                <textarea name="description" class="form-control rounded-3" rows="4" 
                          placeholder="Nhập mô tả chi tiết về danh mục"><?= htmlspecialchars($danhMuc['description'], ENT_QUOTES, 'UTF-8') ?></textarea>
              </div>
            </div>

            <div class="card-footer bg-light d-flex justify-content-between py-3">
              <a href="<?= BASE_URL_ADMIN ?>?act=danh-muc" class="btn btn-outline-secondary px-4">
                <i class="fas fa-arrow-left me-2"></i>Quay lại
              </a>
              <button type="submit" class="btn btn-warning px-4">
                <i class="fas fa-save me-2"></i>Cập nhật
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
  
  .btn-warning {
    background-color: #f6c23e;
    border-color: #f6c23e;
    color: #fff;
  }
  
  .btn-warning:hover {
    background-color: #e0a800;
    border-color: #d39e00;
    color: #fff;
  }
  
  .btn-outline-secondary:hover {
    background-color: #f8f9fc;
    color: #5a5c69;
  }
</style>