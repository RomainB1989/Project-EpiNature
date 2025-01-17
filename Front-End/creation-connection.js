// Règle de syntaxe des différents champ de text des formulaires
const regexName = /^[A-Za-z]{1,20}$/;
const regexMail = /^[a-z0-9._-]+@[a-z0-9._-]+\.[a-z]{2,6}$/;
const regexPhone = /^\+?[0]{1}[0-9]{9}$/;
const regexPassword = /^[A-Za-z0-9$&+,:;=?@#|'<>.-^*()%!]{10,30}$/;

// Récupération des éléments de champ de texte des formulaires
const formCreate = document.querySelector("#create");
const createNom = formCreate.querySelector("#nom");
const createPrenom = formCreate.querySelector("#prenom");
const createPhone= formCreate.querySelector("#tel");
const createEmail = formCreate.querySelector("#email");
const createPassword = formCreate.querySelector("#passwordCreate");
const createPassword2 = formCreate.querySelector("#createConfirm");

const formConnect = document.querySelector("#connect");
const connectEmail = formConnect.querySelector("#emailConnect");
const connectPassword = formConnect.querySelector("#passwordConnect");
const connectPassword2 = formConnect.querySelector("#connectConfirm");


/**
 * Fonction qui check un élément champ de texte avec la règle de syntaxe associé
 *
 * @param {*} elementToChange 
 * @param {*} regex 
 */
function checkRegex(elementToChange, regex){
    console.log(elementToChange.value, regex);
    if(regex.test(elementToChange.value)){
        elementToChange.style.backgroundColor = "#90ee90";
    } else {
        elementToChange.style.backgroundColor = "#FF7276";
    }
}

/**
 * Fonction qui test si les deux password sont les meme.
 *
 * @param {*} password1 
 * @param {*} password2 
 * @returns 
 */
function checkpassword(password1, password2){
    if(password1.value == password2.value){
        return true;
    }
    return false;
}

createNom.addEventListener("keyup", function(){
    checkRegex(createNom, regexName);
    // if(regexName.test(createNom.value)){
    //     createNom.style.backgroundColor = "green";
    // } else {
    //     createNom.style.backgroundColor = "red";
    // }
});

createPrenom.addEventListener("keyup", function(){
    checkRegex(createPrenom, regexName);
});

createPhone.addEventListener("keyup", function(){
    checkRegex(createPhone, regexPhone);
});

createEmail.addEventListener("keyup", function(){
    checkRegex(createEmail, regexMail);
});

createPassword.addEventListener("keyup", function(){
    checkRegex(createPassword, regexPassword);
});

function checkpassword(password1, password2){
    if(password1.value == password2.value){
        return true;
    }
    return false;
}

createPassword2.addEventListener("keyup", function(){
    if(regexPassword.test(createPassword2.value) && checkpassword(createPassword, createPassword2)){
        createPassword2.style.backgroundColor = "#90ee90";
    } else {
        createPassword2.style.backgroundColor = "#FF7276";
    }
});


connectEmail.addEventListener("keyup", function(){
    checkRegex(connectEmail, regexMail);
});

connectPassword.addEventListener("keyup", function(){
    checkRegex(connectPassword, regexPassword);
});

connectPassword2.addEventListener("keyup", function(){

    if(regexPassword.test(connectPassword2.value) && checkpassword(connectPassword,connectPassword2)){
        connectPassword2.style.backgroundColor = "#90ee90";
    } else {
        connectPassword2.style.backgroundColor = "#FF7276";
    }
});


formCreate.addEventListener("submit", function(){
   
});

formConnect.addEventListener("submit", function(){
    
});