<?php
    include "./model/model_users.php";

    $styleLink = $scriptLink = $message = "";
    $seoData = [];

    $seoData = getSeoData("account/infos");
    $styleLink = '<link rel="stylesheet" href="/adrar/Epinature/view/style/createAccount.css">';
    $scriptLink = '<script src="/adrar/Epinature/view/script/formularyUpdate.js"></script>';

    // Vérifier si l'utilisateur est connecté, si non on le redirige vers la page de connexion
    if(!isset($_SESSION['id_user'])) {
        header("Location: /adrar/Epinature/connexion");
        exit();
    }

    $message = updateUserInfo($message);
    
    function updateUserInfo($message) {
        if (!empty($_POST)) {
            if(isset($_POST["submitUpdate"])) {
                if(isset($_POST["lastname"]) && isset($_POST["firstname"]) && isset($_POST["email"])
                && !empty($_POST["lastname"]) && !empty($_POST["firstname"]) && !empty($_POST["email"])) {
                    
                    if(filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)) {
                        $phone_number = sanitize($_POST["phone"]);
                        $firstname = sanitize($_POST["firstname"]);
                        $lastname = sanitize($_POST["lastname"]);
                        $email = sanitize($_POST["email"]);
                        $user_id = $_SESSION['id_user'];

                        // Si le mot de passe est fourni, on le met à jour aussi
                        if(!empty($_POST["passwordUpdate"]) && !empty($_POST["passwordUpdateConfirm"])) {
                            if(strcmp(sanitize($_POST["passwordUpdate"]), sanitize($_POST["passwordUpdateConfirm"])) == 0) {
                                $password = password_hash($_POST["passwordUpdate"], PASSWORD_BCRYPT);
                                $message = updateUser(connect(), $user_id, $phone_number, $email, $firstname, $lastname, $password);
                            } else {
                                $message = "<p>Les mots de passe ne correspondent pas.</p>";
                                return $message;
                            }
                        } else {
                            $message = updateUser(connect(), $user_id, $phone_number, $email, $firstname, $lastname);
                        }

                        // Mise à jour des données de session
                        $_SESSION["lastname"] = $lastname;
                        $_SESSION["firstname"] = $firstname;
                        $_SESSION["email"] = $email;
                        $_SESSION["phone"] = $phone_number;

                    } else {
                        $message = "<p>Veuillez saisir un email au bon format. Ex : ######@#####.##</p>";
                    }   
                } else {
                    $message = "<p>Veuillez remplir les champs obligatoires !</p>";
                }
            }
        }
        return $message;
    }
    
    include "./view/view_header.php";
    include "./controllers/controller_nav.php";
    include "./view/view_account_infos.php";
    include "./view/view_footer.php";
?> 