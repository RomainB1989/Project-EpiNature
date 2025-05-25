import { checkUserLoggedIn } from '../api/basketApi.js';
import { showLoginPopup } from '../dom/loginPopupDom.js';
import { addToBasket } from '../api/basketApi.js';
/*
export function OrderBasketEvent() {
    const divbuttonOrder = document.querySelector('#basket-button'); //Recuperation dans le DOM de la div qui contient Bouton Commander
    
    if(divbuttonOrder){
        const buttonOrder = divbuttonOrder.querySelector("button");
        if(buttonOrder){
            buttonOrder.addEventListener('click', async function(e) {
                e.preventDefault(); //Eviter comportement pas d'effaut de l'element du DOM concerné.
                const checkResponse = await checkUserLoggedIn();
                if(checkResponse.loggedIn == false) {
                    showLoginPopup();
                } 
                if(checkResponse.loggedIn == true && checkResponse.userId) {
                    console.log("Reponse du check : "+checkResponse.loggedIn+"\nId User connecté : "+checkResponse.userId);
                    // Rediriger ou continuer la commande
                    //window.location.href = '/adrar/Epinature/commande';
                }
            });
        }
    }
}
*/

export function AddProductEvent() {
    const addToCartBtn = document.querySelector('.add-to-cart');
    if (addToCartBtn) {
        addToCartBtn.addEventListener('click', function () {
            // Récupération des données depuis les attributs data-*
            const productId = this.dataset.productId;
            const productName = this.dataset.productName;
            const productPrice = parseFloat(this.dataset.productPrice);
            // Récupération de la quantité et du prix depuis le DOM
            const productQuantity = document.querySelector('#quantity').value;
            // Appel de la fonction
            addToBasket(productId, productName, productQuantity, productPrice);
        });
    }
}

export function OrderBasketEvent() {
    // Sélectionne tous les li.basket-button dans le DOM (desktop + mobile)
    const basketButtons = document.querySelectorAll('.basket-button');
    //console.log("Test2");
    basketButtons.forEach(divbuttonOrder => {
        const buttonOrder = divbuttonOrder.querySelector("button");
        if(buttonOrder){
            buttonOrder.addEventListener('click', handleOrderClick);
        }
    });
}

async function handleOrderClick(e) {
    e.preventDefault();
    const checkResponse = await checkUserLoggedIn();
    //Si ya pas User loggin on affiche le popUp d'information avec bouton de redirection
    // Si ya User Loggin on redirige sur la page commande.
    if(checkResponse.loggedIn == false) {
        showLoginPopup();
    } else if(checkResponse.loggedIn == true && checkResponse.userId) {
        console.log("Reponse du check : "+checkResponse.loggedIn+"\nId User connecté : "+checkResponse.userId);
        // Rediriger ou continuer la commande
        window.location.href = '/adrar/Epinature/commande';
    }
}

