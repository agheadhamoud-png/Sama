<?php

namespace App\Models;

use App\Config\Database;
use PDO;

// =========================================================================
// Modèle News (Actualités / Projets)
// =========================================================================
// Je m'occupe de la table "news". Je gère les actus du site.

class News {
    
    // Récupère toutes les actualités, triées par date de publication (plus récent en haut).
    public static function getAll() {
        $db = Database::getInstance();
        // Ici pas besoin de prepare() car il n'y a pas de paramètre variable, query() suffit.
        $stmt = $db->query("SELECT * FROM news ORDER BY published_at DESC");
        return $stmt->fetchAll();
    }

    // Récupère une actu précise par son ID.
    public static function getById($id) {
        $db = Database::getInstance();
        $stmt = $db->prepare("SELECT * FROM news WHERE id = :id");
        $stmt->execute(['id' => $id]);
        return $stmt->fetch();
    }

    // Crée une nouvelle actualité.
    public static function create($data) {
        $db = Database::getInstance();
        $stmt = $db->prepare("INSERT INTO news (title, content, image_url) VALUES (:title, :content, :image_url)");
        return $stmt->execute($data);
    }

    // Modifie une actualité existante.
    public static function update($id, $data) {
        $db = Database::getInstance();
        $data['id'] = $id;
        $stmt = $db->prepare("UPDATE news SET title = :title, content = :content, image_url = :image_url WHERE id = :id");
        return $stmt->execute($data);
    }

    // Supprime une actualité.
    public static function delete($id) {
        $db = Database::getInstance();
        $stmt = $db->prepare("DELETE FROM news WHERE id = :id");
        return $stmt->execute(['id' => $id]);
    }
}
