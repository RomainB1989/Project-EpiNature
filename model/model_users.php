<?php


    function insertUser($conn, $phone_number, $email, $firstname, $lastname, $password, $id_role){
        try {
            // echo "<p>Connexion réussie à la base de données !</p>";
            // Requête SQL pour sélectionner tous les utilisateurs
            //  1) méthode prepare()
            $req = $conn->prepare("INSERT INTO users (email, phone_number, firstname, lastname, `password`, id_role) VALUES (?,?,?,?,?,?)");
            //  2) compléter les ? avec un binding des paramètres
            $req->bindParam(1, $email, PDO::PARAM_STR);
            $req->bindParam(2, $phone_number, PDO::PARAM_STR);
            $req->bindParam(3, $firstname, PDO::PARAM_STR);
            $req->bindParam(4, $lastname, PDO::PARAM_STR);
            $req->bindParam(5, $password, PDO::PARAM_STR);
            $req->bindParam(6, $id_role, PDO::PARAM_INT);

            //  3) exécuter la requête avec execute()
            $req->execute();
            return "Ajout de l'utilisateur à la table users réussi !";
        } catch(PDOException $e) {
            return "Erreur de connexion à la base de données : " . $e->getMessage();
        }
    }

    function isUserExist($conn, $email){
        try {
            //echo "<p>Connexion réussie à la base de données Pour le check d'utilisateur !</p>";
            // Requête SQL pour sélectionner tous les utilisateurs
            $stmt = $conn->prepare("SELECT email FROM users WHERE ? = email LIMIT 1");
            $stmt->bindParam(1, $email, PDO::PARAM_STR);
            $stmt->execute();

            $data = $stmt->fetchAll();
            if(!empty($data)){
                return true;
            }
        } catch(PDOException $e) {
            echo "Erreur de connexion à la base de données : " . $e->getMessage();
        }
        return false;
    }

    function showUsers($conn){
        try {
            //echo "<p>Connexion réussie à la base de données Pour le check d'utilisateur !</p>";
            // Requête SQL pour sélectionner tous les utilisateurs
            $stmt = $conn->prepare("SELECT email, phone_number, firstname, lastname, id_role FROM users");
            $stmt->execute();

            $data = $stmt->fetchAll();
            return $data;
        } catch(PDOException $e) {
            return "Erreur de connexion à la base de données : ". $e->getMessage();
        }
    }

    function getUserByEmail($conn, $email){
        try {
            //echo "<p>Connexion réussie à la base de données Pour le check d'utilisateur !</p>";
            // Requête SQL pour sélectionner tous les utilisateurs
            $stmt = $conn->prepare("SELECT user_id, email, phone_number, firstname, lastname, `password`, id_role FROM users WHERE ? = email LIMIT 1");
            $stmt->bindParam(1, $email, PDO::PARAM_STR);
            $stmt->execute();

            $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $data;
        } catch(PDOException $e) {
            echo "Erreur de connexion à la base de données : " . $e->getMessage();
        }
    }

    function updateUser($conn, $user_id, $phone_number, $email, $firstname, $lastname, $password = null) {
        try {
            if ($password) {
                $sql = "UPDATE users SET email = ?, phone_number = ?, firstname = ?, lastname = ?, password = ? WHERE user_id = ?";
                $req = $conn->prepare($sql);
                $req->bindParam(1, $email, PDO::PARAM_STR);
                $req->bindParam(2, $phone_number, PDO::PARAM_STR);
                $req->bindParam(3, $firstname, PDO::PARAM_STR);
                $req->bindParam(4, $lastname, PDO::PARAM_STR);
                $req->bindParam(5, $password, PDO::PARAM_STR);
                $req->bindParam(6, $user_id, PDO::PARAM_INT);
            } else {
                $sql = "UPDATE users SET email = ?, phone_number = ?, firstname = ?, lastname = ? WHERE user_id = ?";
                $req = $conn->prepare($sql);
                $req->bindParam(1, $email, PDO::PARAM_STR);
                $req->bindParam(2, $phone_number, PDO::PARAM_STR);
                $req->bindParam(3, $firstname, PDO::PARAM_STR);
                $req->bindParam(4, $lastname, PDO::PARAM_STR);
                $req->bindParam(5, $user_id, PDO::PARAM_INT);
            }
            $req->execute();
            return "Mise à jour des informations réussie !";
        } catch(PDOException $e) {
            return "Erreur lors de la mise à jour : " . $e->getMessage();
        }
    }
?>