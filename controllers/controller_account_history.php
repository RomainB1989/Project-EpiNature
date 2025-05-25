<?php
    include "./model/model_orders.php";

    $styleLink = $scriptLink = $history = "";
    $seoData = [];

    $seoData = getSeoData("historique-commande");
    $styleLink = '<link rel="stylesheet" href="/adrar/Epinature/view/style/accountHistory.css">';
    $scriptLink = '<script src="/adrar/Epinature/view/script/accountHistory.js"></script>';

    // Vérifier si l'utilisateur est connecté, si non on le redirige vers la page de connexion
    if(!isset($_SESSION['id_user'])) {
        header("Location: /adrar/Epinature/connexion");
        exit();
    }

    $ordersHistory = getAllOrdersById(connect(),$_SESSION["id_user"]);

    include "./view/view_header.php";
    include "./controllers/controller_nav.php";
    include "./view/view_account_history.php";
    include "./view/view_footer.php";
?> 