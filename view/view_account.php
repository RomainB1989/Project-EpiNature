
    <main class="account-container">
        <div class="account-box">
            <h1>Bonjour <?= $user['prenom'] ?></h1>
            
            <p class="welcome-text">
                Bienvenue sur votre page d'accueil. Vous pouvez y gérer vos informations personnelles ainsi que vos commandes. Vous pouvez aussi y consulter vos avoirs et bons de réductions.
            </p>

            <div class="rewards-section">
                <h2>Mes Avoirs, Mes Bons de Réductions :</h2>
                <p class="no-rewards">Vous n'avez pas d'avoirs ni de bons de réductions.</p>
            </div>

            <div class="account-buttons">
                <a href="/adrar/Epinature/account/infos" class="account-btn info-btn">
                    <img src="/adrar/Epinature/src/Images/Icon-Account-Info.svg" alt="Icône informations">
                    <span>MES INFOS<br>PERSONELLES</span>
                </a>
                
                <a href="/adrar/Epinature/account/orders" class="account-btn orders-btn">
                    <img src="/adrar/Epinature/src/Images/Icon-Account-History.svg" alt="Icône historique">
                    <span>HISTORIQUE<br>ET DÉTAILS<br>DE MES<br>COMMANDES</span>
                </a>
            </div>

            <a href="/adrar/Epinature/deconnexion" class="logout-btn">DÉCONNEXION</a>
        </div>
    </main>