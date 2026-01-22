<?php

namespace App\Controllers;

use App\Core\Controller;
use App\Repositories\CategoryRepository;

class CategoryController extends Controller {
    
    // API : Liste des catégories
    // Route : GET /api/categories
    public function apiIndex() {
        header('Content-Type: application/json; charset=utf-8');
        
        $repo = new CategoryRepository();
        $categories = $repo->findAll();
        
        // Convert entities to array for JSON encoding
        $data = array_map(function($cat) {
            return $cat->toArray();
        }, $categories);
        
        echo json_encode($data);
        exit;
    }
}
