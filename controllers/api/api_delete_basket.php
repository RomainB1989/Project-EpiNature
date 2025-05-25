<?php

session_start();

// Inclure les fichiers nécessaires avec des chemins absolus
include "../../utils/utils.php";
include "../../model/model_products.php";

// Accès depuis n'importe quel site ou appareil (*)
header("Access-Control-Allow-Origin: *"); //autres valeurs domain, none

// Format des données envoyées
header("Content-Type: application/json; charset=UTF-8");

// Méthode autorisée, ici DELETE, mais ça peut être GET, PUT ou POST
header("Access-Control-Allow-Methods: DELETE");

// Durée de vie de la requête
header("Access-Control-Max-Age: 3600");

// Entêtes autorisées
header("Access-Control-Allow-Headers: Content-Type,Access-Control-Allow-Headers, Authorization, X-Requested-With");

if($_SERVER['REQUEST_METHOD'] != 'DELETE'){
    //code réponse HTTP
    http_response_code(405);

    //Envoie du message d'erreur
    echo json_encode(["message" => "Methode non autorisée. DELETE requis.", "code" => 405]);

    //arrêt du script
    return;
}

//Réception des données
$json = file_get_contents('php://input');

//Déchiffre le json en objet exploitable
$data = json_decode($json);

//ATTENTION : $data est un objet => il faut accéder aux données grâce à la structure objet. Exemple : $data->id_produit

//Vérifier le champ vide
if(empty($data->id_product)) {
    //Revoie un message d'erreur
    http_response_code(400);
    $response = ["message" => "Données manquantes.", "code" => 400];
    echo json_encode($response);
    return;
}

// Vérifiez si le panier existe, sinon initialisez-le
if (!isset($_SESSION["basket"])) {
    $_SESSION["basket"] = []; // Initialiser le tableau de panier
}

// Vérifier si le produit est déjà dans le panier
foreach ($_SESSION["basket"] as $index => $product) {
    if ($product["id_product"] == $data->id_product) {
        unset($_SESSION["basket"][$index]);
        $_SESSION["basket"] = array_values($_SESSION["basket"]); // réindexation du tableau avec les bon indexs
        echo json_encode([
            'success' => "delete",
            'message' => 'Produit Supprimé du Panier',
            'delete-id' => $data->id_product,
            'code' => 200,
            'basket' => $_SESSION["basket"]
        ]);
        return;
    }
}

// Le produit n'existe pas, Envoie message erreur 404
http_response_code(404);
$response = ['message' => 'Produit non trouvé dans le panier','code' => 404];
echo json_encode($response);
exit();