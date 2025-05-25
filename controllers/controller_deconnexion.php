<?php
    session_start();
    if (isset($_SESSION['id_user'])) {
        unset($_SESSION['id_user']);
    }

    //redirection sur page1
    header("Location: /adrar/Epinature/accueil");
    exit();
?>