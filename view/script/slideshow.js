let slideIndex = 1; //Index par défault
showSlides(slideIndex); // Affichage par défault

// gestion de l'index de navigation des boutons Prev et NEXT
function changeSlides(n) {
  showSlides(slideIndex += n);
}

// gestion de l'index de navigation des boutons de type "dot"
function getSlide(n) {
  showSlides(slideIndex = n);
}

// fonction qui gère l'affichage des elements du 
// carroussel suivant l'index envoyer en paramètres
function showSlides(n) {
  let i;
  let slides = document.getElementsByClassName("mySlides");
  let dots = document.getElementsByClassName("dot");
  if (n > slides.length){
      slideIndex = 1;
    }
  if (n < 1){
    slideIndex = slides.length;
  }
  for (i = 0; i < slides.length; i++){
    slides[i].style.display = "none";
  }
  for (i = 0; i < dots.length; i++){
    dots[i].className = dots[i].className.replace(" active", "");
  }
  slides[slideIndex-1].style.display = "block";
  dots[slideIndex-1].className += " active";
}