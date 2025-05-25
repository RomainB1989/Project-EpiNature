<?php
// Assurez-vous que la variable $product est bien définie
if (!isset($product)) {
    echo "<p>Produit non trouvé.</p>";
    exit();
}
?>
    <main id="produit">
        <a href="/adrar/Epinature/boutique" class="btn-retour-boutique">
            ← Retour à la boutique
        </a>
        <div class="product-container">
            <div class="container-image-infos">

                <div class="product-image">
                    <img src="<?= $product['url_image'] ?>" 
                         alt="<?= $product['name_image'] ?>" 
                         class="responsive">
                </div>
                
                <div class="product-details">
                    <div class="product-header">
                        <h1><?= $product['name_product'] ?></h1>
                        <p class="category"><?= $product['name_category'] ?></p>
                        <p class="resume"><?= $product['resume'] ?></p>
                    </div>
    
                    <div class="product-info">
                        
                        <div class="ingredients">
                            <h2>Ingrédients : </h2>
                            <p><?= $product['ingredients'] ?></p>
                        </div>
                        <div class="description">
                            <h2>Description : </h2>
                            <p><?= $product['description'] ?></p>
                        </div>
    
                    </div>
                </div>
            </div>
        </div>
        <div class="purchase-info">
            
            <div class="box-price">
                <p class="price" data-price="<?= $product['price'] ?>" >
                    <?= number_format($product['price'], 2, ',', ' ') ?> € TTC
                </p>

                <div class="quantity-selector">
                    <button class="quantity-btn decrement-btn">-</button>
                    <input type="number" id="quantity" value="1" min="1">
                    <button class="quantity-btn increment-btn">+</button>
                </div>
            </div>
            
            <p id="messageApi"></p>

            <button type="button" class="add-to-cart" 
                    data-product-id="<?= $product['product_id'] ?>" 
                    data-product-name="<?= $product['name_product'] ?>"
                    data-product-price="<?= $product['price'] ?>">
                Ajouter au panier
            </button>
        </div>
    </main>