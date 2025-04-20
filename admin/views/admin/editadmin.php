<h2>Sửa thông tin admin</h2>
<form method="POST" action="?act=post-edit-admin">
    <input type="hidden" name="id" value="<?= $admin['id'] ?>">
    
    <label>Tên:</label><br>
    <input type="text" name="name" value="<?= $admin['name'] ?>" required><br><br>

    <label>Email:</label><br>
    <input type="email" name="email" value="<?= $admin['email'] ?>" required><br><br>

    <label>Vai trò:</label><br>
    <select name="role">
        <option value="superadmin" <?= $admin['role'] == 'superadmin' ? 'selected' : '' ?>>Super Admin</option>
        <option value="product_manager" <?= $admin['role'] == 'product_manager' ? 'selected' : '' ?>>Quản lý sản phẩm</option>
        <option value="order_viewer" <?= $admin['role'] == 'order_viewer' ? 'selected' : '' ?>>Xem đơn hàng</option>
    </select><br><br>

    <button type="submit">Cập nhật</button>
</form>
