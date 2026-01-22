<?php
// =========================================================================
// Point d'entrée principal de l'application (Front Controller)
// =========================================================================
// C'est ici que toutes les requêtes arrivent en premier grâce au fichier .htaccess.
// Je joue le rôle de chef d'orchestre : je prépare l'environnement et je lance le traitement.

// 1. J'initialise la session PHP.
// Cela me permet de garder en mémoire le fait que l'administrateur est connecté,
// même quand il navigue d'une page à l'autre.
session_start();

// 2. Autoloader (Chargement automatique des classes).
// Pour éviter de devoir faire des "require" sur chaque fichier dont j'ai besoin (Model, Controller...),
// j'utilise cette fonction magique. Dès que j'essaie d'utiliser une classe (ex: App\Controller\HomeController),
// PHP va chercher automatiquement le fichier correspondant.
spl_autoload_register(function ($class) {
    // Mon "espace de noms" de base est "App\".
    $prefix = 'App\\';
    // Mes classes sont stockées dans le dossier "src/".
    $base_dir = __DIR__ . '/../src/';

    $len = strlen($prefix);
    if (strncmp($prefix, $class, $len) !== 0) {
        return; // Ce n'est pas une classe de mon projet, je laisse faire.
    }

    // Je transforme le nom de la classe en chemin de fichier.
    // Ex: App\Core\Router devient src/Core/Router.php
    $relative_class = substr($class, $len);
    $file = $base_dir . str_replace('\\', '/', $relative_class) . '.php';

    // Si le fichier existe, je le charge.
    if (file_exists($file)) {
        require $file;
    }
});

use App\Core\Router;

// 3. Initialisation du Routeur.
// Le routeur est comme un aiguilleur : il regarde l'URL et décide quel code exécuter.
$router = new Router();

// 4. Définition des Routes.
// Je charge mon fichier de routes qui contient la liste de toutes les pages disponibles.
require_once __DIR__ . '/../src/routes.php';

// 5. Dispatch (Envoi de la requête).
// Je récupère l'URL demandée par le visiteur (via le paramètre 'url' configuré dans .htaccess).
$url = isset($_GET['url']) ? $_GET['url'] : '';

// Je dis au routeur : "Fais ton travail, trouve où envoyer cette requête !"
$router->dispatch($url);
