const regexMail = /^[-a-zA-Z0-9.%+]+@[-a-zA-Z0-9.]+\.[a-z]{2,10}$/;
const regexPassword = /^[-A-Za-z0-9$&+,:;=?@#.*%]{10,30}$/;

const formConnect = document.querySelector("#connect");
const connectEmail = formConnect.querySelector("#emailConnect");
const connectPassword = formConnect.querySelector("#passwordConnect");

function checkRegex(element, regex){
    if(regex.test(element.value)){
        element.style.backgroundColor = "#90ee90";
    } else {
        element.style.backgroundColor = "#FF7276";
    }
}

connectEmail.addEventListener("keyup", () => checkRegex(connectEmail, regexMail));
connectPassword.addEventListener("keyup", () => checkRegex(connectPassword, regexPassword));

// Pour l'instant je gere coté serveur le formulaire pas coté client avec API vers serveur
/*
formConnect.addEventListener("submit", function(e){
    // Validation finale ici
});
*/