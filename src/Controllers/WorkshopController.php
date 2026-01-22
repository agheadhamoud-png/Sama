<?php

namespace App\Controllers;

use App\Core\Controller;
use App\Repositories\WorkshopRepository;

// =========================================================================
// Contrôleur des Formations (API)
// =========================================================================
// Mon rôle est de fournir les données des ateliers au format JSON pour le frontend.
// Le frontend (formations.html) m'interroge, et je lui réponds avec les données de la base.

class WorkshopController extends Controller {
    
    // API : Liste des ateliers
    // Route : GET /api/workshops
    // Option : ?category=1 (pour filtrer)
    public function apiIndex() {
        // 1. Je dis que je renvoie du JSON encodé en UTF-8.
        header('Content-Type: application/json; charset=utf-8');
        
        // 2. Je récupère le filtre de catégorie si présent.
        $category = $_GET['category'] ?? null;
        
        // 3. Je demande au Repository de chercher les données.
        $repo = new WorkshopRepository();
        $workshops = $repo->findAll($category);
        
        // 4. Conversion en tableau pour JSON
        $data = array_map(function($w) {
            return $w->toArray();
        }, $workshops);
        
        // 5. J'encode le tableau PHP en texte JSON et je l'affiche.
        echo json_encode($data);
        exit;
    }

    // API : Détail d'un atelier
    // Route : GET /api/workshops/{id}
    public function apiDetail($id) {
        header('Content-Type: application/json; charset=utf-8');
        
        // Je demande au Repository de trouver l'atelier n° $id
        $repo = new WorkshopRepository();
        $workshop = $repo->findById($id);
        
        // Si je ne le trouve pas, je renvoie une erreur 404 (Not Found).
        if (!$workshop) {
            http_response_code(404);
            echo json_encode(['error' => 'Formation introuvable']);
            exit;
        }
        
        // Sinon, je renvoie les données.
        echo json_encode($workshop->toArray());
        exit;
    }
}
