<?php

namespace App\Controllers;

use App\Core\Controller;

// =========================================================================
// Contrôleur de Contact
// =========================================================================
// Je gère l'envoi du formulaire de contact.
// Note : Comme la page de contact est maintenant un fichier HTML statique (contact.html),
// je ne sers plus qu'à recevoir les données en AJAX (Fetch) pour envoyer l'email.

class ContactController extends Controller {
    
    // Cette fonction reçoit les données du formulaire via une requête POST.
    // Elle est appelée par JavaScript quand l'utilisateur clique sur "Envoyer".
    public function apiSend() {
        // Je préviens le navigateur que je vais lui répondre en JSON.
        header('Content-Type: application/json');

        // Validation basique des données (pour ne pas envoyer de mails vides).
        if(empty($_POST['email']) || empty($_POST['message'])){
             echo json_encode(['success' => false, 'message' => 'Veuillez remplir tous les champs.']);
             exit;
        }

        // Ici, je devrais normalement utiliser la fonction mail() de PHP ou une librairie comme PHPMailer
        // pour envoyer le message. Pour l'exercice local, je simule juste un succès.
        
        // $to = "contact@sama-auvergne.org";
        // $subject = "Nouveau message de " . $_POST['name'];
        // mail($to, $subject, $_POST['message']);

        // Je réponds au Javascript que tout s'est bien passé.
        echo json_encode(['success' => true, 'message' => 'Votre message a bien été envoyé ! (Simulation)']);
        exit;
    }
}
