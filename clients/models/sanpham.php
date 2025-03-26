<?php

class   Sanpham {
    private $conn;

    public function __construct(){
        $this->conn = $this->connectDB();
    }

    private function connectDB(){
        try {
            return new PDO("mysql:host=localhost;dbname=duan11", "root", "", [
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            ]);
        } catch (PDOException $e) {
            die("Database connection error: " . $e->getMessage());
        }
    }


    
    public function getAllSanPhamHot(){
        try {
            $sql = "SELECT 
                c.id, 
                c.title, 
                c.image, 
                c.original_price,
                cs.sale_value,
                (c.original_price - COALESCE(
                    CASE 
                        WHEN cs.sale_value < 100 THEN (c.original_price * cs.sale_value / 100) 
                        ELSE cs.sale_value 
                    END, 
                0)) AS final_price
            FROM comics c
            LEFT JOIN comic_sales cs ON c.id = cs.comic_id
                AND cs.end_date >= CURRENT_DATE 
                AND cs.start_date <= CURRENT_DATE
            ORDER BY final_price ASC"; //Sắp xếp từ thấp đến cao, đổi thành DESC nếu muốn ngược lại--
            
            $stmt = $this->conn->prepare($sql);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (\Throwable $th) {
            error_log("Error in getAllSanPhamHot: " . $th->getMessage());
            return [];
        }
    }
    

    public function getAllSanPham(){
        try {
            $sql = "SELECT 
                    c.*, 
                    cs.sale_value
                FROM comics c
                LEFT JOIN comic_sales cs ON c.id = cs.comic_id 
                    AND cs.end_date >= CURRENT_DATE 
                    AND cs.start_date <= CURRENT_DATE
                ORDER BY c.id ASC";
                
                $stmt = $this->conn->prepare($sql);
                $stmt->execute();
                return $stmt->fetchAll();
        } catch (\Throwable $th) {
            error_log("Lỗi Lấy Danh Sách Sản Phẩm: " . $th->getMessage());
                return [];
        }
    }
    
    public function getSanPhamById($id){
        try {
            $sql = "SELECT 
            c.*, 
            cs.sale_value,
            v.format,
            v.language
        FROM comics c
        LEFT JOIN comic_sales cs ON c.id = cs.comic_id 
            AND cs.end_date >= CURRENT_DATE 
            AND cs.start_date <= CURRENT_DATE
        LEFT JOIN comic_variants v ON c.id = v.comic_id
        WHERE c.id = :id";
        
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([':id' => $id]);
        return $stmt->fetch();
        } catch (\Throwable $th) {
            error_log("Lỗi Xem Chi Tiết Sản Phẩm: " . $th->getMessage());
            return [];
        }
    }
}