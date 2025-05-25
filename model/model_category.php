<?php
    function getAllCategories($conn) {
        try {
            $sql = "SELECT id_category, name_category
                    FROM category";
            
            $stmt = $conn->prepare($sql);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch(PDOException $e) {
            return "Erreur de récupération des catégories : " . $e->getMessage();
        }
    }

?>