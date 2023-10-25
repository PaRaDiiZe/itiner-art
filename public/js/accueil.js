window.addEventListener("scroll", function() {
  var image1 = document.querySelector(".tache-presentation");
  var section1 = document.querySelector(".section-Presentation");
  if (image1 && section1) {
    var position1 = section1.getBoundingClientRect().top;
    var windowHeight = window.innerHeight;
    if (position1 < windowHeight * 0.5) {
      image1.classList.add("visible");
    }
  }
  var image2 = document.querySelector(".tache-oeuvres");
  var section2 = document.querySelector(".section-Oeuvres");
  if (image2 && section2) {
    var position2 = section2.getBoundingClientRect().top;
    var windowHeight = window.innerHeight;
    if (position2 < windowHeight * 0.5) {
      image2.classList.add("visible");
    }
  }
});




const carouselImages = document.querySelector('.carousel__images');
const carouselButtons = document.querySelectorAll('.carousel__button');
console.log(carouselButtons);

const numberOfImages = document.querySelectorAll('.carousel__images img').length;
let imageIndex = 1;
let translateX = 0;

carouselButtons.forEach(button => {
    console.log('coucou')
  button.addEventListener('click', (event) => {

    if (event.target.id === 'previous') {
      if (imageIndex !== 1) {
        imageIndex--;
        translateX += 300;
      }
    } else {
      if (imageIndex !== numberOfImages) {
        imageIndex++;
        translateX -= 300;
      }
    }
    
    carouselImages.style.transform = `translateX(${translateX}px)`;
  });
});


