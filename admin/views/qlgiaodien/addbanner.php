<div class="page-wrapper">
  <div class="container-fluid">
    <div class="row">
      <div class="col-12">
        <div class="card card-primary">
          <div class="card-header">
            <h3 class="card-title">Thêm Banner</h3>
          </div>


          <form method="POST" action="?act=add-banner" enctype="multipart/form-data">

            <div class="form-group col-6">
              <label for="Title">Tiêu đề Banner:</label>
              <input type="text" class="form-control" id="Title" name="Title" placeholder="Nhập tiêu đề" required>
              <?php if (isset($_SESSION['error']['Title'])) { ?>
                <p class="text-danger"><?= $_SESSION['error']['Title'] ?></p>
              <?php } ?>
            </div>

            <div class="form-group col-6">
              <label for="Description">Mo ta:</label>
              <input type="text" class="form-control" id="Description" name="Description" placeholder="Nhập mo ta"
                required>
              <?php if (isset($_SESSION['error']['Description'])) { ?>
                <p class="text-danger"><?= $_SESSION['error']['Description'] ?></p>
              <?php } ?>
            </div>

            <div class="form-group col-6">
              <label for="Image">Chọn hình ảnh:</label>
              <input type="file" class="form-control" id="Image" name="Image" accept="image/*" required>
              <?php if (isset($_SESSION['error']['Image'])) { ?>
                <p class="text-danger"><?= $_SESSION['error']['Image'] ?></p>
              <?php } ?>
            </div>

            <div class="form-group col-6">
              <label for="Status">Trạng thái:</label>
              <select class="form-control" id="Status" name="Status" required>
                <option value="1" selected>Kích hoạt</option>
              </select>
              <?php if (isset($_SESSION['error']['Status'])) { ?>
                <p class="text-danger"><?= $_SESSION['error']['Status'] ?></p>
              <?php } ?>
            </div>



            <button type="submit" class="btn btn-primary">Thêm Banner</button>
          </form>


        </div>
      </div>
      <!-- /.col -->
    </div>
    <!-- /.row -->
  </div>
  <!-- /.container-fluid -->
</div>