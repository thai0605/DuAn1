<?php
class Admin
{
    private $conn;

    public function __construct() {
        $this->conn = new PDO("mysql:host=localhost;dbname=duan1;charset=utf8", "root", "");
    }

    public function getAllAdmins() {
        $stmt = $this->conn->query("SELECT * FROM admins");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getAdminById($id) {
        $stmt = $this->conn->prepare("SELECT * FROM admins WHERE id = ?");
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function addAdmin($name, $email, $password, $role) {
        $stmt = $this->conn->prepare("INSERT INTO admins (name, email, password, role) VALUES (?, ?, ?, ?)");
        return $stmt->execute([$name, $email, password_hash($password, PASSWORD_DEFAULT), $role]);
    }

    public function updateAdmin($id, $name, $email, $role) {
        $stmt = $this->conn->prepare("UPDATE admins SET name = ?, email = ?, role = ? WHERE id = ?");
        return $stmt->execute([$name, $email, $role, $id]);
    }

    public function deleteAdmin($id) {
        $stmt = $this->conn->prepare("DELETE FROM admins WHERE id = ?");
        return $stmt->execute([$id]);
    }
}
?>
