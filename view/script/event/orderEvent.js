// event/orderEvent.js
import { fetchBasket, fetchLocations, submitFinalOrder} from '../api/orderApi.js';
import { clearOrderCard, displayFirstStep, displaySecondStep, displayThirdStep, displayFinalStep } from '../dom/orderDom.js';

export function setupCommandeEvents() {
    let currentStep = 1;
    const totalSteps = 4;
    const orderData = {
        basket: null,
        totalAmmount: 0,
        repetition: 1,
        locationId: 1,
        locationContent: null
    };

    // DOM elements
    const stepContentContainer = document.querySelector('.order-card');
    const progressBar = document.querySelector('#order-progress');
    const btnPrev = document.querySelector('#btn-prev');
    const btnNext = document.querySelector('#btn-next');
    const btnConfirm = document.querySelector('#btn-confirm');
    
    loadStep(currentStep);
    updateNavigationButtons();

    // Navigation logic
    btnPrev.addEventListener('click', () => navigate('prev'));
    btnNext.addEventListener('click', () => navigate('next'));

    // Récupération du bouton de Validation de commande et écoute de l'evenement.
    btnConfirm.addEventListener('click', () => submitFinalOrder(orderData));


    function loadStep(step) {
        switch (step) {
            case 1: loadStep1(); break;
            case 2: loadStep2(); break;
            case 3: loadStep3(); break;
            case 4: loadStep4(); break;
        }
    }

    // Step 1: Recapitulatif Panier
    async function loadStep1() {
        updateProgress(1);
        clearOrderCard();
        const result = await fetchBasket();
        if (result) {
            orderData.basket = result.basket;
            // Succès : on peut appeler displayFirstStep ici si besoin
            displayFirstStep(result.basket); // Passe le panier à la fonction
            setupTotalAmmount(orderData);
        }
    }

    // Step 2: Nombre de Repetition de la Commande
    function loadStep2() {
        updateProgress(2);
        clearOrderCard();
        displaySecondStep(orderData.repetition);
        setupRepetitionChoice(orderData);
    }

    // Step 3: Lieu de collecte de la commande
    async function loadStep3() {
        updateProgress(3);
        clearOrderCard();
        const result = await fetchLocations();
        if (result) {
            displayThirdStep(result.locations, orderData.locationId); // Passe les lieux de collecte à la fonction
            orderData.locationContent = result.locations.find(loc => loc.id_location === orderData.locationId);
            setupLocationChoice(orderData, result.locations);
        }
    }

    // Step 4: Validation finale de la commande
    async function loadStep4() {
        updateProgress(4);
        clearOrderCard();
        displayFinalStep(orderData);
    }

    /**
     * Calcule le total du panier et met à jour orderData.totalAmmount.
     * @param {Object} orderData - L'objet de commande contenant l'ensemble des donnée de la commande
     * 
    **/
    function setupTotalAmmount(orderData) {
        // Vérifie que orderData existe et possède un panier (basket) sous forme de tableau
        if (!orderData || !Array.isArray(orderData.basket)) {
            orderData.totalAmmount = 0;
            return;
        }

        // Initialise le total à zéro
        let total = 0;

        // Parcourt chaque produit du panier avec forEach
        orderData.basket.forEach(function(item) {
            // Récupère la quantité et le prix du produit, en s'assurant que ce sont bien des nombres
            const quantity = Number(item.quantity);
            const price = Number(item.price);

            // Si la quantité et le prix sont valides, ajoute le sous-total au total général
            if (!isNaN(quantity) && !isNaN(price)) {
                total = total + (quantity * price);
            }
            // Sinon, ignore cette ligne du panier (sécurité)
        });

        // Met à jour la propriété totalAmmount de orderData avec le total calculé
        orderData.totalAmmount = total;
    }

    function setupRepetitionChoice(orderData) {
        // Sélectionne tous les inputs radio du groupe "repetition"
        const radios = document.querySelectorAll('.order-card input[name="repetition"]');
        radios.forEach(radio => {
            radio.addEventListener('change', (e) => {
                orderData.repetition = Number(e.target.value);
                // Tu peux ici déclencher d'autres actions si besoin
                //console.log('Répétition choisie:', orderData.repetition);
            });
        });
    }


    function setupLocationChoice(orderData, locations) {
        const radios = document.querySelectorAll('.order-card input[name="location"]');
        radios.forEach(radio => {
            radio.addEventListener('change', (e) => {
                const selectedId = Number(e.target.value);
                
                // Stocke l'ID du lieu sélectionné
                orderData.locationId = selectedId;
                
                // Récupère et stocke TOUTES les données du lieu correspondant
                orderData.locationContent = locations.find(loc => loc.id_location === selectedId);
                
                // Pour debug : affiche les données dans la console
                //console.log('Lieu sélectionné:', orderData.locationContent);
            });
        });
    }

    function navigate(direction) {
        if (direction === 'next') {
            //console.log("Click Suivant");
            if (currentStep < totalSteps){
                currentStep++;  
            }
        }
        if (direction === 'prev') {
            //console.log("Click Précèdent");
            if (currentStep > 1){
                currentStep--;  
            }
        }
        loadStep(currentStep);
        updateNavigationButtons();
    }

    function updateNavigationButtons() {
        btnPrev.style.visibility = (currentStep > 1) ? 'visible' : 'hidden';
        btnNext.style.display = (currentStep < totalSteps) ? 'inline-block' : 'none';
        btnConfirm.style.display = (currentStep === totalSteps) ? 'inline-block' : 'none';
    }

    function updateProgress(step) {
        const percentage = Math.round((step / totalSteps) * 100);
        if (progressBar) {
            progressBar.style.width = percentage + '%';
            progressBar.textContent = `Étape ${step}/${totalSteps}`;
        }
    }
}
