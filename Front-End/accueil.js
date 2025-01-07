const iconAccount = document.getElementById("icon-account");
const iconBurger = document.getElementById("icon-burger");
const iconBasket = document.getElementById("icon-basket");


iconAccount.addEventListener("click", function(){
  changeBlock(iconAccount.childNodes[3].className, 0);
});

iconBurger.addEventListener("click", function(){
  changeBlock(iconBurger.childNodes[3].className, 0);
});

iconBasket.addEventListener("click", function(){
  changeBlock(iconBasket.childNodes[3].className, 0);
});

function changeBlock(blockName, index) {
  var block = document.body.getElementsByClassName(blockName);

  if (block[index].style.display === "none") {
    block[index].style.display = "block";
  } else {
    block[index].style.display = "none";
  }
}