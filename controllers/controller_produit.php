<?php
    include "./model/model_products.php";
    //unset($_SESSION["basket"]); //Sert a nettoyer rapidement le panier dans $_SESSION pour les tests.
    $styleLink = $scriptLink = "";
    $seoData = [];

    $seoData = getSeoData("produit");
    $styleLink = '<link rel="stylesheet" href="./view/style/produit.css">';
    $scriptLink = '<script type="module" src="./view/script/produit.js"></script>';

    // Récupération de l'ID du produit depuis l'URL et des informations du produit si l'id existe dans la Superglobale $_GET
    if (isset($_GET['id'])){
        $product_id = intval($_GET['id']);
        $product = getProductById(connect(), $product_id);
    }
    

    // Redirection si le produit n'existe pas
    if (!$product) {
        header("Location: /adrar/Epinature/boutique");
        exit();
    }
    
    include "./view/view_header.php";
    include "./controllers/controller_nav.php";
    include "./view/view_produit.php";
    include "./view/view_footer.php";
?> 