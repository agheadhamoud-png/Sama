<?php

namespace App\Models;

use App\Config\Database;
use PDO;

// =========================================================================
// Modèle User (Administrateur)
// =========================================================================
// Je gère les utilisateurs qui ont le droit de se connecter à l'admin.

class User {
    
    // Cette fonction cherche un utilisateur par son nom d'utilisateur (username).
    // Elle est utilisée lors de la connexion pour vérifier si le compte existe.
    public static function findByUsername($username) {
        $db = Database::getInstance();
        $stmt = $db->prepare("SELECT * FROM users WHERE username = :username");
        $stmt->execute(['username' => $username]);
        
        // Je renvoie les infos de l'utilisateur (y compris son mot de passe haché) ou false si rien trouvé.
        return $stmt->fetch();
    }
}
