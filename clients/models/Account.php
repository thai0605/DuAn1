<?php

// models/User.php
class User {
    public $name;
    public $email;
    public $phone;
    private $pdo;

    // Khởi tạo với dữ liệu người dùng và kết nối CSDL
    public function __construct($data, $pdo = null) {
        $this->name = $data['name'];
        $this->email = $data['email'];
        $this->phone = $data['phone'];
        $this->pdo = $pdo;
    }

    // Lấy mật khẩu của người dùng từ CSDL
    public function getPassword($userId) {
        $stmt = $this->pdo->prepare("SELECT password FROM users WHERE id = :id");
        $stmt->execute(['id' => $userId]);
        return $stmt->fetchColumn();
    }

    // Cập nhật mật khẩu người dùng
    public function updateProfile($userId, $data) {
        try {
            $sql = "UPDATE users 
                    SET name = :name, 
                        email = :email, 
                        phone = :phone, 
                        updated_at = NOW()";
            
            // Nếu có ảnh mới, thêm vào câu lệnh SQL
            if (!empty($data['avatar'])) {
                $sql .= ", avatar = :avatar";
            }
            
            $sql .= " WHERE id = :id";
    
            $stmt = $this->pdo->prepare($sql);
    
            // Mảng dữ liệu để cập nhật
            $params = [
                'name' => $data['name'],
                'email' => $data['email'],
                'phone' => $data['phone'],
                'id' => $userId
            ];
    
            // Nếu có ảnh, thêm vào params
            if (!empty($data['avatar'])) {
                $params['avatar'] = $data['avatar'];
            }
    
            return $stmt->execute($params);
        } catch (PDOException $e) {
            error_log($e->getMessage());
            return false;
        }
    }
    

    public function updatePassword($userId, $newPassword) {
        $hashedPassword = password_hash($newPassword, PASSWORD_DEFAULT);
        $stmt = $this->pdo->prepare("UPDATE users SET password = :password WHERE id = :id");
        return $stmt->execute([
            'password' => $hashedPassword,
            'id' => $userId
        ]);
    }

    // Các phương thức khác liên quan đến người dùng có thể được thêm vào đây
}
