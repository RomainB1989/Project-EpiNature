// quantityEvents.js
import { incrementQuantity, decrementQuantity } from '../dom/quantityPriceDom.js';

export function setupQuantityEvents() {
    const incButton = document.querySelector('.increment-btn');
    const decButton = document.querySelector('.decrement-btn');
    if(incButton){
        incButton.addEventListener('click', incrementQuantity);
    }
    if(decButton){
        decButton.addEventListener('click', decrementQuantity);
    }
}