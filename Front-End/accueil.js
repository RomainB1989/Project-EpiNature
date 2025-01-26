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
  //

  //Ternaire pour transformer l'icone du bouton selectionné.
  icon.src = icon.src.includes(`/Images/Icon-Menu-${typeIcon}.png`) 
  ? `/Images/Icon-Menu-Close.png` 
  : `/Images/Icon-Menu-${typeIcon}.png`;

}

iconBurger.addEventListener('click', function() {
  if(basket.classList.contains('active'))
  {
    basket.classList.remove('active');
    changeIcon(iconBasket, "Basket");
  }
  menuBurger.classList.toggle('active');
  changeIcon(iconBurger, "Burger");
});

iconBasket.addEventListener('click', function() {
  if(menuBurger.classList.contains('active'))
    {
      menuBurger.classList.remove('active');
      changeIcon(iconBurger, "Burger");
    }
    basket.classList.toggle('active');
    changeIcon(iconBasket, "Basket");
});