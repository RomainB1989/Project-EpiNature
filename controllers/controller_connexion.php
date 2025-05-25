<?php
    //session_start();

    include "./model/model_users.php";


    $styleLink = $scriptLink = $message = "";
    $seoData = [];

    $seoData = getSeoData("connexion");
    $styleLink = '<link rel="stylesheet" href="./view/style/connectAccount.css">';
    $scriptLink = '<script src="./view/script/formularyConnect.js"></script>';
    $message = connectUser($message);


    function connectUser($message){
        if (!empty($_POST)){
            //verifie si submit du formulaire de creation de compte Utilisateur existe
            if(isset($_POST["submitConnection"])){
                //echo "<p>Le formulaire a été envoyé</p>";
                //verifie si champs du formulaire de creation de compte ne sont pas vide
                if(isset($_POST["email"]) && isset($_POST["password"])
                && !empty($_POST["email"]) && !empty($_POST["password"])){
                    //echo "<p>Visiblement vous voulez connecter un Utilisateur.</p>";
                    // Verifier Format.
                    if(filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)){
                        //echo "<p>Votre email a le bon format.</p>";
                        // Clean les Données.
                        $email = sanitize($_POST["email"]);
                        $password = sanitize($_POST["password"]);
                        $user = getUserByEmail(connect(),$email);
                        //print_r($user);

                        if(!empty($user)){
                            if(password_verify($password, $user[0]["password"])){
                                $_SESSION["id_user"] = $user[0]["user_id"];
                                $_SESSION["id_role"] = $user[0]["id_role"];
                                $_SESSION["lastname"] = $user[0]["lastname"];
                                $_SESSION["firstname"] = $user[0]["firstname"];
                                $_SESSION["email"] = $user[0]["email"];
                                $_SESSION["phone"] = $user[0]["phone_number"];
                                //echo "<p>".$_SESSION["lastname"]."</p>";
                                //header("Location: /adrar/Epinature/account");
                                header("Location: /adrar/Epinature/accueil");
                                $message = "<p>Vous êtes connecté</p>";
                            } else{
                                $message = "Login et/ou Mot de Passe incorrect(s)";
                            }
                        } else{
                            $message =  "Login et/ou Mot de Passe incorrect(s)";
                        }
                    } else{
                        $message = "<p>Veuillez saisir un email au bon format. Ex : ######@#####.##</p>";
                    }   
                }else {
                    $message = "<p>Veuillez remplir les champs obligatoires !</p>";
                }
            }
        }
        return $message;
    }


    include "./view/view_header.php";
    include "./controllers/controller_nav.php";
    include "./view/view_connexion.php";
    include "./view/view_footer.php";
?> 