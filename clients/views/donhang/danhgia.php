<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thêm Đánh Giá</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h2 class="text-center">Thêm Đánh Giá</h2>
        <form action="?act=addReview" method="POST" class="p-4 border rounded shadow">
            <div class="mb-3">
                <label for="user_id" class="form-label">Mã Người Dùng</label>
                <input type="text" class="form-control" id="user_id" name="user_id" >
            </div>
            <div class="mb-3">
                <label for="comic_id" class="form-label">Mã Truyện</label>
                <input type="text" class="form-control" id="comic_id" name="comic_id" >
            </div>
            <div class="mb-3">
                <label for="order_id" class="form-label">Mã Đơn Hàng</label>
                <input type="text" class="form-control" id="order_id" name="order_id" >
            </div>
            <div class="mb-3">
                <label for="rating" class="form-label">Đánh Giá</label>
                <select class="form-select" id="rating" name="rating" >
                    <option value="">Chọn số sao</option>
                    <option value="1">1 sao</option>
                    <option value="2">2 sao</option>
                    <option value="3">3 sao</option>
                    <option value="4">4 sao</option>
                    <option value="5">5 sao</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="review_text" class="form-label">Nội Dung Đánh Giá</label>
                <textarea class="form-control" id="review_text" name="review_text" rows="3" ></textarea>
            </div>
            <button type="submit" class="btn btn-primary w-100">Gửi Đánh Giá</button>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
