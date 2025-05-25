<?php

    $styleLink = $scriptLink = "";
    $seoData = [];

    $seoData = getSeoData("accueil");
    $styleLink = '<link rel="stylesheet" href="./view/style/accueil.css">';
    // $scriptLink = '<script src=".view/script/accueil.js"></script>';
   
    include "./view/view_header.php";
    include "./controllers/controller_nav.php";
    include "./view/view_accueil.php";
    include "./view/view_footer.php";
?>