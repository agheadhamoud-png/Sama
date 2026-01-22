<?php

namespace App\Entities;

class Category {
    private $id;
    private $name;

    public function getId() {
        return $this->id;
    }

    public function getName() {
        return $this->name;
    }

    public function setName($name) {
        $this->name = $name;
    }

    // Hydratation via tableau (utile pour PDO fetchObject ou manuel)
    public function __construct($data = []) {
        if (!empty($data)) {
            $this->id = $data['id'] ?? null;
            $this->name = $data['name'] ?? null;
        }
    }
    
    public function toArray() {
        return [
            'id' => $this->id,
            'name' => $this->name
        ];
    }
}
