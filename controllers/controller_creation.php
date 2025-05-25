<?php

    include "./model/model_users.php";


    $styleLink = $scriptLink = $message = "";
    $seoData = [];

    $seoData = getSeoData("creation");
    $styleLink = '<link rel="stylesheet" href="./view/style/createAccount.css">';
    $scriptLink = '<script src="./view/script/formularyCreate.js"></script>';

    $message = subscribeUser($message);;
    
    function subscribeUser($message){
        if (!empty($_POST))
        {
            //verifie si submit du formulaire de creation de compte Utilisateur existe
            if(isset($_POST["submitCreation"])){
                //echo "<p>Le formulaire a été envoyé</p>";
                //verifie si champs du formulaire de creation de compte ne sont pas vide
                if(isset($_POST["lastname"]) && isset($_POST["firstname"]) && isset($_POST["email"]) && isset($_POST["passwordCreate"]) && isset($_POST["passwordCreateConfirm"])
                && !empty($_POST["lastname"]) && !empty($_POST["firstname"]) && !empty($_POST["email"]) && !empty($_POST["passwordCreate"]) && !empty($_POST["passwordCreateConfirm"])){
                    //echo "<p>Visiblement vous voulez rajouter un Utilisateur.</p>";
                    // Verifier Format.
                    if(filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)){
                        //echo "<p>Votre email a le bon format.</p>";
                        // Clean les Données.
                        // Password chiffrer
                        $phone_number = "";
                        $phone_number = sanitize($_POST["phone"]);
                        $firstname = sanitize($_POST["firstname"]);
                        $lastname = sanitize($_POST["lastname"]);
                        $email = sanitize($_POST["email"]);
                        // Check si les deux champs password ont la meme valeur.
                        if(strcmp(sanitize($_POST["passwordCreate"]), sanitize($_POST["passwordCreateConfirm"])) == 0){
                            // Check si l'utilisateur n'existe pas deja.
                            if(!isUserExist(connect(),$email)){

                                //Appel de la fonction qui ajoute un Utilisateur.
                                //echo "<p>Votre compte à été rajouté :<br>Nom : ".$firstname."<br>Prénom : ".$lastname."<br>Email : ".$email."<br>Numéro de téléphone : ".$phone_number."</p>";
                                $message = insertUser(connect(), $phone_number, $email, $firstname,$lastname, password_hash($_POST["passwordCreate"], PASSWORD_BCRYPT), 1);
                                header("Location:/adrar/Epinature/connexion");
                            } else {
                                $message = "<p>Un compte associé à cette adresse mail existe deja.";
                            }
                        } else {
                            $message = "<p>Veuillez vérifier que vos deux champs mot de passe ont le meme password.";
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
    include "./view/view_creation.php";
    include "./view/view_footer.php";
?> 