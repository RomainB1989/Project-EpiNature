<main id="accountHistory">
    <h1>Historique de vos commandes</h1>

    <?php if (empty($ordersHistory)): ?>
        <p>Aucune commande trouvée.</p>
    <?php else: ?>
        <ul class="orders-list">
            <?php foreach ($ordersHistory as $order): ?>
                <li class="order-item">
                    <div class="order-summary">
                        <div class="order-header">
                            <span class="order-date">
                                Commande du <?= date('d/m/Y \à H\hi', strtotime($order['infos']['date'])) ?>
                            </span>
                            <span class="order-total">
                                <?= number_format($order['infos']['total'], 2, ',', ' ') ?> €
                            </span>
                            <span class="order-state-badge state-<?= htmlspecialchars(strtolower($order['infos']['state'])) ?>">
                                <?= htmlspecialchars($order['infos']['state']) ?>
                            </span>
                            <button class="btn-details" data-order-id="<?= $order['infos']['order_id'] ?>">
                            Détails ▼
                            </button>
                        </div>
                        <div class="order-details" style="display: none;">
                            <div class="details-section">
                                <h3>Détails de la commande</h3>
                                <!-- Lieu de collecte -->
                                <div class="pickup-info">
                                    <p><strong>Point de collecte :</strong></p>
                                    <p><?= htmlspecialchars($order['infos']['location']['name']) ?></p>
                                    <p><?= htmlspecialchars($order['infos']['location']['address']) ?></p>
                                    <?php if (empty($order['infos']['location']['end'])): ?>
                                    <p>Le <?= htmlspecialchars($order['infos']['location']['day']) ?> à partir de <?= htmlspecialchars($order['infos']['location']['start']) ?></p>
                                    <?php else: ?>
                                    <p>Le <?= htmlspecialchars($order['infos']['location']['day']) ?> de <?= htmlspecialchars($order['infos']['location']['start']) ?> à <?= htmlspecialchars($order['infos']['location']['end']) ?></p>
                                    <?php endif; ?>
                                </div>
                                <!-- Répétition -->
                                <p class="repetition-info">
                                    <strong>Répétition :</strong> 
                                    <?= $order['infos']['nb_weeks'] ?> semaine(s)
                                </p>
                                <!-- Produits -->
                                <div class="products-list">
                                    <table>
                                        <thead>
                                            <tr>
                                                <th>Produit</th>
                                                <th>Quantité</th>
                                                <th>Prix unitaire</th>
                                                <th>Total</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php foreach ($order['products'] as $product): ?>
                                                <tr>
                                                    <td><?= htmlspecialchars($product['name']) ?></td>
                                                    <td><?= $product['quantity'] ?></td>
                                                    <td><?= number_format($product['price'], 2, ',', ' ') ?> €</td>
                                                    <td><?= number_format($product['price'] * $product['quantity'], 2, ',', ' ') ?> €</td>
                                                </tr>
                                            <?php endforeach; ?>
                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                <td colspan="3" style="text-align:right; font-weight:bold;">Total TTC :</td>
                                                <td style="font-weight:bold;"><?= number_format($order['infos']['total'], 2, ',', ' ') ?> € TTC</td>
                                            </tr>
                                        </tfoot>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </li>
            <?php endforeach; ?>
        </ul>
    <?php endif; ?>
</main> 