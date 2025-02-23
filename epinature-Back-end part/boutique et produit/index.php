<?php
    require("./functions.php");

    $products = [];
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Test Boutique Epinature</title>
</head>
<body>
    <h1 style="text-align: center;">Test Boutique Epinature</h1>
    <section style="display:flex; flex-wrap: wrap; margin: 0px 20px;">
        <?php $products = getProducts($products); ?>
        <?php foreach($products as $product): ?>
            <div style="display:flex; flex-direction:column; width:30%; border: solid 3px black; border-radius: 10px; margin: 10px 10px; padding: 5px 10px;">
                <h3 style="text-align: center;"><?= $product["name_product"] ?></h3>
                <p style="text-align: left;">Résumé : <?= $product["resume"] ?></p>
                <p style="text-align: left;">Description : <?= $product["description"] ?></p>
                <p style="text-align: left;">Liste des Ingredients : <?= $product["ingredients"] ?></p>
                <p style="text-align: center; font-weight:bold;">Prix : <?= $product["price"] ?> €</p>
                <a href="./product.php?id=<?= $product["product_id"] ?>" class="btn-details">Voir les détails</a>
            </div>
        <?php endforeach;?>
    </section>
</body>
</html>