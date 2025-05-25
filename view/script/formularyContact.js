// Règle de syntaxe des différents champ de text des formulaires
const regexName = /^[-a-zA-Z]{1,100}$/;// Lettres ou tiret, max 100 caractères
const regexMail = /^[-a-zA-Z0-9.%+]+@[-a-zA-Z0-9.]+\.[a-z]{2,10}$/;

const formContact = document.querySelector("#contact");
const contactNom = formContact.querySelector("#nomContact");
const contactEmail = formContact.querySelector("#emailContact");

//console.log(contactNom, contactEmail);

/**
 * Fonction qui check un élément champ de texte avec la règle de syntaxe associé
 *
 * @param {*} elementToChange 
 * @param {*} regex 
 */
function checkRegex(elementToChange, regex){
    //console.log(elementToChange.value, regex);
    if(regex.test(elementToChange.value)){
        elementToChange.style.backgroundColor = "#90ee90";
    } else {
        elementToChange.style.backgroundColor = "#FF7276";
    }
}

contactNom.addEventListener("keyup", function(){
    checkRegex(contactNom, regexName);
});

contactEmail.addEventListener("keyup", function(){
    checkRegex(contactEmail, regexMail);
});
