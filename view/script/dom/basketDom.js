//basketDom.js

export function deleteButtonOrder(basketContainer){
    let buttonOrder = basketContainer.querySelector('.basket-button'); //Recuperation dans le DOM du Bouton Commander
    if (buttonOrder) {
        buttonOrder.remove();
    }
}

export function addMessageEmptyBasket(basketContainer){
    //Code HTML à créé coté client <li id='empty-basket'><div class='min-basket'>Le Panier est vide.</div></li>

     // Création de l'élément <li>
     const MessageEmptyBasket = document.createElement('li');
     MessageEmptyBasket.id = 'empty-basket';
 
     // Création de la div à l'intérieur
     const minBasketDiv = document.createElement('div');
     minBasketDiv.className = 'min-basket';
     minBasketDiv.innerText = 'Le Panier est vide.';
 
     // Ajout de la div dans le <li>
     MessageEmptyBasket.appendChild(minBasketDiv);
 
     // Ajout du <li> dans le container du panier
     basketContainer.appendChild(MessageEmptyBasket);
}


export function deleteItemDisplayBasket(basketContainer ,responseApi){
    //console.log("Element coté client du DOM ou la suppression doit se faire\n");
    //console.log(basketContainer);
    if(responseApi["delete-id"]){

        //console.log("Contenu du Panier retourneé par l'Api : \n");
        //console.log(responseApi); // Affichage de Test
        
        const itemsList = basketContainer.querySelectorAll('.item-basket'); // Récupérer dans le DOM tous les produits du panier
        //console.log("Contenu des produit dans le panier en DOM : \n");
        //console.log(itemsList);

        itemsList.forEach(item => {
            // Vérifier si le produit correspond à l'ID
            if (item.getAttribute('id') == responseApi["delete-id"]) {
                //console.log("J'efface le produit dans le panier coté client.");
                item.remove(); // Supprime l'élément <li> du DOM
            }
        });

        if (responseApi["basket"].length === 0) {          
            //console.log("Panier retourné est vide -> Modification Affichage coté client");
            deleteButtonOrder(basketContainer);
            addMessageEmptyBasket(basketContainer);
        }
    }
}

export function deleteMessageEmptyBasket(displayContainer){
    let emptyBasket = displayContainer.querySelector('#empty-basket'); //Nettoyage du li Message Panier Vide si existe
    if (emptyBasket) {
        emptyBasket.remove();
    }
}

export function addButtonOrder(displayContainer){
    const newListItem = document.createElement('li');
    newListItem.className = "basket-button";

    const newBasketDiv = document.createElement('div');
    newBasketDiv.className = 'button-basket';

    const newButton = document.createElement('button');
    newButton.type = "button";
    newButton.innerText = "Commander";

    newBasketDiv.appendChild(newButton);
    newListItem.appendChild(newBasketDiv);
    displayContainer.appendChild(newListItem);
}

export function addProductToDisplayBasket(displayContainer, productData) {
    const basketContainer = displayContainer; // Sélecteur pour le conteneur du panier

    const newListItem = document.createElement('li');
    newListItem.className = "item-basket";
    newListItem.id = productData.id_product; // Assurez-vous que l'ID est défini ici
    const newMinBasketDiv = document.createElement('div');
    newMinBasketDiv.className = 'min-basket';

    const newQuantityElement = document.createElement('p');
    newQuantityElement.classList.add("basket-product-quantity");
    newQuantityElement.textContent = productData.quantity;

    const newNameElement = document.createElement('p');
    newNameElement.classList.add("basket-product-name");
    newNameElement.textContent = productData.name_product;

    const newButtonElement = document.createElement('button');
    newButtonElement.className = 'button-delete-item';
    newButtonElement.id = productData.id_product;

    const newDeleteIcon = document.createElement('img');
    newDeleteIcon.src = '/adrar/Epinature/src/Images/Icon-Delete.png';
    newDeleteIcon.alt = 'Icon-Croix';
    newDeleteIcon.className = 'icon-Delete';
    newDeleteIcon.onclick = () => deleteItemInBasket(productData.id_product);

    // Ajouter les éléments au div
    newMinBasketDiv.appendChild(newQuantityElement);
    newMinBasketDiv.appendChild(newNameElement);
    newButtonElement.appendChild(newDeleteIcon);
    newMinBasketDiv.appendChild(newButtonElement);

    // Ajouter le div au li
    newListItem.appendChild(newMinBasketDiv);
    
    // Supprimer le message "Panier vide" s'il existe
    deleteMessageEmptyBasket(basketContainer);

    // Trouver le bouton "Commander" s'il existe déjà
    const buttonOrder = basketContainer.querySelector('.basket-button');
    if (buttonOrder) {
        // Insérer le nouveau produit juste avant le bouton "Commander"
        basketContainer.insertBefore(newListItem, buttonOrder);
    } else {
        // Ajouter à la fin si le bouton n'existe pas encore
        basketContainer.appendChild(newListItem);
        // Ajouter (ou réajouter) le bouton "Commander" à la fin
        addButtonOrder(basketContainer);
    }
}

export function modifyQuantityDisplayBasket(displayContainer,productId, updateQuantity) {
    const basketContainer = displayContainer; // Sélecteur pour le conteneur du panier
    const itemsList = basketContainer.querySelectorAll('.item-basket'); // Récupérer dans le DOM tous les produits du panier
    //console.log(itemsList);

    itemsList.forEach(item => {
        const divElement = item.querySelector('.min-basket');
        const quantityElement = divElement.querySelector('.basket-product-quantity'); // Récupérer l'élément de quantité
        //const nameElement = divElement.querySelector('.basket-product-name'); // Récupérer l'élément de nom

        // Vérifier si le produit correspond à l'ID
        if (item.getAttribute('id') == productId) { // Utilisez getAttribute pour récupérer l'ID
            //console.log("Je modifie la quantité de mon produit dans UpdatequantityDisplay :");
            quantityElement.textContent = updateQuantity; // Mettre à jour la quantité
        }
    });
}

export function updateDisplayBasket(displayContainer,successType, productData) {
    // Si la réponse de l'API indique un ajout
    if (successType === "add") {
        //console.log("Je rajoute un produit dans le panier");
        addProductToDisplayBasket(displayContainer, productData);
    } 
    // Si la réponse de l'API indique un mise à jour d'une quantité
    if (successType === "update") {
        //console.log("Je modifie un produit dans le panier");
        modifyQuantityDisplayBasket(displayContainer, productData.id_product, productData.quantity);
    }
}