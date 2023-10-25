const containercard = document.querySelector('.container-card');
const img = containercard.querySelectorAll('img');

for (let i = 0; i < img.length; i++) {

    img[i].addEventListener('mouseover', function () {
        img[i].classList.add('opac');
    });

    img[i].addEventListener('mouseout', function () {
        img[i].classList.remove('opac');
    });
}