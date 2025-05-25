<?php

session_start();

// Inclure les fichiers nécessaires avec des chemins absolus
require_once "../../utils/utils.php";
require_once "../../model/model_orders.php";

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

//1) Vérifier les variables null ou les champs vides
if(!isset($data->basket) || !isset($data->locationId) || !isset($data->repetition) 
|| !isset($data->totalAmmount) || !isset($data->userId) || empty($data->basket)) {
    //Revoie un message d'erreur
    http_response_code(400);
    $response = ["message" => "Données manquantes.", "code" => 400];
    echo json_encode($response);
    return;
}

$req = addOrder(connect(), $data);

if($req == true){
    $_SESSION["basket"] = [];
    http_response_code(200);
    echo json_encode(['message' => 'Votre Commande as bien été rajoutée !', 'code' => 200]);
    return;
}else{
    //Envoyer une réponse d'erreur 500
    http_response_code(500);
    echo json_encode(["message" => "Erreur dans l'Ajout de la Commande", "code" => 500]);
    return;
}


