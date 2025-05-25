// produit.js
import { deleteItemInBasket } from './api/basketApi.js'; //import fonctions api -> onclick()
import { setupQuantityEvents } from './event/quantityProductEvent.js';
import { closeLoginPopup } from './dom/loginPopupDom.js';
import { OrderBasketEvent , AddProductEvent} from './event/basketEvent.js';


// Expose les fonctions globalement pour les appels onclick dans le HTML
//console.log("Test 1");

window.deleteItemInBasket = deleteItemInBasket;
window.closeLoginPopup = closeLoginPopup;

// garantit éléments HTML accessibles via le DOM, pour gestion de toutes les fonctions addeventlistener("click")
document.addEventListener('DOMContentLoaded', () => {
    setupQuantityEvents();
    OrderBasketEvent();
    AddProductEvent();
});





