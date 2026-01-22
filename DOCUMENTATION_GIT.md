# Documentation - Gestion du Versionning avec Git/GitHub

## 1. Vue d'ensemble

Dans le cadre du projet SAMA, nous utilisons **Git** couplé à **GitHub** pour assurer une gestion professionnelle du code source.

**Pourquoi cette approche ?**
*   **Traçabilité** : Chaque modification est enregistrée (qui a fait quoi, quand et pourquoi).
*   **Sécurité** : Le code est sauvegardé sur un serveur distant (GitHub), évitant toute perte de données en cas de panne locale.
*   **Historique** : Possibilité de revenir en arrière facilement si une erreur est introduite ("rollback").
*   **Collaboration** : Permet à terme de travailler à plusieurs sur le même projet sans écraser le travail des autres.

## 2. Workflow utilisé

Nous avons adopté un flux de travail standard pour ce projet :

### Commandes Git principales utilisées :

*   `git clone [url]` : Récupérer le projet complet sur une nouvelle machine.
*   `git add .` : Ajouter (stager) toutes les modifications récentes pour la prochaine sauvegarde.
*   `git commit -m "message explicite"` : Enregistrer les modifications localement avec un message décrivant le changement.
*   `git push` : Envoyer les modifications locales vers le serveur distant (GitHub).
*   `git pull` : Récupérer les dernières modifications du serveur (si modifiées ailleurs).
*   `git branch` : Gérer les branches (nous utilisons principalement la branche `main`).
*   `git merge` : Fusionner les branches (ex: ramener une fonctionnalité terminée dans la branche principale).

## 3. Structure du dépôt (Repository)

L'arborescence du projet sur GitHub reflète l'organisation locale :

*   📁 **/database** : Contient les scripts SQL pour créer (`schema.sql`) et peupler (`seed_*.sql`, `update_*.sql`) la base de données.
*   📁 **/public** : Racine du site accessible publiquement. Contient les fichiers statiques (CSS, JS, Images) et le point d'entrée (`index.php`).
*   📁 **/src** : Cœur de l'application (Backend PHP). Contient les Contrôleurs, Modèles, Entités, Repositories et Vues.
*   📄 **README.md** : Documentation générale du projet (installation, configuration).
*   📄 **CHANGELOG.md** : Historique chronologique des modifications majeures.
*   📄 **DOCUMENTATION_GIT.md** : Ce fichier actuel.

## 4. Captures d'écran

*(Note : Veuillez insérer ci-dessous les captures d'écran de votre environnement)*

> **Capture 1 : Terminal avec commandes Git**
>
> *[Insérez ici votre screenshot montrant `git status`, `git add`, `git commit`...]*

> **Capture 2 : Interface du dépôt GitHub**
>
> *[Insérez ici un screenshot de la page d'accueil du repo sur GitHub]*

> **Capture 3 : Historique des Commits**
>
> *[Insérez ici un screenshot de l'onglet "Commits" sur GitHub montrant la liste des sauvegardes]*

## 5. Commits et historique

Nous suivons la convention de nommage suivante pour les messages de commit :
*   Commit initial : *"Initial commit of SAMA project"*
*   Fonctionnalités : *"Feature: Added workshop repository"*
*   Correctifs : *"Fix: Encoding issue in descriptions"*

Cette rigueur permet de générer un historique lisible et utile pour la maintenance.

## 6. Lien du dépôt

Le projet est hébergé publiquement à l'adresse suivante :

*   **URL** : [https://github.com/agheadhamoud-png/Sama](https://github.com/agheadhamoud-png/Sama)
*   **Visibilité** : Public (Accessible en lecture pour tous, écriture réservée aux contributeurs)
