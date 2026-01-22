<?php

namespace App\Repositories;

use App\Config\Database;
use App\Entities\Category;
use PDO;

class CategoryRepository {
    private $db;

    public function __construct() {
        $this->db = Database::getInstance();
    }

    public function findAll() {
        $stmt = $this->db->query("SELECT * FROM categories ORDER BY name ASC");
        $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
        
        $categories = [];
        foreach ($results as $row) {
            $categories[] = new Category($row);
        }
        return $categories;
    }
}
