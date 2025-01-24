// Règle de syntaxe des différents champ de text des formulaires
const regexName = /^[A-Za-z]{1,20}$/;
const regexMail = /^[a-z0-9._-]+@[a-z0-9._-]+\.[a-z]{2,6}$/;

const formContact = document.querySelector("#contact");
const contactNom = formContact.querySelector("#nomContact");
const contactEmail = formContact.querySelector("#emailContact");

console.log(contactNom, contactEmail);

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

contactNom.addEventListener("keyup", function(){
    checkRegex(contactNom, regexName);
});

contactEmail.addEventListener("keyup", function(){
    checkRegex(contactEmail, regexMail);
});
