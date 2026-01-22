# Documentation des Contrôleurs (Back-Office)

Ce document explique comment gérer le contenu du site via l'interface d'administration.

## Accès à l'administration
Pour accéder à l'interface de gestion, rendez-vous sur : `/Sama/public/admin`
Connectez-vous avec vos identifiants.

---

## 1. Gestion des Ateliers (Formations)

### Ajouter un nouvel atelier
1.  Connectez-vous au tableau de bord.
2.  Dans la section "Formations & Ateliers", cliquez sur le bouton bleu **"+ Nouvelle Formation"**.
3.  Remplissez le formulaire :
    *   **Titre** : Le nom de l'atelier.
    *   **Catégorie** : Choisissez la catégorie (Français, Insertion, etc.).
    *   **Description, Objectifs, Public** : Détails pédagogiques.
    *   **Infos Pratiques** : Horaire, Lieu, Contact.
4.  Cliquez sur **"Enregistrer"**. L'atelier apparaîtra immédiatement sur le site public.

### Modifier un atelier
1.  Sur le tableau de bord, trouvez l'atelier dans la liste.
2.  Cliquez sur le bouton jaune **"Modifier"**.
3.  Changez les informations souhaitées.
4.  Validez.

### Supprimer un atelier
1.  Sur le tableau de bord, trouvez l'atelier.
2.  Cliquez sur le bouton rouge **"Supprimer"**.
3.  Confirmez votre choix. **Attention, c'est définitif !**

---

## 2. Gestion des Actualités

### Ajouter une actualité
1.  Sur le tableau de bord, section "Actualités", cliquez sur **"+ Nouvelle Actualité"**.
2.  Renseignez :
    *   **Titre** : Le titre de l'article.
    *   **Image URL** : Le lien vers une image (ex: `images/photo.jpg`).
    *   **Contenu** : Le texte de l'article.
3.  Validez.

### Modifier ou Supprimer
La procédure est identique à celle des ateliers (boutons "Modifier" et "Supprimer").

---

## Fonctionnement Technique (Pour Développeurs)
Les contrôleurs sont situés dans `src/Controllers/`.
*   **WorkshopController** & **NewsController** : Servent uniquement à envoyer les données au format JSON pour le site public.
*   **AdminController** : Gère toute l'interface d'administration (pages PHP classiques).
*   **ContactController** : Gère l'envoi des emails via le formulaire de contact.
