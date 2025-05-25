const iconBasket = document.querySelector("#icon-basket");
const iconAccount = document.querySelector("#icon-account");
const iconBurger = document.querySelector("#icon-burger");
const menuBasket = document.querySelector(".menu-basket");
const menuAccount = document.querySelector(".menu-account");
const menuBurger = document.querySelector(".menu-burger");
const overlay = document.querySelector(".overlay");

function changeIcon(icon, typeIcon){
  // Change l'icone si elle existe et est active
    if (icon && icon.src) {
        icon.src = icon.src.includes(`Icon-Menu-${typeIcon}.png`) 
        ? `/adrar/Epinature/src/Images/Icon-Menu-Close.png`
        : `/adrar/Epinature/src/Images/Icon-Menu-${typeIcon}.png`;
    }
}

function closeAllMenus() {
    // Ferme tous les menus si ils existe et sont actifs
    if (menuBasket) menuBasket.classList.remove('active');
    if (menuAccount) menuAccount.classList.remove('active');
    if (menuBurger) menuBurger.classList.remove('active');
    
    // Réinitialise toutes les icônes si elles existent et sont actifs
    if (iconBasket && iconBasket.src && !iconBasket.src.includes('Icon-Menu-Basket.png')) {
        changeIcon(iconBasket, "Basket");
    }
    if (iconAccount && iconAccount.src && !iconAccount.src.includes('Icon-Menu-Account.png')) {
        changeIcon(iconAccount, "Account");
    }
    if (iconBurger && iconBurger.src && !iconBurger.src.includes('Icon-Menu-Burger.png')) {
        changeIcon(iconBurger, "Burger");
    }
}

iconBasket.addEventListener('click', function() {
    if (menuBasket.classList.contains('active')) {
        //console.log("Je ferme le panier");
        closeAllMenus();
    } else {
        //console.log("Je deplis le panier");
        closeAllMenus();
        menuBasket.classList.add('active');
        changeIcon(iconBasket, "Basket");
    }
});

iconAccount.addEventListener('click', function() {
    if (menuAccount.classList.contains('active')) {
        //console.log("Je ferme le menu Compte");
        closeAllMenus();
    } else {
        //console.log("Je deplis le menu Compte");
        closeAllMenus();
        menuAccount.classList.add('active');
        changeIcon(iconAccount, "Account");
    }
});

iconBurger.addEventListener('click', function() {
    if (menuBurger.classList.contains('active')) {
        // appel fonction qui close tous les sous-menus
        closeAllMenus();
    } else {
        
        closeAllMenus();
        // Rend le menu Burger active pour l'afficher
        menuBurger.classList.add('active');
        // Change son icone avec l'icone "croix" de fermeture
        changeIcon(iconBurger, "Burger");
    }
});
