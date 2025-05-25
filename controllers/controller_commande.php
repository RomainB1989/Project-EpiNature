<?php
$seoData = [];

$seoData = getSeoData("validation-commande");
$styleLink = '<link rel="stylesheet" href="./view/style/commande.css">';
$scriptLink = '<script type="module" src="./view/script/commande.js"></script>';

// Sécurité : vérification utilisateur connecté et panier non vide
//var_dump($_SESSION);
if (!isset($_SESSION)){
    header('Location: /adrar/Epinature/connexion');
    exit;
}
if (!isset($_SESSION['id_user']) || empty($_SESSION['id_user'])) {
    header('Location: /adrar/Epinature/connexion');
    exit;
}
if (!isset($_SESSION['basket']) || empty($_SESSION['basket'])) {
    header("Location: /adrar/Epinature/boutique");
    exit();
}

// Récupération des données nécessaires (si besoin pour l’étape 1 ou pour affichage initial)
//$basket = $_SESSION['basket'];
//$locations = getAllLocations(connect()); // fonction à créer dans model_pickup.php

include "./view/view_header.php";
include "./controllers/controller_nav.php";
include "./view/view_commande.php";
include "./view/view_footer.php";
?>