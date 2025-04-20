<div class="page-wrapper p-4">
<h2>Thêm quản trị viên</h2>
<form method="POST" action="?act=post-add-admin">
    <label>Tên:</label><br>
    <input type="text" name="name" required><br><br>

    <label>Email:</label><br>
    <input type="email" name="email" required><br><br>

    <label>Mật khẩu:</label><br>
    <input type="password" name="password" required><br><br>

    <label>Vai trò:</label><br>
    <select name="role">
        <option value="super_admin">Super Admin</option>
        <option value="product_manager">Quản lý sản phẩm</option>
        <option value="order_manager">Xem đơn hàng</option>
    </select><br><br>

    <button type="submit">Thêm mới</button>
</form>
</div>