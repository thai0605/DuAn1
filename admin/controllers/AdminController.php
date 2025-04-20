<?php

class AdminController
{
    private $modelAdmin;

    public function __construct()
    {
        $this->modelAdmin = new Admin(); // Model xử lý dữ liệu admin
    }

    public function views_admin_list()
    {
        $admins = $this->modelAdmin->getAllAdmins();
        require_once './views/admin/listadmin.php';
    }

    public function views_add_admin()
    {
        require_once './views/admin/addadmin.php';
    }

    public function views_post_add_admin()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $name = trim($_POST['name']);
            $email = trim(strtolower($_POST['email']));
            $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
            $role = $_POST['role'] ?? 'product'; // mặc định là quản lý sản phẩm

            if ($this->modelAdmin->addAdmin($name, $email, $password, $role)) {
                $_SESSION['success'] = "Thêm admin thành công!";
                header('Location: ?act=admin-list');
                exit();
            } else {
                $_SESSION['error'] = "Lỗi khi thêm admin!";
                header('Location: ?act=add-admin');
                exit();
            }
        }
    }

    public function views_edit_admin()
    {
        $id = $_GET['id'] ?? null;
        if (!$id || !($admin = $this->modelAdmin->getAdminById($id))) {
            $_SESSION['error'] = "Không tìm thấy admin!";
            header('Location: ?act=admin-list');
            exit();
        }
        require_once './views/admin/edit.php';
    }

    public function views_post_edit_admin()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $id = $_POST['id'];
            $name = trim($_POST['name']);
            $email = trim(strtolower($_POST['email']));
            $role = $_POST['role'] ?? 'product';

            if ($this->modelAdmin->updateAdmin($id, $name, $email, $role)) {
                $_SESSION['success'] = "Cập nhật admin thành công!";
                header('Location: ?act=admin-list');
            } else {
                $_SESSION['error'] = "Lỗi khi cập nhật!";
                header('Location: ?act=edit-admin&id=' . $id);
            }
            exit();
        }
    }

    public function delete_admin()
    {
        $id = $_GET['id'] ?? null;
        if ($id && $this->modelAdmin->deleteAdmin($id)) {
            $_SESSION['success'] = "Xóa admin thành công!";
        } else {
            $_SESSION['error'] = "Xóa thất bại!";
        }
        header('Location: ?act=admin-list');
        exit();
    }
}
?>
