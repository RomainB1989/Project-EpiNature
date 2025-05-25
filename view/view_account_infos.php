
    <main id="createAccount">
        <div class="formulary" id="formUpdate">
            <h3>MES INFORMATIONS PERSONNELLES</h3>
            <form id="update" method="POST" action="">
                <p><span>*</span> = Information requise</p>
                <div>
                    <label for="lastname">Nom : <span>*</span></label>
                    <input type="text" name="lastname" id="lastname" value="<?= $_SESSION['lastname'] ?>" pattern="[\-a-zA-Z]{1,100}" title="Lettres et tirets uniquement (max 100 caractères)" required>
                </div>
                <div>
                    <label for="firstname">Prénom : <span>*</span></label>
                    <input type="text" name="firstname" id="firstname" value="<?= $_SESSION['firstname'] ?>" pattern="[\-a-zA-Z]{1,100}" title="Lettres et tirets uniquement (max 100 caractères)" required>
                </div>
                <div>
                    <label for="email">Adresse Mail : <span>*</span></label>
                    <input type="email" name="email" id="email" value="<?= $_SESSION['email'] ?>" pattern="[\-a-zA-Z0-9.%+]+@[\-a-zA-Z0-9.]+\.[a-z]{2,10}" title="exemple : nom@domaine.fr" required>
                </div>
                <div>
                    <label for="phone">Numéro de Téléphone : (Optionnel)</label>
                    <input type="tel" name="phone" id="phone" value="<?= $_SESSION['phone'] ?>" pattern="\+?0[0-9]{9}">
                </div>
                <div>
                    <label for="passwordUpdate">Nouveau Mot de Passe : (Optionnel)</label>
                    <input type="password" name="passwordUpdate" id="passwordUpdate" pattern="[\-A-Za-z0-9$&+,:;=?@#.*%]{10,30}" placeholder="Entre 10 et 30 caractères" required>
                </div>
                <div>
                    <label for="updateConfirm">Confirmer Nouveau Mot de Passe :</label>
                    <input type="password" name="passwordUpdateConfirm" id="updateConfirm" pattern="[\-A-Za-z0-9$&+,:;=?@#.*%]{10,30}" placeholder="Entre 10 et 30 caractères" required>
                </div>
                <div>
                    <input type="submit" value="METTRE À JOUR" class="link" name="submitUpdate"/>
                </div>
            </form>
            <p><?= $message ?></p>
        </div>
    </main> 