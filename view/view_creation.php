<?php
?>
    <main id="createAccount">
        <div class="formulary" id="formCreate">
            <h3>REJOIGNEZ NOUS</h3>
            <form id="create" method="POST" action="">
                <p><span>*</span> = Information requise</p>
                <p>Vous avez déjà un compte ? <a href="/adrar/Epinature/connexion">Connectez-vous</a></p>
                <div>
                    <label for="lastname">Nom : <span>*</span></label>
                    <input type="text" name="lastname" id="lastname" placeholder="Ex: Jean" pattern="[\-a-zA-Z]{1,100}" required>
                </div>
                <div>
                    <label for="firstname">Prénom : <span>*</span></label>
                    <input type="text" name="firstname" id="firstname" placeholder="Ex: Bouing" pattern="[\-a-zA-Z]{1,100}" required>
                </div>
                <div>
                    <label for="email">Adresse Mail : <span>*</span></label>
                    <input type="email" name="email" id="email" placeholder="Ex: adresse@test.fr" pattern="[\-a-zA-Z0-9.%+]+@[\-a-zA-Z0-9.]+\.[a-z]{2,10}" required>
                </div>
                <div>
                    <label for="phone">Numéro de Téléphone :</label>
                    <input type="tel" name="phone" id="phone" placeholder="Ex: 0678546215" pattern="\+?0[0-9]{9}">
                </div>
                <div>
                    <label for="passwordCreate">Mot de Passe : <span>*</span></label>
                    <input type="password" name="passwordCreate" id="passwordCreate" pattern="[\-A-Za-z0-9$&+,:;=?@#.*%]{10,30}" placeholder="Entre 10 et 30 caractères" required>
                </div>
                <div>
                    <label for="createConfirm">Confirmer Mot de Passe : <span>*</span></label>
                    <input type="password" name="passwordCreateConfirm" id="createConfirm" pattern="[\-A-Za-z0-9$&+,:;=?@#.*%]{10,30}" placeholder="Entre 10 et 30 caractères" required>
                </div>
                <div>
                    <label for="acceptCgu">Acceptez vous les Conditions Générales d'Utilisations : <span>*</span></label>
                    <input type="checkbox" name="accept" id="acceptCgu" required>
                </div>
                <div>
                    <input type="submit" value="CREER VOTRE COMPTE" class="link" name="submitCreation"/>
                </div>
            </form>
            <p><?= $message ?></p>
        </div>
    </main> 