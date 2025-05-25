// Règles de syntaxe
const regexName = /^[-a-zA-Z]{1,100}$/;// Lettres ou tiret, max 100 caractères
const regexMail = /^[-a-zA-Z0-9.%+]+@[-a-zA-Z0-9.]+\.[a-z]{2,10}$/;
const regexPhone = /^\+?0[0-9]{9}$/;
const regexPassword = /^[-A-Za-z0-9$&+,:;=?@#.*%]{10,30}$/;

// Récupération des éléments
const formCreate = document.querySelector("#create");
const createNom = formCreate.querySelector("#firstname");
const createPrenom = formCreate.querySelector("#lastname");
const createPhone = formCreate.querySelector("#tel");
const createEmail = formCreate.querySelector("#email");
const createPassword = formCreate.querySelector("#passwordCreate");
const createPassword2 = formCreate.querySelector("#createConfirm");

// Fonctions utilitaires
function checkRegex(element, regex){
    if(regex.test(element.value)){
        element.style.backgroundColor = "#90ee90";
    } else {
        element.style.backgroundColor = "#FF7276";
    }
}
function checkpassword(password1, password2){
    return password1.value === password2.value;
}

// Écouteurs d'événements
createNom.addEventListener("keyup", () => checkRegex(createNom, regexName));
createPrenom.addEventListener("keyup", () => checkRegex(createPrenom, regexName));
if(createPhone){
    createPhone.addEventListener("keyup", () => checkRegex(createPhone, regexPhone));
}
createEmail.addEventListener("keyup", () => checkRegex(createEmail, regexMail));
createPassword.addEventListener("keyup", () => checkRegex(createPassword, regexPassword));
createPassword2.addEventListener("keyup", function(){
    if(regexPassword.test(createPassword2.value) && checkpassword(createPassword, createPassword2)){
        createPassword2.style.backgroundColor = "#90ee90";
    } else {
        createPassword2.style.backgroundColor = "#FF7276";
    }
});

//  l'instant je gere coté serveur le formulaire pas coté client avec API vers serveur
/*formCreate.addEventListener("submit", function(e){
    // Validation finale ici
});*/