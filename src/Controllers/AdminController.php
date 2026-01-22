<?php

namespace App\Controllers;

use App\Core\Controller;
use App\Models\User;
use App\Models\Workshop;
use App\Models\News;

// =========================================================================
// Contrôleur de l'Administration (Back-Office)
// =========================================================================
// C'est le cerveau de toute la partie gestion du site.
// Contrairement au site public (qui est en HTML/JS), ici je génère des pages PHP
// parce que j'ai besoin de sécuriser l'accès (mot de passe).

class AdminController extends Controller {

    // -------------------------------------------------------------------------
    // 1. Authentification (Connexion/Déconnexion)
    // -------------------------------------------------------------------------

    // Affiche le formulaire de connexion.
    public function login() {
        // Si l'admin est déjà connecté, je le renvoie direct sur le tableau de bord.
        if (isset($_SESSION['user_id'])) {
            $this->redirect('/Sama/public/admin/dashboard');
        }
        // Sinon, j'affiche la page de login.
        $this->view('admin/login', ['title' => 'Connexion Admin - SAMA']);
    }

    // Traite le formulaire de connexion (quand on clique sur "Se connecter").
    public function auth() {
        $username = $_POST['username'] ?? '';
        $password = $_POST['password'] ?? '';

        // Je demande au Modèle User de chercher qui s'appelle comme ça.
        $user = User::findByUsername($username);

        // Je vérifie si l'utilisateur existe ET si le mot de passe est bon (grâce au hachage).
        if ($user && password_verify($password, $user['password_hash'])) {
            // C'est gagné ! Je stocke son ID dans la session pour m'en souvenir.
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['username'] = $user['username'];
            // Hop, direction le tableau de bord.
            $this->redirect('/Sama/public/admin/dashboard');
        } else {
            // Perdu. Je réaffiche le login avec un message d'erreur.
            $this->view('admin/login', ['title' => 'Connexion Admin', 'error' => 'Identifiants incorrects']);
        }
    }

    // Déconnecte l'admin.
    public function logout() {
        // Je détruis la session (j'oublie qui il est).
        session_destroy();
        $this->redirect('/Sama/public/admin/login');
    }

    // -------------------------------------------------------------------------
    // 2. Tableau de Bord
    // -------------------------------------------------------------------------

    // -------------------------------------------------------------------------
    // 2. Tableau de Bord
    // -------------------------------------------------------------------------

    public function dashboard() {
        $this->checkAuth();
        
        // Use Repositories
        $workshopRepo = new \App\Repositories\WorkshopRepository();
        $workshops = $workshopRepo->findAll(); 
        
        // News still uses Model (as per scope, but could be refactored)
        $newsList = News::getAll();      
        
        $this->view('admin/dashboard', [
            'title' => 'Tableau de bord - Admin',
            'workshops' => $workshops, // Now returns array of Entities
            'newsList' => $newsList
        ]);
    }

    // -------------------------------------------------------------------------
    // 3. Gestion des Ateliers (CRUD)
    // -------------------------------------------------------------------------

    // CREATE (Afficher le formulaire)
    public function workshopCreate() {
        $this->checkAuth();
        
        $catRepo = new \App\Repositories\CategoryRepository();
        $categories = $catRepo->findAll();
        
        $this->view('admin/workshop_form', ['title' => 'Ajouter Formation - Admin', 'categories' => $categories]);
    }

    // STORE (Enregistrer le nouvel atelier)
    public function workshopStore() {
        $this->checkAuth();
        $data = [
            'title' => $_POST['title'],
            'description' => $_POST['description'],
            'objectives' => $_POST['objectives'],
            'target_audience' => $_POST['target_audience'],
            'schedule' => $_POST['schedule'],
            'location' => $_POST['location'],
            'contact_info' => $_POST['contact_info'],
            'category_id' => $_POST['category_id']
        ];
        
        $repo = new \App\Repositories\WorkshopRepository();
        $repo->create($data);
        
        $this->redirect('/Sama/public/admin/dashboard');
    }

    // EDIT (Afficher le formulaire pré-rempli pour modification)
    public function workshopEdit($id) {
        $this->checkAuth();
        
        $workshopRepo = new \App\Repositories\WorkshopRepository();
        $workshop = $workshopRepo->findById($id);
        
        $catRepo = new \App\Repositories\CategoryRepository();
        $categories = $catRepo->findAll();
        
        $this->view('admin/workshop_form', ['title' => 'Modifier Formation - Admin', 'workshop' => $workshop, 'categories' => $categories]);
    }

    // UPDATE (Enregistrer les modifications)
    public function workshopUpdate($id) {
        $this->checkAuth();
        $data = [
            'title' => $_POST['title'],
            'description' => $_POST['description'],
            'objectives' => $_POST['objectives'],
            'target_audience' => $_POST['target_audience'],
            'schedule' => $_POST['schedule'],
            'location' => $_POST['location'],
            'contact_info' => $_POST['contact_info'],
            'category_id' => $_POST['category_id']
        ];
        
        $repo = new \App\Repositories\WorkshopRepository();
        $repo->update($id, $data);
        
        $this->redirect('/Sama/public/admin/dashboard');
    }

    // DELETE (Supprimer un atelier)
    public function workshopDelete($id) {
        $this->checkAuth();
        $repo = new \App\Repositories\WorkshopRepository();
        $repo->delete($id);
        
        $this->redirect('/Sama/public/admin/dashboard');
    }

    // -------------------------------------------------------------------------
    // 4. Gestion des Actualités (CRUD)
    // -------------------------------------------------------------------------
    // C'est exactement la même logique que pour les ateliers.

    public function newsCreate() {
        $this->checkAuth();
        $this->view('admin/news_form', ['title' => 'Ajouter Actualité - Admin']);
    }

    public function newsStore() {
        $this->checkAuth();
        $data = [
            'title' => $_POST['title'],
            'content' => $_POST['content'],
            'image_url' => $_POST['image_url']
        ];
        News::create($data);
        $this->redirect('/Sama/public/admin/dashboard');
    }

    public function newsEdit($id) {
        $this->checkAuth();
        $news = News::getById($id);
        $this->view('admin/news_form', ['title' => 'Modifier Actualité - Admin', 'news' => $news]);
    }

    public function newsUpdate($id) {
        $this->checkAuth();
        $data = [
            'title' => $_POST['title'],
            'content' => $_POST['content'],
            'image_url' => $_POST['image_url']
        ];
        News::update($id, $data);
        $this->redirect('/Sama/public/admin/dashboard');
    }

    public function newsDelete($id) {
        $this->checkAuth();
        News::delete($id);
        $this->redirect('/Sama/public/admin/dashboard');
    }

    // -------------------------------------------------------------------------
    // Méthode utilitaire privée
    // -------------------------------------------------------------------------
    // Vérifie si l'utilisateur est connecté. Sinon, le renvoie à la porte (login).
    private function checkAuth() {
        if (!isset($_SESSION['user_id'])) {
            $this->redirect('/Sama/public/admin/login');
        }
    }
}
