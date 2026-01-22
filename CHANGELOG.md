# Journal des Changements (CHANGELOG)

Ce fichier recense les modifications majeures apportées à l'architecture du projet "Sama".

## [Refonte] - 17 Janvier 2026

### 1. Réorganisation des Fichiers
*   **Nettoyage** : Suppression des anciens fichiers de "Vues" PHP (`src/Views/home`, `association`, `news/list.php`, etc.) qui ne servaient plus. Le site public utilise désormais uniquement des fichiers HTML statiques dans le dossier `public/`.
*   **Back-Office** : Conservation des vues d'administration dans `src/Views/admin` car l'espace admin reste en PHP.

### 2. Styles CSS
*   **Consolidation** : Tous les styles CSS ont été regroupés dans un seul fichier : `public/css/style.css`.
*   **Nettoyage** : Suppression des balises `<style>` qui traînaient dans les fichiers HTML pour une meilleure propreté.
*   **Organisation** : Le fichier CSS est structuré avec une table des matières (Variables, Layout, Navigation, etc.).

### 3. Contrôleurs & Routes
*   **API-First** : Les contrôleurs publics (`WorkshopController`, `NewsController`) ont été simplifiés. Ils ne renvoient plus de pages HTML mais uniquement des données **JSON** (API).
*   **Suppression** : Les contrôleurs devenus inutiles (`HomeController`, `AssociationController`) ont été supprimés.
*   **Routes** : Le fichier `src/routes.php` a été nettoyé pour ne garder que les routes API et les routes Admin.

### 4. Documentation & Commentaires
*   Ajout de **commentaires pédagogiques** ("Je fais ceci...") dans tous les fichiers importants (index.php, Router, Controllers, Models) pour faciliter la compréhension du code.
*   Création de ce `CHANGELOG.md` et de `README_CONTROLLERS.md`.
