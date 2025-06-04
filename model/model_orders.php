<?php

function addOrder($bdd, $orderData){
    $dateOrder = date('Y-m-d H:i:s'); // Date et heure actuelles au format DATETIME MySQL
    $order_state = "en cours";
    $totalAmmount = filter_var($orderData->totalAmmount, FILTER_VALIDATE_FLOAT);
    $repetition = filter_var($orderData->repetition, FILTER_VALIDATE_INT);
    $locationId = filter_var($orderData->locationId, FILTER_VALIDATE_INT);
    $userId = filter_var($orderData->userId, FILTER_VALIDATE_INT);
    
    try{
        // 1. Ajout de la Commande
        $req = $bdd->prepare('INSERT INTO orders (order_date, total_ammount, order_nb_weeks, order_state, id_location, user_id) VALUES (?,?,?,?,?,?)');
        $req->bindParam(1,$dateOrder,PDO::PARAM_STR);
        $req->bindParam(2,$totalAmmount,PDO::PARAM_STR);
        $req->bindParam(3,$repetition,PDO::PARAM_INT);
        $req->bindParam(4,$order_state,PDO::PARAM_STR);
        $req->bindParam(5,$locationId,PDO::PARAM_INT);
        $req->bindParam(6,$userId,PDO::PARAM_INT);
        $req->execute();

        // 2. Récupération de l'order_id généré
        $order_id = $bdd->lastInsertId();
        
        
        //error_log("order_id after insert: $order_id");

        // 3. Ajout des produits dans la table d'association "contain"
        $reqContain = $bdd->prepare('INSERT INTO contain (product_id, order_id, order_quantity) VALUES (?, ?, ?)');
        foreach ($orderData->basket as $item) {
            $product_id = (int)sanitize($item->id_product);
            $quantity = (int)sanitize($item->quantity);
            $reqContain->bindValue(1, $product_id, PDO::PARAM_INT);
            $reqContain->bindValue(2, $order_id, PDO::PARAM_INT);
            $reqContain->bindValue(3, $quantity, PDO::PARAM_INT);
            $reqContain->execute();
        }
        return true;
    }catch(EXCEPTION $error){
        http_response_code(500);
        echo json_encode([
            "message" => "Erreur dans l'Ajout de la Commande",
            "error" => $error->getMessage(),
            "code" => 500
        ]);
        return false;
    }
}

function getAllOrdersById($bdd, $user_id) {
    try {
        $sql = "SELECT 
                    o.order_id,
                    o.order_date,
                    o.total_ammount,
                    o.order_nb_weeks,
                    o.order_state,
                    l.name_location,
                    l.adress_location,
                    l.day_location,
                    l.time_start_location,
                    l.time_end_location,
                    c.product_id,
                    c.order_quantity,
                    p.name_product,
                    p.price
                FROM orders o
                INNER JOIN contain c ON o.order_id = c.order_id
                INNER JOIN products p ON c.product_id = p.product_id
                INNER JOIN location l ON o.id_location = l.id_location
                WHERE o.user_id = :user_id
                ORDER BY o.order_date DESC";

        $stmt = $bdd->prepare($sql);
        
        // Liaison sécurisée avec bindParam
        $stmt->bindParam(':user_id', $user_id, PDO::PARAM_INT);
        
        $stmt->execute();
        $results = $stmt->fetchAll(PDO::FETCH_ASSOC);

        // Regroupement des données
        $orders = [];
        foreach ($results as $row) {
            $order_id = $row['order_id'];
            
            if (!isset($orders[$order_id])) {
                $orders[$order_id] = [
                    'infos' => [
                        'order_id' => $order_id,
                        'date' => $row['order_date'],
                        'total' => $row['total_ammount'],
                        'nb_weeks' => $row['order_nb_weeks'],
                        'state' => $row['order_state'],
                        'location' => [
                            'name' => $row['name_location'],
                            'address' => $row['adress_location'],
                            'day' => $row['day_location'],
                            'start' => $row['time_start_location'],
                            'end' => $row['time_end_location'] ?? ''
                        ]
                    ],
                    'products' => []
                ];
            }
            
            $orders[$order_id]['products'][] = [
                'name' => $row['name_product'],
                'price' => $row['price'],
                'quantity' => $row['order_quantity']
            ];
        }
        //var_dump(array_values($orders));
        return array_values($orders);

    } catch (PDOException $e) {
        error_log("Erreur SQL: " . $e->getMessage());
        return false;
    }
}

?>