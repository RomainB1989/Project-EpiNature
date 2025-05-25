// Règles de syntaxe (identiques à formularyCreate.js)
const regexName = /^[-a-zA-Z]{1,100}$/;// Lettres ou tiret, max 100 caractères
const regexMail = /^[-a-zA-Z0-9.%+]+@[-a-zA-Z0-9.]+\.[a-z]{2,10}$/;
const regexPhone = /^\+?0[0-9]{9}$/;
const regexPassword = /^[-A-Za-z0-9$&+,:;=?@#.*%]{10,30}$/;

// Récupération des éléments du formulaire de mise à jour
const formUpdate = document.querySelector("#update");
const updateLastname = formUpdate.querySelector("#lastname");
const updateFirstname = formUpdate.querySelector("#firstname");
const updateEmail = formUpdate.querySelector("#email");
const updatePhone = formUpdate.querySelector("#phone");
const updatePassword = formUpdate.querySelector("#passwordUpdate");
const updatePassword2 = formUpdate.querySelector("#updateConfirm");

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
updateLastname.addEventListener("keyup", () => checkRegex(updateLastname, regexName));
updateFirstname.addEventListener("keyup", () => checkRegex(updateFirstname, regexName));
updateEmail.addEventListener("keyup", () => checkRegex(updateEmail, regexMail));
if(updatePhone){
    updatePhone.addEventListener("keyup", () => checkRegex(updatePhone, regexPhone));
}

// Validation du mot de passe uniquement si champ non vide (optionnel)
updatePassword.addEventListener("keyup", function() {
    if(updatePassword.value.length === 0) {
        updatePassword.style.backgroundColor = ""; // pas de couleur si vide
    } else {
        checkRegex(updatePassword, regexPassword);
    }
});
updatePassword2.addEventListener("keyup", function(){
    if(updatePassword2.value.length === 0) {
        updatePassword2.style.backgroundColor = "";
    } else if(regexPassword.test(updatePassword2.value) && checkpassword(updatePassword, updatePassword2)){
        updatePassword2.style.backgroundColor = "#90ee90";
    } else {
        updatePassword2.style.backgroundColor = "#FF7276";
    }
});