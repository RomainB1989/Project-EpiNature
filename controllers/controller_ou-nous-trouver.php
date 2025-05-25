<?php

    $styleLink = $scriptLink = "";
    $seoData = [];

    $seoData = getSeoData("ou-nous-trouver");
    $styleLink = '<link rel="stylesheet" href="./view/style/ou-nous-trouver.css">';
    // $scriptLink = '<script src=".view/script/accueil.js"></script>';

    include "./view/view_header.php";
    include "./controllers/controller_nav.php";
    include "./view/view_ou-nous-trouver.php";
    include "./view/view_footer.php";
?>