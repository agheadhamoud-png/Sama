<?php

namespace App\Models;

use App\Config\Database;
use PDO;

// =========================================================================
// Modèle Workshop (Atelier / Formation)
// =========================================================================
// Ce fichier gère toutes les interactions avec la table "workshops" de la base de données.
// C'est ici que je récupère, ajoute, modifie ou supprime des formations.

class Workshop {
    
    // Cette fonction charge la liste des ateliers.
    // Si on lui donne un $categoryId (facultatif), elle ne renvoie que les ateliers de cette catégorie.
    public static function getAll($categoryId = null) {
        // 1. Je récupère ma connexion à la base.
        $db = Database::getInstance();
        
        // 2. Je prépare ma requête SQL.
        // Je fais une jointure (LEFT JOIN) avec la table "categories" pour récupérer le nom de la catégorie en même temps.
        $sql = "SELECT w.*, c.name as category_name 
                FROM workshops w 
                LEFT JOIN categories c ON w.category_id = c.id";
        
        // Si filtre par catégorie...
        if ($categoryId) {
            $sql .= " WHERE w.category_id = :category_id";
        }
        
        // Je trie par date de création (du plus récent au plus vieux).
        $sql .= " ORDER BY created_at DESC";
        
        $stmt = $db->prepare($sql);
        
        if ($categoryId) {
            $stmt->bindValue(':category_id', $categoryId);
        }
        
        // 3. J'exécute la requête et je renvoie tous les résultats.
        $stmt->execute();
        return $stmt->fetchAll();
    }

    // Cette fonction récupère UN seul atelier grâce à son ID.
    public static function getById($id) {
        $db = Database::getInstance();
        $stmt = $db->prepare("SELECT w.*, c.name as category_name FROM workshops w LEFT JOIN categories c ON w.category_id = c.id WHERE w.id = :id");
        $stmt->execute(['id' => $id]);
        // Je renvoie le premier (et unique) résultat.
        return $stmt->fetch();
    }
    
    // Cette fonction ajoute un nouvel atelier dans la base.
    // $data est un tableau contenant toutes les infos (titre, description, etc.).
    public static function create($data) {
        $db = Database::getInstance();
        $stmt = $db->prepare("INSERT INTO workshops (title, description, objectives, target_audience, schedule, location, contact_info, category_id) VALUES (:title, :description, :objectives, :target_audience, :schedule, :location, :contact_info, :category_id)");
        return $stmt->execute($data);
    }

    // Cette fonction met à jour un atelier existant.
    public static function update($id, $data) {
        $db = Database::getInstance();
        $data['id'] = $id; // J'ajoute l'ID aux données pour la clause WHERE
        $stmt = $db->prepare("UPDATE workshops SET title = :title, description = :description, objectives = :objectives, target_audience = :target_audience, schedule = :schedule, location = :location, contact_info = :contact_info, category_id = :category_id WHERE id = :id");
        return $stmt->execute($data);
    }

    // Cette fonction supprime définitivement un atelier.
    public static function delete($id) {
        $db = Database::getInstance();
        $stmt = $db->prepare("DELETE FROM workshops WHERE id = :id");
        return $stmt->execute(['id' => $id]);
    }
}
