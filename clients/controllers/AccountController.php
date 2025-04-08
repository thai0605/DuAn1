<?php
class AccountController
{
    private $pdo;

    // Khởi tạo với kết nối CSDL
    public function __construct($pdo) {
        $this->pdo = $pdo;
    }

    // Phương thức hiển thị thông tin tài khoản
    public function profile()
    {
        // Kiểm tra người dùng đã đăng nhập chưa
        if (!isset($_SESSION['user'])) {
            header("Location: ?act=login");
            exit();
        }

        // Lấy thông tin người dùng từ session
        $user = $_SESSION['user'];

        // Gọi view để hiển thị trang profile
        require_once 'clients/views/account/thongtin.php';
    }

    // Phương thức sửa hồ sơ
   
    public function editProfile()
{
    if (!isset($_SESSION['user'])) {
        header("Location: ?act=login");
        exit();
    }

    // Lấy thông tin đầy đủ của user từ database
    $stmt = $this->pdo->prepare("SELECT * FROM users WHERE id = :id");
    $stmt->execute(['id' => $_SESSION['user']['id']]);
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $name = $_POST['name'] ?? '';
        $email = $_POST['email'] ?? '';
        $phone = $_POST['phone'] ?? '';

        // Kiểm tra xem người dùng có tải ảnh lên không
        if (!empty($_FILES['avatar']['name'])) {
            $uploadDir = 'uploads/user/'; // Thư mục lưu ảnh
            $fileName = time() . '_' . basename($_FILES['avatar']['name']); // Đổi tên file để tránh trùng
            $uploadFile = $uploadDir . $fileName;

            // Kiểm tra định dạng hợp lệ
            $allowedTypes = ['image/jpeg', 'image/png', 'image/gif'];
            if (in_array($_FILES['avatar']['type'], $allowedTypes)) {
                if (move_uploaded_file($_FILES['avatar']['tmp_name'], $uploadFile)) {
                    $avatar = $uploadFile; // Đường dẫn ảnh mới
                } else {
                    $_SESSION['error'] = "Lỗi khi tải ảnh lên.";
                    header("Location: ?act=edit-profile");
                    exit();
                }
            } else {
                $_SESSION['error'] = "Định dạng ảnh không hợp lệ.";
                header("Location: ?act=edit-profile");
                exit();
            }
        } else {
            $avatar = $user['avatar']; // Giữ nguyên ảnh cũ nếu không chọn ảnh mới
        }

        // Cập nhật thông tin
        $userObj = new User($_SESSION['user'], $this->pdo);
        $updated = $userObj->updateProfile($_SESSION['user']['id'], [
            'name' => $name,
            'email' => $email,
            'phone' => $phone,
            'avatar' => $avatar
        ]);

        if ($updated) {
            $_SESSION['user']['name'] = $name;
            $_SESSION['user']['email'] = $email;
            $_SESSION['user']['phone'] = $phone;
            $_SESSION['user']['avatar'] = $avatar; // Cập nhật session để ảnh mới hiển thị ngay
            $_SESSION['success'] = "Cập nhật thông tin thành công!";
        } else {
            $_SESSION['error'] = "Có lỗi xảy ra khi cập nhật thông tin!";
        }

        header("Location: ?act=edit-profile");
        exit();
    }

    require_once 'clients/views/account/edit-profile.php';
}


    // Phương thức đổi mật khẩu
    public function changePassword()
{
    // Kiểm tra người dùng đã đăng nhập chưa
    if (!isset($_SESSION['user'])) {
        header("Location: ?act=login");
        exit();
    }

    // Lấy ID người dùng từ session
    $userId = $_SESSION['user']['id'];

    // Nếu gửi form đổi mật khẩu
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        // Lấy thông tin từ form
        $currentPassword = $_POST['current-password'] ?? '';
        $newPassword = $_POST['new-password'] ?? '';
        $confirmPassword = $_POST['confirm-password'] ?? '';

        // Khởi tạo đối tượng User với kết nối CSDL
        $user = new User($_SESSION['user'], $this->pdo);

        // Kiểm tra mật khẩu hiện tại
        $currentPasswordHash = $user->getPassword($userId);

        if (!password_verify($currentPassword, $currentPasswordHash)) {
            $_SESSION['error'] = "Mật khẩu hiện tại không đúng.";
            require_once 'clients/views/account/change-password.php';
            return;
        }

        // Kiểm tra mật khẩu mới và xác nhận mật khẩu có khớp không
        if ($newPassword !== $confirmPassword) {
            $_SESSION['error'] = "Mật khẩu mới và xác nhận mật khẩu không khớp.";
            require_once 'clients/views/account/change-password.php';
            return;
        }

        // Cập nhật mật khẩu mới vào cơ sở dữ liệu
        $user->updatePassword($userId, $newPassword);

        // Thiết lập thông báo thành công vào session
        $_SESSION['success'] = "Mật khẩu đã được thay đổi thành công.";

        // Chuyển hướng về trang profile
        header("Location: ?act=change-password");
        exit();
    }

    // Gọi view để hiển thị form đổi mật khẩu
    require_once 'clients/views/account/change-password.php';
}

    
}
