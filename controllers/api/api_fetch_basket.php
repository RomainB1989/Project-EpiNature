<?php
session_start();
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

// Assurer que $_SESSION["basket"] existe pour éviter les erreurs si le panier est vide.
if (!isset($_SESSION["basket"])) {
    $_SESSION["basket"] = [];
}

//Transformation des noms des produits en UTF8
foreach ($_SESSION["basket"] as &$item) {
    $item['name_product'] = html_entity_decode($item['name_product'], ENT_QUOTES | ENT_HTML5, 'UTF-8');
}
//unset($item); // bonne pratique avec les références

echo json_encode([
    'success' => true,
    'message' => 'Récupération du Panier Réussi',
    'code' => 200,
    'basket' => $_SESSION["basket"]
], JSON_UNESCAPED_UNICODE);
exit();
?>