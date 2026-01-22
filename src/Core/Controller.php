<?php

namespace App\Core;

// =========================================================================
// Le Contrôleur de Base
// =========================================================================
// C'est le "parent" de tous les contrôleurs du site.
// Je fournis des outils communs pour ne pas avoir à les réécrire partout.

class Controller {
    
    // Cette fonction charge une vue HTML (un fichier PHP dans src/Views).
    // Elle est surtout utilisée pour l'espace Admin (le Front public utilise du HTML statique).
    // $view : le nom du fichier (ex: 'admin/dashboard').
    // $data : un tableau de données à passer à la vue (ex: ['titre' => 'Accueil']).
    protected function view($view, $data = []) {
        // La fonction extract() transforme les clés du tableau en variables.
        // Si $data = ['nom' => 'Toto'], alors la variable $nom existera dans la vue avec la valeur 'Toto'.
        extract($data);
        
        $viewFile = "../src/Views/" . $view . ".php";
        
        if (file_exists($viewFile)) {
            require_once $viewFile;
        } else {
            // Si le fichier n'existe pas, je préviens le développeur.
            die("Erreur : La vue demandée n'existe pas (" . $viewFile . ")");
        }
    }

    // Petit utilitaire pour rediriger l'utilisateur vers une autre page.
    // Très utile après avoir traité un formulaire pour renvoyer vers la liste.
    protected function redirect($url) {
        header("Location: " . $url);
        exit(); // Toujours arrêter le script après une redirection !
    }
}
