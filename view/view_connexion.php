<?php
?>
    <main id="connectAccount">
        <div class="formulary" id="formConnect">
            <h3>CONNECTEZ VOUS</h3>
            <form id="connect" method="POST" action="">
                <p><span>*</span> = Information requise</p>
                <p>Vous n'avez pas de compte ? <a href="/adrar/Epinature/creation">Créer un compte</a></p>
                <div>
                    <label for="emailConnect">Adresse Mail : <span>*</span></label>
                    <input type="email" name="email" id="emailConnect" placeholder="Ex: adresse@test.fr" pattern="[\-a-zA-Z0-9.%+]+@[\-a-zA-Z0-9.]+\.[a-z]{2,10}" required>
                </div>
                <div>
                    <label for="passwordConnect">Mot de Passe : <span>*</span></label>
                    <input type="password" name="password" id="passwordConnect" pattern="[\-A-Za-z0-9$&+,:;=?@#.*%]{10,30}" placeholder="Entre 10 et 30 caractères" required>
                </div>
                <div>
                    <input type="submit" value="CONNEXION" class="link" name="submitConnection"/>
                </div>
            </form>
            <p><?= $message ?></p>
        </div>
    </main> 