<?php

class Banner {
    public $conn;

    public function __construct(){
        $this->conn = connectDB();
    }

    public function getAllBanner(){
        try {
            $sql = "SELECT *from banners";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute();
            return $stmt->fetchAll();
        } catch (\Throwable $th) {
            echo 'Lỗi: ' . $th->getMessage();
        }
    }
}