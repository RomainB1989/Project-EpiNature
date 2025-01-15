const regexName = /^[A-Za-z]{1,20}$/;
const regexMail = /^[a-z0-9._-]+@[a-z0-9._-]+\.[a-z]{2,6}$/;
const regexPhone = /^\+?[0]{1}[0-9]{9}$/;
const regexPassword = /^[A-Za-z0-9$&+,:;=?@#|'<>.-^*()%!]{10,30}$/;

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


function checkRegex(elementToChange, regex){
    console.log(elementToChange.value, regex);
    if(regex.test(elementToChange.value)){
        elementToChange.style.backgroundColor = "#90ee90";
    } else {
        elementToChange.style.backgroundColor = "#FF7276";
    }
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
    // console.log(createPrenom.value);
    // if(regexName.test(createPrenom.value)){
    //     createPrenom.style.backgroundColor = "green";
    // } else {
    //     createPrenom.style.backgroundColor = "red";
    // }
});

createPhone.addEventListener("keyup", function(){
    console.log(createPhone.value);
    if(regexPhone.test(createPhone.value)){
        createPhone.style.backgroundColor = "green";
    } else {
        createPhone.style.backgroundColor = "red";
    }
});

createEmail.addEventListener("keyup", function(){
    console.log(createEmail.value);
    if(regexMail.test(createEmail.value)){
        createEmail.style.backgroundColor = "green";
    } else {
        createEmail.style.backgroundColor = "red";
    }
});

createPassword.addEventListener("keyup", function(){
    console.log(createPassword.value);
    if(regexPassword.test(createPassword.value)){
        createPassword.style.backgroundColor = "green";
    } else {
        createPassword.style.backgroundColor = "red";
    }
});

function checkpassword(){
    console.log(createPassword.value, createPassword2.value);
    if(createPassword.value == createPassword2.value){
        return true;
    }
    return false;
}

createPassword2.addEventListener("keyup", function(){
    console.log(createPassword2.value);
    if(regexPassword.test(createPassword2.value) && checkpassword()){
        createPassword2.style.backgroundColor = "green";
    } else {
        createPassword2.style.backgroundColor = "red";
    }
});


connectEmail.addEventListener("keyup", function(){
    console.log(connectEmail.value);
    if(regexMail.test(connectEmail.value)){
        connectEmail.style.backgroundColor = "green";
    } else {
        connectEmail.style.backgroundColor = "red";
    }
});

connectPassword.addEventListener("keyup", function(){
    console.log(connectPassword.value);
    if(regexPassword.test(connectPassword.value)){
        connectPassword.style.backgroundColor = "green";
    } else {
        connectPassword.style.backgroundColor = "red";
    }
});

connectPassword2.addEventListener("keyup", function(){
    console.log(connectPassword2.value);
    if(regexPassword.test(connectPassword2.value) && checkpassword()){
        connectPassword2.style.backgroundColor = "green";
    } else {
        connectPassword2.style.backgroundColor = "red";
    }
});


formCreate.addEventListener("submit", function(){
   
});

formConnect.addEventListener("submit", function(){
    
});