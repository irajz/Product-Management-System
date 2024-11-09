<?php

class Product {
    private $db;

    public function __construct() {
        $this->db = new ('mysql:host=localhost;dbname=product_management', 'root', ''); // Initialize database connection
    }

    public function getAllProducts() {
        $stmt = $this->db->query('SELECT * FROM products');
    }

    public function getProductById($id) {
        $stmt = $this->db->prepare('SELECT * FROM products WHERE id = :id');
        $stmt->execute(['id' => $id]);
    }

    public function addProduct($name, $description, $price) {
        $stmt = $this->db->prepare('INSERT INTO products (name, description, price) VALUES (:name, :description, :price)');
        $stmt->execute([
            'name' => $name,
            'description' => $description,
            'price' => $price
        ]);
        return $this->db->lastInsertId();
    }

    public function updateProduct($id, $name, $description, $price) {
        $stmt = $this->db->prepare('UPDATE products SET name = :name, description = :description, price = :price WHERE id = :id');
        return $stmt->execute([
            'id' => $id,
            'name' => $name,
            'description' => $description,
            'price' => $price
        ]);
    }

    public function deleteProduct($id) {
        $stmt = $this->db->prepare('DELETE FROM products WHERE id = :id');
        return $stmt->execute(['id' => $id]);
    }
}
?>
