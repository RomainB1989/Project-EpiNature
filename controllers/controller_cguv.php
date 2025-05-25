<?php

    $styleLink = $scriptLink = "";
    $seoData = [];

    $seoData = getSeoData("cguv");
    $styleLink = '<link rel="stylesheet" href="./view/style/cguv.css">';
    // $scriptLink = '<script src=".view/script/accueil.js"></script>';

    include "./view/view_header.php";
    include "./controllers/controller_nav.php";
    include "./view/view_cguv.php";
    include "./view/view_footer.php";
?>