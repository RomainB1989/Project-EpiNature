<?php
// Inclusion du modèle des locations
require_once("../../model/model_locations.php");
require_once("../../utils/utils.php");

header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: GET");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type,Access-Control-Allow-Headers, Authorization, X-Requested-With");


if ($_SERVER["REQUEST_METHOD"] !== "GET") {
    http_response_code(405);
    echo json_encode([
        "message" => "Méthode non autorisée. GET requis.",
        "code" => 405
    ]);
    exit();
}

// Récupération des lieux de collecte
$locations = getAllLocations(connect());

if (is_string($locations)) {
    // Erreur retournée par la fonction
    http_response_code(500);
    echo json_encode([
        "success" => false,
        "message" => $locations,
        "code" => 500,
        "locations" => null
    ], JSON_UNESCAPED_UNICODE);
    exit();
}

echo json_encode([
    'success' => true,
    'message' => 'Récupération des lieux de collecte réussie',
    'code' => 200,
    'locations' => $locations
], JSON_UNESCAPED_UNICODE);
exit();
?>