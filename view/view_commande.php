<main id="commande">
    <div id="cancel-order">
        <!-- Bouton Annuler placé en haut à droite -->
        <button class="btn-danger" id="btn-cancel" type="button" onclick="window.location.href='/adrar/Epinature/boutique'">Annuler la Commande</button>
    </div>
    <h1>Finaliser votre commande</h1>


    <div class="progress-bar-container">
        <div class="progress-bar" id="order-progress">Étape 1/4</div>
    </div>

    <div class="order-card">
        <p class="order-step-content">Chargement…</p>
    </div>

     <!-- Navigation principale avec Précédent et Suivant -->
     <div class="order-nav-main">
        <button class="btn-nav" id="btn-prev" style="visibility:hidden;">&lt; Précédent</button>
        <button class="btn-nav" id="btn-next">Suivant &gt;</button>
    </div>

    <p id="messageApi"></p>
    <!-- Validation finale, centré sur une ligne séparée -->
    <div class="order-nav-validate">
        <button class="btn-success" id="btn-confirm" style="display:none;">Valider la Commande</button>
    </div>
</main>