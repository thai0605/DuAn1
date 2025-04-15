<?php
class CartModel
{
    private $conn;

    public function __construct()
    {
        $this->conn = connectDB();
    }

    public function getCartItems($userId)
    {
        $sql = "SELECT ci.*, c.title, c.price, c.image, c.stock_quantity 
                FROM cart_items ci
                JOIN comics c ON ci.comic_id = c.id
                WHERE ci.cart_id IN (SELECT id FROM cart WHERE user_id = ?)";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([$userId]);
        return $stmt->fetchAll();
    }

    public function addItem($userId, $comicId, $quantity)
    {
        $sql = "SELECT price FROM comics WHERE id = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([$comicId]);
        $comic = $stmt->fetch();
        
        if (!$comic) return false;
    
        $cartId = $this->getOrCreateCart($userId);
    
        // Kiểm tra sản phẩm đã có trong giỏ chưa
        $checkSql = "SELECT id, quantity FROM cart_items WHERE cart_id = ? AND comic_id = ?";
        $checkStmt = $this->conn->prepare($checkSql);
        $checkStmt->execute([$cartId, $comicId]);
        $existingItem = $checkStmt->fetch();
    
        if ($existingItem) {
            // Tăng số lượng
            $newQuantity = $existingItem['quantity'] + $quantity;
            $updateSql = "UPDATE cart_items SET quantity = ? WHERE id = ?";
            $updateStmt = $this->conn->prepare($updateSql);
            return $updateStmt->execute([$newQuantity, $existingItem['id']]);
        } else {
            // Thêm mới nếu chưa có
            $insertSql = "INSERT INTO cart_items (cart_id, comic_id, quantity, unit_price) 
                          VALUES (?, ?, ?, ?)";
            $insertStmt = $this->conn->prepare($insertSql);
            return $insertStmt->execute([$cartId, $comicId, $quantity, $comic['price']]);
        }
    }
    

    private function getOrCreateCart($userId)
    {
        $sql = "SELECT id FROM cart WHERE user_id = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([$userId]);
        $cart = $stmt->fetch();

        if ($cart) {
            return $cart['id'];
        }

        $sql = "INSERT INTO cart (user_id) VALUES (?)";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([$userId]);
        return $this->conn->lastInsertId();
    }

    public function updateQuantity($itemId, $quantity, $userId)
    {
        // Kiểm tra số lượng sản phẩm trong kho
        $sql = "SELECT p.stock_quantity 
                FROM cart_items ci
                JOIN comics p ON ci.comic_id = p.id
                WHERE ci.id = ? AND ci.cart_id IN (SELECT id FROM cart WHERE user_id = ?)";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([$itemId, $userId]);
        $product = $stmt->fetch();

        if (!$product || $quantity > $product['stock_quantity']) {
            return false; // Không thể cập nhật nếu số lượng vượt quá kho
        }

        // Cập nhật số lượng trong giỏ hàng
        $sql = "UPDATE cart_items 
                SET quantity = ? 
                WHERE id = ? AND cart_id IN (SELECT id FROM cart WHERE user_id = ?)";
        $stmt = $this->conn->prepare($sql);
        return $stmt->execute([$quantity, $itemId, $userId]);
    }

    public function removeItem($itemId, $userId)
    {
        $sql = "DELETE ci FROM cart_items ci 
                JOIN cart c ON ci.cart_id = c.id 
                WHERE ci.id = ? AND c.user_id = ?";
        $stmt = $this->conn->prepare($sql);
        return $stmt->execute([$itemId, $userId]);
    }

    public function getCartTotal($userId)
    {
        $sql = "SELECT SUM(ci.quantity * c.price) as total 
                FROM cart_items ci 
                JOIN comics c ON ci.comic_id = c.id 
                JOIN cart ca ON ci.cart_id = ca.id 
                WHERE ca.user_id = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([$userId]);
        $result = $stmt->fetch();
        return $result['total'] ?? 0;
    }

    public function deleteCart($userId)
    {
        // Xóa cart_items trước
        $sql = "DELETE ci FROM cart_items ci 
                JOIN cart c ON ci.cart_id = c.id 
                WHERE c.user_id = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([$userId]);

        // Sau đó xóa cart
        $sql = "DELETE FROM cart WHERE user_id = ?";
        $stmt = $this->conn->prepare($sql);
        return $stmt->execute([$userId]);
    }

    public function getProductStock($comicId)
    {
        $sql = "SELECT stock_quantity FROM comics WHERE id = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([$comicId]);
        return $stmt->fetch();
    }
}