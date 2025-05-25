<?php
session_start();

// CORS et format JSON
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: GET");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type,Access-Control-Allow-Headers, Authorization, X-Requested-With");

// Vérification de la méthode HTTP
if ($_SERVER["REQUEST_METHOD"] !== "GET") {
    http_response_code(405);
    echo json_encode([
        "message" => "Méthode non autorisée. GET requis.",
        "code" => 405
    ]);
    exit();
}

// Vérification de la session utilisateur
if (isset($_SESSION["id_user"]) && !empty($_SESSION["id_user"])) {
    http_response_code(200);
    echo json_encode([
        "loggedIn" => true,
        "userId" => $_SESSION['id_user']
    ]);
} else {
    http_response_code(200);
    echo json_encode([
        "loggedIn" => false
    ]);
}