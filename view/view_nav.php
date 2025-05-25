<?php


?>

<nav class="menu">
        <ul class="menu-desktop">       <!-- Menu Deroulant en Version Desktop et Tablette -->
            <li>
                <a href="/adrar/Epinature/accueil" target="_self">Accueil</a>
            </li>
            <li class="deroulant">
                <a href="#">Mon Panier</a>
                <ul class="panier">
                    <?= $listBasket ?>
                </ul>
            </li>
            <li class="deroulant">
                <a href="#">Nous Découvrir</a>
                <ul class="sous-menu">
                    <li><a href="/adrar/Epinature/presentation">Présentation</a></li>
                    <li><a href="/adrar/Epinature/ou-nous-trouver">Ou Nous Trouver</a></li>
                    <li><a href="/adrar/Epinature/contact">Nous Contacter</a></li>
                    <li><a href="/adrar/Epinature/partenaires">Nos Partenaires</a></li>
                </ul>
            </li>
            <li class="deroulant">
                <a href="/adrar/Epinature/boutique">Nos Produits</a>
            </li>
            <li>
                <a href="/adrar/Epinature/gazette" target="_self">La Gazette du Boulanger</a>
            </li>
            <li class="deroulant">
                <a href="#">Espace Compte</a>
                <ul class="sous-menu">
                    <?= $linkNav ?>
                </ul>
            </li>
        </ul>
        
        <ul class="menu-mobile">   <!-- Menu Deroulant en Version Mobile -->
            <li class="icon-menu">
                <img src="/adrar/Epinature/src/Images/Icon-Menu-Basket.svg" width="auto" height="40px" alt="Icon Panier"  id="icon-basket">
            </li>
            <ul class="menu-basket">
                <?= $listBasket ?>
            </ul>

            <li class="icon-menu">
                <img src="/adrar/Epinature/src/Images/Icon-Menu-Account.svg" width="auto" height="40px" alt="Icon Espace Compte" id="icon-account">
            </li>
            <ul class="menu-account">
                <?= $linkNav ?>
            </ul>

            <li class="icon-menu">
                <img src="/adrar/Epinature/src/Images/Icon-Menu-Burger.svg" width="auto" height="40px" alt="Icon Menu Burger" id="icon-burger">
            </li>
            <ul class="menu-burger">
                <li><a href="/adrar/Epinature/presentation">Présentation</a></li>
                <li><a href="/adrar/Epinature/boutique">Nos Produits</a></li>
                <li><a href="/adrar/Epinature/ou-nous-trouver">Ou Nous Trouver ?</a></li>
                <li><a href="/adrar/Epinature/contact">Nous Contacter !</a></li>
                <li><a href="/adrar/Epinature/partenaires">Nos Partenaires</a></li>
                <li><a href="/adrar/Epinature/gazette">La Gazette du Boulanger</a></li>
            </ul>
        </ul>
        <div id="login-modal" class="modal" style="display:none;">
            <div class="modal-content">
                <span class="close-modal" onclick="closeLoginPopup()">&times;</span>
                <h2>Connexion requise</h2>
                <p>Veuillez vous connecter ou créer un compte pour commander votre panier.</p>
                <a href="/adrar/Epinature/connexion" class="btn-modal">Se connecter</a>
                <a href="/adrar/Epinature/creation" class="btn-modal">Créer un compte</a>
            </div>
        </div>
    </nav>