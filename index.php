<?php
session_start();

require_once __DIR__ . '/utils/utils.php';
require_once __DIR__ . '/utils/seo.php';

// Je recupère l'URI ce cette page.
$request_uri = $_SERVER['REQUEST_URI'];
// Je récupère l'arboresence du serveur jusqu'a la racine de mon projet.
$base_path = dirname($_SERVER['SCRIPT_NAME']);
// J'enleve tous le $_SERVER['SCRIPT_NAME'] en le remplaçant par rien.
$route = str_replace($base_path, '', $request_uri);
// je nettoie les variables dans l'url de $_GET
$route = strtok($route, '?');
// je nettois les slash en debut et fin de chaine de caractères.
$route = trim($route, '/');


// Route par défault.
if (empty($route)) {
    $route = 'accueil';
}

// Définition de toutes routes par leur nom ayant pour valeur le fichier controlleur
$routes = [
    'accueil' => 'controllers/controller_accueil.php',
    'account' => 'controllers/controller_account.php',
    'account/infos' => 'controllers/controller_account_infos.php',
    'account/orders' => 'controllers/controller_account_history.php',
    'connexion' => 'controllers/controller_connexion.php',
    'deconnexion' => 'controllers/controller_deconnexion.php',
    'contact' => 'controllers/controller_contact.php',
    'cguv' => 'controllers/controller_cguv.php',
    'mentions-legales' => 'controllers/controller_mentions-legales.php',
    'ou-nous-trouver' => 'controllers/controller_ou-nous-trouver.php',
    'partenaires' => 'controllers/controller_partenaires.php',
    'presentation' => 'controllers/controller_presentation.php',
    'creation' => 'controllers/controller_creation.php',
    'boutique' => 'controllers/controller_boutique.php',
    'produit' => 'controllers/controller_produit.php',
    'commande' => 'controllers/controller_commande.php'
];

// Vérification Si la page existe dans mon tableau. Sinon redirection vers Page 404.
if (array_key_exists($route, $routes)) {
    // Récupération de l'arborescence du fichier controlleur associé.
    $controller_file = $routes[$route];
    if (file_exists($controller_file)) {
        //Check si fichier à deja était inclus, sinon inclus de toute façon.
        require_once $controller_file;
    } else {
        // Controller file not found
        header("HTTP/1.0 404 Not Found");
        include 'view/404.php';
    }
} else {
    // Route not found
    header("HTTP/1.0 404 Not Found");
    include 'view/404.php';
}
?> 