<?php

$styleLink = $scriptLink = "";
$seoData = [];

$seoData = getSeoData("account");
$styleLink = '<link rel="stylesheet" href="./view/style/account.css">';

if(isset($_SESSION['id_user'])){
    $user['prenom'] = $_SESSION['firstname'];
    $user['nom'] = $_SESSION['lastname'];
}

include "./view/view_header.php";
include "./controllers/controller_nav.php";
include "./view/view_account.php";
include "./view/view_footer.php";

?>