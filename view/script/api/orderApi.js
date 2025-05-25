// api/orderApi.js
import { checkUserLoggedIn } from './basketApi.js';

export async function fetchBasket() {
    try {
        const response = await fetch('controllers/api/api_fetch_basket.php', {
            method: 'GET',
            headers: {
                'Content-Type': 'application/json; charset=UTF-8',
            },
        });

        const result = await response.json();
        if (response.ok && result.code === 200) {
            return result;
        } else {
            // Affiche l’erreur ou gère le cas d’erreur
            console.error(result.message || 'Erreur lors de la récupération du panier');
            return null;
        }
    } catch (error) {
        console.error('Erreur réseau ou serveur :', error.message);
        return null;
    }
}

export async function fetchLocations() {
    try {
        const response = await fetch('controllers/api/api_fetch_locations.php', {
            method: 'GET',
            headers: {
                'Content-Type': 'application/json; charset=UTF-8',
            },
        });

        const result = await response.json();
        if (response.ok && result.code === 200) {
            return result;
        } else {
            // Affiche l’erreur ou gère le cas d’erreur
            console.error(result.message || 'Erreur lors de la récupération du panier');
            return null;
        }
    } catch (error) {
        console.error('Erreur réseau ou serveur :', error.message);
        return null;
    }
}

export async function submitFinalOrder(orderData) {

    const checkResponse = await checkUserLoggedIn();
        //Si ya pas User loggin on affiche le popUp d'information avec bouton de redirection
        // Si ya User Loggin on redirige sur la page commande.
        if(!checkResponse || checkResponse.loggedIn == false) {
            showLoginPopup();
        }
    
    const finalOrderData = {
        "basket" : orderData.basket,
        "totalAmmount" : orderData.totalAmmount,
        "locationId" : orderData.locationId,
        "repetition" : orderData.repetition,
        "userId": checkResponse.userId
    }
    console.log(finalOrderData);
    try {
        const response = await fetch('controllers/api/api_submit_order.php', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json; charset=UTF-8',
            },
            body: JSON.stringify(finalOrderData), // Envoi des données sous forme JSON
        });
        const messageApi = document.querySelector("#messageApi");
        if (response.ok) {
            const result = await response.json();
            messageApi.style.color = 'green';
            messageApi.innerText = result["message"];
            //console.log("Message retourner : \n");
            //console.log(result); // Afficher le panier mis à jour dans la console

            // Redirection sur la page d'accueil au bout de deux secondes.
            setTimeout(() => {
                window.location.replace("/adrar/Epinature/accueil");
            }, 2000);
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