<?php
?>
    <main id="boutique">
        <h1>Nos Produits</h1>
        <p class="introduction-shopping">
        Bienvenue dans notre boutique où Marie, Céline, Jérémy, Pauline, Bernard et Dorian unissent leur passion et leur savoir-faire artisanal pour vous proposer chaque jour une large gamme de produits faits maison, alliant qualité, fraîcheur et respect de l’environnement, que ce soit pour nos pains, viennoiseries, gâteaux ou produits salés, afin de vous offrir une expérience gustative authentique et conviviale.
        </p>
        <hr />
        
        <!-- Ajout du menu déroulant pour les catégories -->
        <label for="category-select">Sélectionnez une catégorie :</label>
        <select id="category-select" onchange="modifyDomByCategory(this.value)">
            <option value="">Toutes les catégories</option>
            <?php foreach($listCategories as $category): ?>
                <option value="<?= $category['id_category'] ?>"><?= $category['name_category'] ?></option>
            <?php endforeach; ?>
        </select>
        
        <?php if (is_array($products)): ?>
        <section class="products-grid">
            <?php foreach($products as $product): ?>
                <!-- data-* attribut utilisé pour stocker l'id_category qui nous servira pour le filtrage -->
                <article class="product-card" data-category="<?= $product['id_category'] ?>">
                    <div class="product-image">
                        <img src="<?= $product['url_image'] ?>" alt="<?= $product['name_image'] ?>" class="responsive">
                    </div>
                    <div class="product-info">
                        <h3><?= $product['name_product'] ?></h3>
                        <p class="product-resume"><?= $product['resume'] ?></p>
                        <p class="product-price">
                            <?= number_format($product['price'], 2, ',', ' ') ?>
                             €</p>
                        <button type="button" 
                        onclick="window.location.href='/adrar/Epinature/produit?id=<?= $product['product_id'] ?>';" 
                        class="btn-primary">Voir le produit</button>
                    </div>
                </article>
            <?php endforeach; ?>
        </section>
        <?php else: ?>
        <div class="error"><?= htmlspecialchars($products) ?></div>
        <?php endif; ?>
    </main> 