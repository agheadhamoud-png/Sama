<?php

namespace App\Entities;

class Workshop {
    private $id;
    private $title;
    private $description;
    private $objectives;
    private $target_audience;
    private $schedule;
    private $location;
    private $contact_info;
    private $category_id;
    private $category_name; // Propriété jointe
    private $created_at;

    public function __construct($data = []) {
        if (!empty($data)) {
            $this->hydrate($data);
        }
    }

    public function hydrate(array $data) {
        foreach ($data as $key => $value) {
            $method = 'set' . str_replace('_', '', ucwords($key, '_'));
            if (method_exists($this, $method)) {
                $this->$method($value);
            } else {
                // Fallback direct property access if needed or simple assignment
                if (property_exists($this, $key)) {
                    $this->$key = $value;
                }
            }
        }
        // Cas particuliers pour les jointures ou champs spécifiques
        if (isset($data['category_name'])) {
            $this->category_name = $data['category_name'];
        }
    }

    // Getters
    public function getId() { return $this->id; }
    public function getTitle() { return $this->title; }
    public function getDescription() { return $this->description; }
    public function getObjectives() { return $this->objectives; }
    public function getTargetAudience() { return $this->target_audience; }
    public function getSchedule() { return $this->schedule; }
    public function getLocation() { return $this->location; }
    public function getContactInfo() { return $this->contact_info; }
    public function getCategoryId() { return $this->category_id; }
    public function getCategoryName() { return $this->category_name; }
    public function getCreatedAt() { return $this->created_at; }

    // Setters (simplifiés)
    public function setId($id) { $this->id = $id; }
    public function setTitle($title) { $this->title = $title; }
    // ... on pourrait tous les faire, mais pour l'instant l'hydratation suffit souvent

    public function toArray() {
        return get_object_vars($this);
    }
}
