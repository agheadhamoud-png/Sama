<?php

// =========================================================================
// Définition des Routes
// =========================================================================
// Je définis ici les points d'accès à mon application (End-Points).
// Comme j'ai séparé le Frontend (HTML statique) du Backend (API JSON),
// je n'ai plus besoin de routes pour afficher les pages HTML (Apache s'en charge).

// -------------------------------------------------------------------------
// 1. API JSON (backend pour le site public)
// -------------------------------------------------------------------------
// Ces routes sont appelées par JavaScript (fetch) depuis les pages .html

// Ateliers
$router->add('GET', 'api/workshops', 'WorkshopController', 'apiIndex');       // Liste
$router->add('GET', 'api/workshops/{id}', 'WorkshopController', 'apiDetail'); // Détail

// Actualités
$router->add('GET', 'api/news', 'NewsController', 'apiIndex');                // Liste
$router->add('GET', 'api/news/{id}', 'NewsController', 'apiDetail');          // Détail

// Catégories (Nouveau Endpoint)
$router->add('GET', 'api/categories', 'CategoryController', 'apiIndex');      // Liste des catégories


// Contact
$router->add('POST', 'api/contact', 'ContactController', 'apiSend');          // Envoi message

// -------------------------------------------------------------------------
// 2. Espace Administration (Back-Office PHP)
// -------------------------------------------------------------------------
// L'admin reste en PHP classique (Server-Side Rendering) pour la sécurité 
// et parce qu'il n'y a pas besoin d'être en  HTML statique.

// Authentification
$router->add('GET', 'admin', 'AdminController', 'login');
$router->add('GET', 'admin/login', 'AdminController', 'login');
$router->add('POST', 'admin/auth', 'AdminController', 'auth');
$router->add('GET', 'admin/logout', 'AdminController', 'logout');
$router->add('GET', 'admin/dashboard', 'AdminController', 'dashboard');

// CRUD Formations (Create, Read, Update, Delete)
$router->add('GET', 'admin/workshop/create', 'AdminController', 'workshopCreate');
$router->add('POST', 'admin/workshop/store', 'AdminController', 'workshopStore');
$router->add('GET', 'admin/workshop/edit/{id}', 'AdminController', 'workshopEdit');
$router->add('POST', 'admin/workshop/update/{id}', 'AdminController', 'workshopUpdate');
$router->add('GET', 'admin/workshop/delete/{id}', 'AdminController', 'workshopDelete');

// CRUD Actualités
$router->add('GET', 'admin/news/create', 'AdminController', 'newsCreate');
$router->add('POST', 'admin/news/store', 'AdminController', 'newsStore');
$router->add('GET', 'admin/news/edit/{id}', 'AdminController', 'newsEdit');
$router->add('POST', 'admin/news/update/{id}', 'AdminController', 'newsUpdate');
$router->add('GET', 'admin/news/delete/{id}', 'AdminController', 'newsDelete');
