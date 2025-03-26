<?php

class Danhmuc{
    public $conn;

    public function __construct(){
        $this->conn = connectDB();
    }


    
    public function getAllDanhMuc(){
        try {
            $sql = "SELECT * FROM categories ORDER BY name ASC";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute();
            return $stmt->fetchAll();
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