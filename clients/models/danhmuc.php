<?php
<<<<<<< HEAD
class DanhMuc
{
    public $conn;
    public function __construct() {
        $this->conn = connectDB();
    }
    public function getAllDanhMuc()
    {
=======

class Danhmuc{
    public $conn;

    public function __construct(){
        $this->conn = connectDB();
    }


    
    public function getAllDanhMuc(){
>>>>>>> bd029987fa0ff632ff538b73952f904dfe840f1c
        try {
            $sql = "SELECT * FROM categories ORDER BY name ASC";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute();
            return $stmt->fetchAll();
<<<<<<< HEAD
        } catch (Exception $e) {
            echo "lỗi" . $e->getMessage();
            return [];
        }
    }
    public function layTatCaDanhMuc() {
        try {
            $sql = "SELECT id, name FROM categories";
            $stmt = $this->conn->query($sql); // Đổi từ $this->db thành $this->conn
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (Exception $e) {
            echo "Lỗi: " . $e->getMessage();
            return [];
        }
    }
    
}
?>
=======
        } catch (\Throwable $th) {
            echo "lỗi" . $th->getMessage();
            return [];
        }
    }

    public function getAllDanhMucId(){
       try {
        $sql = "SELECT id , name FROM categories";
        $stmt = $this->conn->query($sql);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
       } catch (\Throwable $th) {
        echo "lỗi" . $th->getMessage();
            return [];
       }
    }
}
>>>>>>> bd029987fa0ff632ff538b73952f904dfe840f1c
