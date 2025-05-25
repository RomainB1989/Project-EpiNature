<?php

session_start();


// Inclure les fichiers nécessaires avec des chemins absolus
include "../../utils/utils.php";
include "../../model/model_products.php";

// Accès depuis n'importe quel site ou appareil (*)
header("Access-Control-Allow-Origin: *"); //autres valeurs domain, none

// Format des données envoyées
header("Content-Type: application/json; charset=UTF-8");

// Méthode autorisée, ici POST, mais ça peut être GET, PUT ou DELETE
header("Access-Control-Allow-Methods: POST");

// Durée de vie de la requête
header("Access-Control-Max-Age: 3600");

// Entêtes autorisées
header("Access-Control-Allow-Headers: Content-Type,Access-Control-Allow-Headers, Authorization, X-Requested-With");

//CONTROLE DE LA METHODE HTTP
if($_SERVER['REQUEST_METHOD'] != 'POST'){
    //code réponse HTTP
    http_response_code(405);

    //Envoie du message d'erreur
    echo json_encode(["message" => "Methode non autorisée. POST requis.", "code" => 405]);

    //arrêt du script
    return;
}

//Réception des données
$json = file_get_contents('php://input');

//Déchiffre le json en objet exploitable
$data = json_decode($json);

//ATTENTION : $data est un objet => il faut accéder aux données grâce à la structure objet. Exemple : $data->id_produit

//1) Vérifier les champs vides
if(empty($data->id_product) || empty($data->name_product) || empty($data->quantity) || empty($data->price)) {
    //Revoie un message d'erreur
    http_response_code(400);
    $response = ["message" => "Données manquantes.", "code" => 400];
    echo json_encode($response);
    return;
}

//2) Nettoyage des données
$productName = sanitize($data->name_product);

//3)Création d'un tableau avec les données reçues.
$newProduct = [
    "id_product" => $data->id_product,
    "name_product" => $productName,
    "quantity" => $data->quantity,
    "price" => $data->price
];

// Vérifiez si le panier existe, sinon initialisez-le
if (!isset($_SESSION["basket"])) {
    $_SESSION["basket"] = []; // Initialiser le tableau de panier
}

// Vérifier si le produit est déjà dans le panier
$productExists = false;
foreach ($_SESSION["basket"] as $index => $product) {
    if ($product["id_product"] == $newProduct["id_product"]) {
        // Si le produit existe, modifier la quantité avec la nouvelle valeur.
        $_SESSION["basket"][$index] = $newProduct;
        $productExists = true;
        echo json_encode([
            'success' => "update",
            'message' => 'Quantité du produit modifiée',
            'code' => 200,
            'basket' => $_SESSION["basket"]
        ]);
        return; // Sortir de la boucle une fois le produit trouvé
    }
}

// Si le produit n'existe pas, l'ajouter au panier
if (!$productExists) {
    $_SESSION["basket"][] = $newProduct; // Pousser le produit dans le tableau
    echo json_encode([
        'success' => "add",
        'message' => 'Produit ajouté avec succès au panier',
        'code' => 200,
        'basket' => $_SESSION["basket"]
    ]);
    exit(); // Assurez-vous de sortir après avoir envoyé la réponse
}

// Si vous avez besoin de rediriger, faites-le dans le code client après avoir reçu la réponse


