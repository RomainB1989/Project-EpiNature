<?php

    $styleLink = $scriptLink = "";
    $seoData = [];

    $seoData = getSeoData("contact");
    $styleLink = '<link rel="stylesheet" href="./view/style/contact.css">';
    // $scriptLink = '<script src=".view/script/accueil.js"></script>';
    $scriptLink = '<script src="./view/script/formularyContact.js"></script>';

    include "./view/view_header.php";
    include "./controllers/controller_nav.php";
    include "./view/view_contact.php";
    include "./view/view_footer.php";
?>