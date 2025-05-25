<?php
    function getAllProducts($conn) {
        try {
            $sql = "SELECT p.product_id, p.name_product, p.resume, p.description, 
                           p.ingredients, p.price, p.is_available, 
                           p.id_category, i.url_image, i.name_image
                    FROM products AS p
                    LEFT JOIN `show` AS s ON p.product_id = s.product_id
                    LEFT JOIN image AS i ON s.id_image = i.id_image
                    WHERE p.is_available = 1
                    ORDER BY p.id_category AND p.name_product";
            
            $stmt = $conn->prepare($sql);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch(PDOException $e) {
            return "Erreur de récupération des produits : " . $e->getMessage();
        }
    }

    function getProductById($conn, $id) {
        try {
            $sql = "SELECT p.product_id, p.name_product, p.resume, p.description, 
                           p.ingredients, p.price, p.is_available,
                           p.id_category, i.url_image, i.name_image,
                           c.name_category
                    FROM products p
                    LEFT JOIN `show` AS s ON p.product_id = s.product_id
                    LEFT JOIN image AS i ON s.id_image = i.id_image
                    LEFT JOIN category AS c ON p.id_category = c.id_category
                    WHERE p.product_id = ? AND p.is_available = 1
                    LIMIT 1";
            
            $stmt = $conn->prepare($sql);
            $stmt->bindParam(1, $id, PDO::PARAM_INT);
            $stmt->execute();
            return $stmt->fetch(PDO::FETCH_ASSOC);
        } catch(PDOException $e) {
            return "Erreur de récupération du produit : " . $e->getMessage();
        }
    }
?> 