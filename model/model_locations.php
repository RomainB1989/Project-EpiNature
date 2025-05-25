<?php
    function getAllLocations($conn) {
        try {
            $sql = "SELECT  l.id_location, l.name_location, l.adress_location, 
                            l.day_location, l.time_start_location, l.time_end_location, 
                            p.id_image, i.url_image, i.name_image
                    FROM location AS l
                    LEFT JOIN possess AS p ON l.id_location = p.id_location
                    LEFT JOIN image AS i ON p.id_image = i.id_image
                    ORDER BY l.id_location AND l.day_location";
            
            $stmt = $conn->prepare($sql);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch(PDOException $e) {
            return "Erreur de récupération des emplacements de collecte : " . $e->getMessage();
        }
    }

    function getLocationsById($conn, $id) {
        try {
            $sql = "SELECT  l.id_location, l.name_location, l.adress_location, 
                            l.day_location, l.time_start_location, l.time_end_location, 
                            p.id_image, i.url_image, i.name_image
                    FROM location AS l
                    LEFT JOIN possess AS p ON l.id_location = p.id_location
                    LEFT JOIN image AS i ON p.id_image = i.id_image
                    WHERE l.id_location = ?
                    LIMIT 1";
            
            $stmt = $conn->prepare($sql);
            $stmt->bindParam(1, $id, PDO::PARAM_INT);
            $stmt->execute();
            return $stmt->fetch(PDO::FETCH_ASSOC);
        } catch(PDOException $e) {
            return "Erreur de récupération de l'emplacement de collecte : " . $e->getMessage();
        }
    }
?> 