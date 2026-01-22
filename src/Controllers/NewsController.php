<?php

namespace App\Controllers;

use App\Core\Controller;
use App\Models\News;

// =========================================================================
// Contrôleur des Actualités (API)
// =========================================================================
// Même principe que pour les ateliers : je sers de passerelle entre la base de données
// et la page JavaScript (actualites.html).

class NewsController extends Controller {
    
    // API : Liste des news
    // Route : GET /api/news
    public function apiIndex() {
        header('Content-Type: application/json');
        
        // Je récupère tout via le Modèle.
        $newsList = News::getAll();
        
        // J'envoie au javascript.
        echo json_encode($newsList);
        exit;
    }

    // API : Détail d'une news
    // Route : GET /api/news/{id}
    public function apiDetail($id) {
        header('Content-Type: application/json');
        
        $news = News::getById($id);
        
        if (!$news) {
            http_response_code(404);
            echo json_encode(['error' => 'Actualité introuvable']);
            exit;
        }
        
        echo json_encode($news);
        exit;
    }
}
