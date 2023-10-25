window.onload = function() {
	var images = document.querySelectorAll("#tache");
	for (var i = 0; i < images.length; i++) {
	  (function(index) {
		setTimeout(function() {
		  // images[index].classList.remove("hidden");
		  images[index].classList.add("visible");
		}, 400 * index);
	  })(i);
	}
  };

let menuBtn = document.querySelector('.menu-btn');
let menu = document.querySelector('.nav');
let menuItem = document.querySelectorAll('.nav__link');

menuBtn.addEventListener('click', function(){
	menuBtn.classList.toggle('active');
	menu.classList.toggle('active');
})





