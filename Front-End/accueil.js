const iconBurger = document.querySelector("#icon-burger");
const iconBasket = document.querySelector("#icon-basket");
const menuBurger = document.querySelector(".menu-burger");

let classes = menuBurger.classList;
menuBurger.style.display = classes.value;

const basket = document.querySelector(".basket");

iconBurger.addEventListener("click", function(){
 
  console.log("J'ai Clické sur le menu burger");
  changeBlock(menuBurger);
});

iconBasket.addEventListener("click", function(){
  
  console.log("J'ai Clické sur le menu panier");
  changeBlock(basket);
});

function changeBlock(elementChange) {
  // elementChange.style.display = elementChange.style.display == "none" ? "block" : "none"; //Ternaire du click declick pseudo toggle.
  if (elementChange.style.display == "none") {
    elementChange.style.display = "block";
  } else {
    elementChange.style.display = "none";
  }
}