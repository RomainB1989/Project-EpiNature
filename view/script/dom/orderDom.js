// dom/orderDom.js


const repetitions = [
    { id: 'once', value: 1, label: 'Une seule fois.' },
    { id: 'twice', value: 2, label: 'Deux fois.' },
    { id: 'monthly', value: 4, label: 'Pendant un mois (4 semaines).' },
    { id: 'trimestrial', value: 13, label: 'Pendant trois mois (13 semaines).' },
    { id: 'bi-annual', value: 26, label: 'Pendant six mois (26 semaines).' }
];

function getRepetitionPhraseElement(repetitionValue) {
    // Création de la div conteneur
    const div = document.createElement('div');
    div.className = 'repetition-summary';

    // Phrase principale
    const p = document.createElement('p');
    p.className = 'important';

    switch (repetitionValue) {
        case 1:
            p.textContent = "Vous avez choisi de ne passer cette commande qu'une seule fois.";
            break;
        case 2:
            p.textContent = "Vous avez choisi de répéter cette commande deux fois.";
            break;
        case 4:
            p.textContent = "Vous avez choisi de répéter cette commande pendant un mois (4 semaines).";
            break;
        case 13:
            p.textContent = "Vous avez choisi de répéter cette commande pendant trois mois (13 semaines).";
            break;
        case 26:
            p.textContent = "Vous avez choisi de répéter cette commande pendant six mois (26 semaines).";
            break;
        default:
            p.textContent = `Vous avez choisi de répéter cette commande ${repetitionValue} fois.`;
    }

    div.appendChild(p);
    return div;
}

function getLocationElement(location) {
    // Création de la div conteneur
    const div = document.createElement('div');
    div.className = 'location-summary';

    // Sous-titre
    const h3 = document.createElement('h3');
    h3.textContent = 'Lieu de collecte :';
    div.appendChild(h3);

    // Conteneur principal pour image + infos
    const infoContainer = document.createElement('div');
    infoContainer.className = 'location-info-container';

    // Image du lieu
    const img = document.createElement('img');
    img.className = 'location-thumbnail';
    img.src = location.url_image;
    img.alt = location.name_image || location.name_location;
    infoContainer.appendChild(img);

    // Détails du lieu
    const detailsDiv = document.createElement('div');
    detailsDiv.className = 'location-details';

    // Nom du lieu
    const nameP = document.createElement('p');
    nameP.className = 'location-name';
    nameP.textContent = location.name_location;
    detailsDiv.appendChild(nameP);

    // Adresse
    const addressP = document.createElement('p');
    addressP.className = 'location-address';
    addressP.textContent = location.adress_location;
    detailsDiv.appendChild(addressP);

    // Jour et horaires
    const timeP = document.createElement('p');
    timeP.className = 'location-time';
    let horaires = location.day_location ? location.day_location : '';
    if (location.time_start_location) {
        horaires += ` ${location.time_start_location}`;
        if (location.time_end_location) {
            horaires += ` - ${location.time_end_location}`;
        }
    }
    timeP.textContent = horaires.trim();
    detailsDiv.appendChild(timeP);

    infoContainer.appendChild(detailsDiv);
    div.appendChild(infoContainer);

    return div;
}

export function clearOrderCard() {
    const orderCard = document.querySelector('.order-card');
    if (orderCard) {
        orderCard.replaceChildren();// Méthode pratique on remplace le contenu par rien pour le vider de façon sure.
    }
}

function createBasketTable(basket) {
    // Création du conteneur scrollable
    const div = document.createElement('div');
    div.className = "basket-table-container";

    // Création du tableau
    const table = document.createElement('table');
    table.className = 'basket-table';

    // En-tête
    const thead = document.createElement('thead');
    const trHead = document.createElement('tr');
    ['Quantité', 'Produit', 'Prix unitaire (€)', 'Total produit (€)'].forEach(text => {
        const th = document.createElement('th');
        th.innerText = text;
        trHead.appendChild(th);
    });
    thead.appendChild(trHead);
    table.appendChild(thead);

    // Corps du tableau
    const tbody = document.createElement('tbody');
    let total = 0;
    basket.forEach(item => {
        const tr = document.createElement('tr');

        const tdQty = document.createElement('td');
        tdQty.innerText = item.quantity;
        tr.appendChild(tdQty);

        const tdName = document.createElement('td');
        tdName.innerText = item.name_product;
        tr.appendChild(tdName);

        const tdPrice = document.createElement('td');
        tdPrice.innerText = Number(item.price).toFixed(2);
        tr.appendChild(tdPrice);

        const subtotal = item.quantity * item.price;
        const tdSubtotal = document.createElement('td');
        tdSubtotal.innerText = subtotal.toFixed(2);
        tr.appendChild(tdSubtotal);

        total += subtotal;
        tbody.appendChild(tr);
    });
    table.appendChild(tbody);

    // Pied du tableau (total)
    const tfoot = document.createElement('tfoot');
    const trFoot = document.createElement('tr');

    const tdEmpty = document.createElement('td');
    tdEmpty.colSpan = 3;
    tdEmpty.style.textAlign = 'right';
    tdEmpty.style.fontWeight = 'bold';
    tdEmpty.innerText = 'Total :';
    trFoot.appendChild(tdEmpty);

    const tdTotal = document.createElement('td');
    tdTotal.style.fontWeight = 'bold';
    tdTotal.innerText = total.toFixed(2) + ' € TTC';
    trFoot.appendChild(tdTotal);

    tfoot.appendChild(trFoot);
    table.appendChild(tfoot);

    // Ajoute le tableau à la div
    div.appendChild(table);
    return div;
}

