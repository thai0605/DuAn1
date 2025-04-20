<div class="page-wrapper p-4">
<h2>Danh sách quản trị viên</h2>
<a href="?act=add-admin" class="btn btn-success">Thêm Admin</a>
<table border="1" cellpadding="10">
    <tr>
        <th>ID</th>
        <th>Tên</th>
        <th>Email</th>
        <th>Vai trò</th>
        <th>Hành động</th>
    </tr>
    <?php foreach ($admins as $admin): ?>
    <tr>
        <td><?= $admin['id'] ?></td>
        <td><?= $admin['name'] ?></td>
        <td><?= $admin['email'] ?></td>
        <td><?= $admin['role'] ?></td>
        <td>
            <a href="?act=edit-admin&id=<?= $admin['id'] ?>">Sửa</a> |
            <a onclick="return confirm('Bạn chắc chắn muốn xóa?')" href="?act=delete-admin&id=<?= $admin['id'] ?>">Xóa</a>
        </td>
    </tr>
    <?php endforeach; ?>
</table>
</div>