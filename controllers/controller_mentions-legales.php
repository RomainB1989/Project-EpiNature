<?php

    $styleLink = $scriptLink = "";
    $seoData = [];

    $seoData = getSeoData("mentions-legales");
    $styleLink = '<link rel="stylesheet" href="./view/style/mentions-legales.css">';
    // $scriptLink = '<script src=".view/script/accueil.js"></script>';

    include "./view/view_header.php";
    include "./controllers/controller_nav.php";
    include "./view/view_mentions-legales.php";
    include "./view/view_footer.php";
?>