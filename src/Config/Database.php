<?php

namespace App\Config;

use PDO;
use PDOException;

// =========================================================================
// Gestionnaire de Base de Données (Singleton)
// =========================================================================
// Ma responsabilité est de gérer la connexion à MySQL.
// J'utilise le "Design Pattern Singleton" pour m'assurer qu'on n'ouvre pas
// cinquante connexions à la fois. Une seule suffit pour tout le monde !

class Database {
    // Je stocke l'instance unique de la connexion ici.
    private static $instance = null;
    private $pdo;

    // Mes identifiants de connexion (à garder secrets en production !).
    // Ici configurés pour XAMPP en local.
    private $host = '127.0.0.1';
    private $db_name = 'sama_db';
    private $username = 'root';
    private $password = ''; // Pas de mot de passe par défaut sur XAMPP

    // Le constructeur est "privé" : personne ne peut faire "new Database()" à l'extérieur.
    // C'est moi qui contrôle la création.
    private function __construct() {
        try {
            // "DSN" contient les infos de connexion (pilote, hôte, nom de la base, encodage).
            $dsn = "mysql:host=" . $this->host . ";dbname=" . $this->db_name . ";charset=utf8mb4";
            
            // J'ouvre la connexion PDO.
            $this->pdo = new PDO($dsn, $this->username, $this->password);
            
            // Je configure PDO pour qu'il me lance des Exceptions en cas d'erreur de requête.
            // C'est plus propre pour gérer les bugs.
            $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            
            // Par défaut, je veux que les résultats soient des tableaux associatifs (['nom' => 'Toto']).
            $this->pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
        } catch(PDOException $e) {
            // Si la connexion échoue (ex: serveur éteint), je stoppe tout.
            die("Erreur de connexion à la base de données : " . $e->getMessage());
        }
    }

    // C'est la seule façon d'obtenir la connexion : Database::getInstance().
    public static function getInstance() {
        // Si je n'ai pas encore créé l'instance, je le fais maintenant.
        if (self::$instance === null) {
            self::$instance = new Database();
        }
        // Je renvoie l'objet PDO prêt à l'emploi.
        return self::$instance->pdo;
    }
}
