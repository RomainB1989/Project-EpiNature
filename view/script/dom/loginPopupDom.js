
export function showLoginPopup() {
    const loginPopupElement = document.getElementById('login-modal');

    console.log("Affichage Test Element DOM Popup\n");
    console.log(loginPopupElement);
    
    loginPopupElement.style.display = 'block';
}

export function closeLoginPopup() {
    const loginPopupElement = document.getElementById('login-modal');
    loginPopupElement.style.display = 'none';
}