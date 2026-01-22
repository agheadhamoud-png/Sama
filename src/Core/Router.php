<?php

namespace App\Core;

// =========================================================================
// Le Routeur : L'Aiguilleur du Site
// =========================================================================
// Ma mission est simple : recevoir une URL (ex: /workshops/12) et trouver
// quel Contrôleur doit s'en occuper (ex: WorkshopController::detail(12)).

class Router {
    // Je garde une liste de toutes les routes que le développeur a définies.
    protected $routes = [];

    // Cette fonction permet d'enregistrer une nouvelle route.
    // $method : GET (lecture) ou POST (envoi de formulaire).
    // $route : L'adresse URL (ex: 'api/news/{id}').
    // $controller : Le nom de la classe qui va gérer ça (ex: 'NewsController').
    // $action : Le nom de la fonction dans cette classe (ex: 'apiDetail').
    public function add($method, $route, $controller, $action) {
        $this->routes[] = [
            'method' => $method,
            'route' => $route,
            'controller' => $controller,
            'action' => $action
        ];
    }

    // C'est le coeur du réacteur !
    // J'analyse l'URL reçue pour trouver une correspondance.
    public function dispatch($url) {
        $method = $_SERVER['REQUEST_METHOD'];
        
        // Petit nettoyage de l'URL : j'enlève les éventuels paramètres ?foo=bar et les slashs inutiles.
        if(strpos($url, '?') !== false){
            $url = substr($url, 0, strpos($url, '?'));
        }
        $url = trim($url, '/');

        // Je parcours toutes mes routes une par une.
        foreach ($this->routes as $route) {
            // Je transforme la route définie (ex: 'news/{id}') en une expression régulière complexe.
            // Cela me permet de dire "ici, j'attends n'importe quel texte ou nombre, et je l'appelle 'id'".
            $pattern = preg_replace('/\{([a-z]+)\}/', '(?P<\1>[a-zA-Z0-9-_]+)', $route['route']);
            $pattern = str_replace('/', '\/', $pattern);
            $pattern = '/^' . $pattern . '$/';

            // Si la méthode HTTP est bonne (GET/POST) ET que l'URL correspond à mon pattern...
            if ($route['method'] == $method && preg_match($pattern, $url, $matches)) {
                // Bingo ! J'ai trouvé.
                
                // Je prépare le nom complet du contrôleur avec son namespace.
                $controllerName = "App\\Controllers\\" . $route['controller'];
                $actionName = $route['action'];

                // Je nettoie les résultats pour ne garder que les paramètres nommés (comme 'id').
                $params = array_filter($matches, 'is_string', ARRAY_FILTER_USE_KEY);

                // Je vérifie que la classe et la fonction existent bien pour éviter de planter.
                if (class_exists($controllerName)) {
                    $controller = new $controllerName();
                    
                    if (method_exists($controller, $actionName)) {
                        // J'appelle la fonction du contrôleur en lui passant les paramètres trouvés.
                        // Ex: $controller->apiDetail('12');
                        call_user_func_array([$controller, $actionName], $params);
                        return; // Mon travail est fini, je m'arrête.
                    }
                }
            }
        }

        // Si j'arrive ici, c'est que je n'ai trouvé aucune route correspondante.
        // J'affiche donc une erreur 404.
        http_response_code(404);
        echo "404 Not Found - Je ne trouve pas de route pour cette URL.";
    }
}