export function displayFirstStep(basket) {
    const orderCard = document.querySelector('.order-card');
    if (!orderCard) return;

    // Titre
    const h2 = document.createElement('h2');
    h2.innerText = 'Récapitulatif de votre commande :';
    orderCard.appendChild(h2);

    // Ajoute le tableau réutilisable
    orderCard.appendChild(createBasketTable(basket));
}

export function displaySecondStep(repetitionNbr) {
    const orderCard = document.querySelector('.order-card');
    if (!orderCard) return;

    // Titre
    const h2 = document.createElement('h2');
    h2.innerText = 'Choix du nombre de répétition :';
    orderCard.appendChild(h2);

    // Conteneur des options
    const optionsContainer = document.createElement('div');
    optionsContainer.className = 'radio-options';

    // Création des boutons radio
    repetitions.forEach(opt => {
        const label = document.createElement('label');
        label.className = 'radio-option';
        
        const input = document.createElement('input');
        input.type = 'radio';
        input.name = 'repetition'; // Même nom pour le groupe
        input.id = opt.id;
        input.value = opt.value;
        if(Number(input.value) === repetitionNbr){
            input.checked = true;
        }
        
        const span = document.createElement('span');
        span.className = 'radio-custom';
        span.innerText = opt.label;

        label.appendChild(input);
        label.appendChild(span);
        optionsContainer.appendChild(label);
    });

    orderCard.appendChild(optionsContainer);
}

export function displayThirdStep(locations, locationId) {
    const orderCard = document.querySelector('.order-card');
    if (!orderCard) return;
    
    // Phrase d'avertissement
    const p = document.createElement('p');
    p.className = 'important';
    p.innerText = "La commande doit être faite au moins 48 heures précèdent le jour et le lieu de collecte. Sinon la commande ne commencera qu'à partir de ce même créneaux mais la semaine suivante."
    orderCard.appendChild(p);

    // Titre principal
    const h2 = document.createElement('h2');
    h2.innerText = "Choix du lieu de collecte :";
    orderCard.appendChild(h2);


    // Ordre des jours de la semaine
    const joursOrdre = [
        "Lundi", "Mardi", "Mercredi", "Jeudi", "Vendredi", "Samedi", "Dimanche"
    ];

    // Grouper les locations par jour
    const locationsByDay = {};
    locations.forEach(loc => {
        if (!locationsByDay[loc.day_location]) {
            locationsByDay[loc.day_location] = [];
        }
        locationsByDay[loc.day_location].push(loc);
    });

    // Conteneur principal
    const optionsContainer = document.createElement('div');
    optionsContainer.className = 'radio-options';

    // Pour chaque jour dans l'ordre voulu
    joursOrdre.forEach(jour => {
        if (locationsByDay[jour]) {
            // Titre du jour
            const h3 = document.createElement('h3');
            h3.innerText = jour;
            h3.className = 'location-day-title';
            optionsContainer.appendChild(h3);

            // Affichage des options du jour
            locationsByDay[jour].forEach(loc => {
                const label = document.createElement('label');
                label.className = 'radio-option location-option';

                // Input radio
                const input = document.createElement('input');
                input.type = 'radio';
                input.name = 'location';
                input.value = loc.id_location;
                if(Number(input.value) === locationId){
                    input.checked = true;
                }

                // Image du lieu
                const img = document.createElement('img');
                img.src = loc.url_image;
                img.alt = loc.name_image || loc.name_location;
                img.className = 'location-img';

                // Infos du lieu
                const infoDiv = document.createElement('div');
                infoDiv.className = 'location-info';

                // Nom du lieu
                const title = document.createElement('span');
                title.className = 'location-title';
                title.innerText = loc.name_location;

                // Adresse
                const address = document.createElement('span');
                address.className = 'location-address';
                address.innerText = loc.adress_location;

                // Horaires
                const time = document.createElement('span');
                time.className = 'location-time';
                let horaires = `${loc.time_start_location || ''}`;
                if (loc.time_end_location) {
                    horaires += ` - ${loc.time_end_location}`;
                }else {
                    horaires = `A partir de ${loc.time_start_location}`;
                }
                time.innerText = horaires;

                // Ajout des infos dans infoDiv
                infoDiv.appendChild(title);
                infoDiv.appendChild(address);
                infoDiv.appendChild(time);

                // Assemblage de l'option
                label.appendChild(input);
                label.appendChild(img);
                label.appendChild(infoDiv);

                optionsContainer.appendChild(label);
            });
        }
    });
    orderCard.appendChild(optionsContainer);
}

export function displayFinalStep(orderData) {
    const orderCard = document.querySelector('.order-card');
    if (!orderCard) return;

    const h2 = document.createElement('h2');
    h2.innerText = 'Récapitulatif final de votre commande : ';
    orderCard.appendChild(h2);
    
    const elementRepetition = getRepetitionPhraseElement(orderData.repetition);
    orderCard.appendChild(elementRepetition);

    const elementLocation = getLocationElement(orderData.locationContent);
    orderCard.appendChild(elementLocation);

    // Ajoute le tableau du panier
    orderCard.appendChild(createBasketTable(orderData.basket));
}