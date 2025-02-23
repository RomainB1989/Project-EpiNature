<?php
function getProductId() {
    // Vérifier si l'ID est présent dans l'URL
    if (!isset($_GET['id'])) {
        throw new Exception("Aucun ID de produit n'a été spécifié.");
    }
    $id = $_GET['id'];
    // Vérifier si l'ID est numérique
    if (!is_numeric($id)) {
        throw new Exception("L'ID du produit doit être un nombre.");
    }

    // Convertir en entier et vérifier la plage
    $id = intval($id);
    if ($id <= 0) {
        throw new Exception("L'ID du produit doit être un nombre positif.");
    }

    // Vous pouvez ajouter une limite supérieure si nécessaire
    // Par exemple, si vous savez que vos IDs ne dépasseront jamais 1 million :
    if ($id > 1000000) {
        throw new Exception("L'ID du produit est invalide.");
    }

    return $id;
}
function getProducts($product){
    $servername = "localhost";
    $username = "root"; // Nom d'utilisateur par défaut de XAMPP
    $password = ""; // Mot de passe par défaut de XAMPP (vide)
    $dbname = "epinature";


    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password, array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
    try {
        //echo "<p>Connexion réussie à la base de données Pour le check d'utilisateur !</p>";
        // Requête SQL pour sélectionner tous les utilisateurs
        $stmt = $conn->prepare("SELECT product_id, name_product, `resume`, `description`, ingredients, price FROM products");
        $stmt->execute();

        $data = $stmt->fetchAll();
        if(!empty($data))
            foreach ($data as $row){
                // Ajout de chaque ligne (produit) dans le tableau $products
                $products[] = [
                    "product_id" => $row["product_id"],
                    "name_product" => $row["name_product"],
                    "resume" => $row["resume"],
                    "description" => $row["description"],
                    "ingredients" => $row["ingredients"],
                    "price" => $row["price"]
                ];
            }
    } catch(PDOException $e) {
        echo "Erreur de connexion à la base de données : " . $e->getMessage();
    }
    return $products;
}


function getProductInfo($id_product){
    $servername = "localhost";
    $username = "root"; // Nom d'utilisateur par défaut de XAMPP
    $password = ""; // Mot de passe par défaut de XAMPP (vide)
    $dbname = "epinature";
    echo "<p>Id_Produit récupéré : ".$id_product."</p>";

    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password, array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
    try {
        //echo "<p>Connexion réussie à la base de données Pour le check d'utilisateur !</p>";
        // Requête SQL pour sélectionner tous les utilisateurs
        $stmt = $conn->prepare("SELECT product_id, name_product, `resume`, `description`, ingredients, price FROM products WHERE product_id = ?");
        $stmt->bindParam(1, $id_product, PDO::PARAM_INT);
        $stmt->execute();

        $data = $stmt->fetchAll();
        print_r($data);
        if(!empty($data)){
            // Ajout de chaque ligne (produit) dans le tableau $products
            $product = [
                "product_id" => $data[0]["product_id"],
                "name_product" => $data[0]["name_product"],
                "resume" => $data[0]["resume"],
                "description" => $data[0]["description"],
                "ingredients" => $data[0]["ingredients"],
                "price" => $data[0]["price"]
            ];
            echo "<p>Titre : ".$product["name_product"]."</p>";
        }
    } catch(PDOException $e) {
        echo "Erreur de connexion à la base de données : " . $e->getMessage();
    }
    return $product;
}
?>