const iconBurger = document.querySelector("#icon-burger");
const iconBasket = document.querySelector("#icon-basket");
const menuBurger = document.querySelector(".menu-burger");
const basket = document.querySelector(".basket");
const overlay = document.querySelector(".overlay");


function changeIcon(icon, typeIcon){
  // console.log(icon);
  // if(icon.src == `/Images/Icon-Menu-${typeIcon}.png`)
  // {
  //   icon.src = "/Images/Icon-Menu-Close.png";
  // }
  // else if(icon.src == "*/Images/Icon-Menu-Close.png"){
  //   icon.src = `/Images/Icon-Menu-${typeIcon}.png`;
  // }

  icon.src = icon.src.includes(`/Images/Icon-Menu-${typeIcon}.png`) 
  ? `/Images/Icon-Menu-Close.png` 
  : `/Images/Icon-Menu-${typeIcon}.png`;

}

iconBurger.addEventListener('click', function() {
  changeIcon(iconBurger, "Burger");
  menuBurger.classList.toggle('active');
});

iconBasket.addEventListener('click', function() {
  changeIcon(iconBasket, "Basket");
  basket.classList.toggle('active');
});