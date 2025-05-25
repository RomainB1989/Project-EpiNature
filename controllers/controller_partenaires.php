<?php

    $styleLink = $scriptLink = "";
    $seoData = [];

    $seoData = getSeoData("partenaires");
    $styleLink = '<link rel="stylesheet" href="./view/style/partenaires.css">';
    // $scriptLink = '<script src=".view/script/accueil.js"></script>';

    include "./view/view_header.php";
    include "./controllers/controller_nav.php";
    include "./view/view_partenaires.php";
    include "./view/view_footer.php";
?>