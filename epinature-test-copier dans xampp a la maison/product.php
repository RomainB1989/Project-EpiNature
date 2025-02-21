<?php 
    require("./functions.php");

    $product = [];
    $id_product = 0;
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Page Produit Test</title>
</head>
<body>
    <h1 style="text-align: center;">Test Fiche produit Epinature</h1>
    <div class="product">
        <?php 
            $product = getProductInfo(getProductId());
            print_r($product); 
        ?>
    </div>
</body>
</html>