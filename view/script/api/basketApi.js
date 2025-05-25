//Contenu : basketApi.js(Fonctions qui communique avec les API)
import {deleteItemDisplayBasket,updateDisplayBasket} from '../dom/basketDom.js';


//Fonction qui communique avec l'api "api_add_basket" et lui envoie le produit à ajouté 
// avec une affichage différent suivant la réponse
export async function addToBasket(productId, productName, quantity, price) {
    const basketContainerDesktop = document.querySelector('.panier');
    const basketContainerMobile = document.querySelector('.menu-basket');
    //console.log(`Id : ${productId}, ${productName} au prix de ${price} ajouté au panier, quantité : ${quantity}`);

    const productData = {
        "id_product": productId,
        "name_product": productName,
        "quantity": quantity,
        "price": price
    };

    // Créer une requête POST pour ajouter le produit au panier
    try {
        const response = await fetch('controllers/api/api_add_basket.php', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json; charset=UTF-8',
            },
            body: JSON.stringify(productData), // Envoi des données sous forme JSON
        });

        const messageApi = document.querySelector("#messageApi");
        if (response.ok) {
            const result = await response.json();
            messageApi.style.color = 'green';
            messageApi.innerText = result["message"];
            //console.log("Message retourner : \n");
            //console.log(result); // Afficher le panier mis à jour dans la console

            // Effacement du message au bout de deux secondes.
            setTimeout(() => {
                messageApi.innerText = '';
            }, 2000);

            updateDisplayBasket(basketContainerDesktop ,result["success"],productData);
            updateDisplayBasket(basketContainerMobile ,result["success"],productData);

        } else {
            const result = await response.json(); // Récupérer le message d'erreur
            messageApi.style.color = 'red';
            messageApi.innerText = result["message"]; // Afficher le message d'erreur directement
        }
    } catch (error) {
        const messageApi = document.querySelector("#messageApi");
        messageApi.style.color = 'red';
        messageApi.innerText = 'Erreur Api: ' + error.message; // Afficher le message d'erreur de l'exception
    }
}

//Fonction qui communique avec l'api "api_delete_basket" et lui envoie le produit à éffacé 
// avec une réponse en succes contenant l'id du produit éffacé.
export async function deleteItemInBasket(productId) {
    const basketContainerDesktop = document.querySelector('.panier');
    const basketContainerMobile = document.querySelector('.menu-basket');
    //console.log(`Id du Produit à effacé: ${productId}`);

    const productData = {
        "id_product": productId
    };

    // Créer une requête DELETE pour ajouter le produit au panier
    try {
        const response = await fetch('controllers/api/api_delete_basket.php', {
            method: 'DELETE',
            headers: {
                'Content-Type': 'application/json; charset=UTF-8',
            },
            body: JSON.stringify(productData), // Envoi des données sous forme JSON
        });

        if (response.ok) {
            const result = await response.json();
            //console.log("Message de succes retourné : \n"); // Affichage de Test
            //console.log(result["message"]); // Afficher le panier mis à jour dans la console

            deleteItemDisplayBasket(basketContainerDesktop ,result);
            deleteItemDisplayBasket(basketContainerMobile ,result);
        } else {
            const result = await response.json(); // Récupérer le message d'erreur
            //console.log("Message d'Erreur retourné : \n");
            //console.log(result["message"]); // Afficher le panier mis à jour dans la console
        }
    } catch (error) {
        console.log(error.message);
    }
}

export async function checkUserLoggedIn(){
    try {
        const response = await fetch('controllers/api/api_check_logged_user.php', {
            method: 'GET',
            headers: {
                'Content-Type': 'application/json; charset=UTF-8',
            },
        });

        if (response.ok) {
            const result = await response.json();
            //console.log("Message de succes retourné : \n"); // Affichage de Test
            //console.log(result["message"]); // Afficher le message du checkLoggedUser
            return result;
        } else {
            //const result = await response.json(); // Récupérer le message d'erreur
            //console.log("Message d'Erreur retourné : \n");
            //console.log(result["message"]); // Afficher l'erreur du checkLoggedUser
            return result;
        }
    } catch (error) {
        console.error(error.message);
        return null;
    }
}
