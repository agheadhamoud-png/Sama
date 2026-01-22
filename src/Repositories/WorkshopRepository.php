<?php

namespace App\Repositories;

use App\Config\Database;
use App\Entities\Workshop;
use PDO;

class WorkshopRepository {
    private $db;

    public function __construct() {
        $this->db = Database::getInstance();
    }

    public function findAll($categoryId = null) {
        $sql = "SELECT w.*, c.name as category_name 
                FROM workshops w 
                LEFT JOIN categories c ON w.category_id = c.id";
        
        if ($categoryId) {
            $sql .= " WHERE w.category_id = :category_id";
        }
        
        $sql .= " ORDER BY created_at DESC";
        
        $stmt = $this->db->prepare($sql);
        
        if ($categoryId) {
            $stmt->bindValue(':category_id', $categoryId);
        }
        
        $stmt->execute();
        $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
        
        $workshops = [];
        foreach ($results as $row) {
            $workshops[] = new Workshop($row);
        }
        return $workshops;
    }

    public function findById($id) {
        $stmt = $this->db->prepare("SELECT w.*, c.name as category_name FROM workshops w LEFT JOIN categories c ON w.category_id = c.id WHERE w.id = :id");
        $stmt->execute(['id' => $id]);
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        
        if ($row) {
            return new Workshop($row);
        }
        return null;
    }

    public function create(array $data) {
        $stmt = $this->db->prepare("INSERT INTO workshops (title, description, objectives, target_audience, schedule, location, contact_info, category_id) VALUES (:title, :description, :objectives, :target_audience, :schedule, :location, :contact_info, :category_id)");
        return $stmt->execute($data);
    }

    public function update($id, array $data) {
        $data['id'] = $id;
        $stmt = $this->db->prepare("UPDATE workshops SET title = :title, description = :description, objectives = :objectives, target_audience = :target_audience, schedule = :schedule, location = :location, contact_info = :contact_info, category_id = :category_id WHERE id = :id");
        return $stmt->execute($data);
    }

    public function delete($id) {
        $stmt = $this->db->prepare("DELETE FROM workshops WHERE id = :id");
        return $stmt->execute(['id' => $id]);
    }
}
