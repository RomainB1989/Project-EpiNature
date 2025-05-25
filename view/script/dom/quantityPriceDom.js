//Ensemble de Fonctions qui gère coté client la modification de la quantité d'un produit à ajouté

//Fonction qui change dans le DOM le prix en le mulipliant par la quantité.
export function modifyPricebyQuantity(quantity) {
    //console.log("Quantité : " + quantity);
    
    // Récupérer l'élément avec la classe "price"
    const priceElement = document.querySelector(".price");
    // Récupérer le prix d'origine à partir de l'attribut data-price
    const originalPrice = parseFloat(priceElement.getAttribute("data-price"));
    // Calculer le nouveau prix
    const newPrice = (originalPrice * quantity).toFixed(2);
    // Mettre à jour le contenu de l'élément price
    priceElement.textContent = newPrice + " € TTC";
}

//Fonction qui ajoute 1 à la Quantité
export function incrementQuantity() {
    //console.log("Increment")
    const input = document.getElementById('quantity');
    const currentValue = parseInt(input.value);
    input.value = currentValue + 1;
    modifyPricebyQuantity(input.value);
}

//Fonction qui enlève 1 à la Quantité
export function decrementQuantity() {
    //console.log("Decrement")
    const input = document.getElementById('quantity');
    const currentValue = parseInt(input.value);
    if (currentValue > 1) {
        input.value = currentValue - 1;
    }
    modifyPricebyQuantity(input.value);
}