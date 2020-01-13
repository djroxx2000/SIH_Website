//carousel elements
const track = document.querySelector('.carousel__track');
const slides = Array.from(track.children);
const nextButton = document.querySelector('.carousel__button--next');
const prevButton = document.querySelector('.carousel__button--prev');
const dotsNav = document.querySelector('.carousel__nav');
const dots = Array.from(dotsNav.children);

//carousel buttons
const client_btn = document.getElementById('client-btn');
const lawyer_btn = document.getElementById('lawyer-btn');
const admin_btn = document.getElementById('admin-btn');

//Carousel properties
const slideWidth = slides[0].getBoundingClientRect().width;

slides.forEach((slide, index) => {
    slide.style.left = slideWidth * index + 'px';
})

const moveToSlide = (targetSlide, currentSlide) => {
    track.style.transform = 'translateX(-' + targetSlide.style.left + ')';
    currentSlide.classList.remove('current-slide');
    targetSlide.classList.add('current-slide');
};

const removeStyle = (targetSlide, currentSlide, targetDot, currentDot, targetIndex) => {
    currentSlide.classList.remove('current-slide');
    targetSlide.classList.add('current-slide');
    currentDot.classList.remove('current-slide');
    targetDot.classList.add('current-slide');
    if (targetIndex === 0) {
        prevButton.classList.add('hide');
        nextButton.classList.remove('hide');

    } else if (targetIndex === slides.length - 1) {
        nextButton.classList.add('hide');
        prevButton.classList.remove('hide');
    } else {
        prevButton.classList.remove('hide');
        nextButton.classList.remove('hide');
    }
}

//move right with nextButton
nextButton.addEventListener('click', e => {
    const currentSlide = track.querySelector('.current-slide');
    const nextSlide = currentSlide.nextElementSibling;
    const currentDot = dotsNav.querySelector('.current-slide');
    const targetIndex = dots.findIndex(dot => dot === currentDot) + 1;
    const targetDot = dots[targetIndex];

    moveToSlide(nextSlide, currentSlide);
    if (!targetDot) return;

    removeStyle(nextSlide, currentSlide, targetDot, currentDot, targetIndex);

});

//move left with prevButton
prevButton.addEventListener('click', e => {
    const currentSlide = track.querySelector('.current-slide');
    const prevSlide = currentSlide.previousElementSibling;
    const currentDot = dotsNav.querySelector('.current-slide');
    const targetIndex = dots.findIndex(dot => dot === currentDot) - 1;
    const targetDot = dots[targetIndex];

    moveToSlide(prevSlide, currentSlide);
    if (!targetDot) return;

    removeStyle(prevSlide, currentSlide, targetDot, currentDot, targetIndex);
});

//Bottom dots navigation movement
dotsNav.addEventListener('click', e => {
    //which button was clicked on
    const targetDot = e.target.closest('button');
    if (!targetDot) return;

    const currentSlide = track.querySelector('.current-slide');
    const currentDot = dotsNav.querySelector('.current-slide');
    const targetIndex = dots.findIndex(dot => dot === targetDot);
    const targetSlide = slides[targetIndex];

    moveToSlide(targetSlide, currentSlide);
    currentDot.classList.remove('current-slide');
    targetDot.classList.add('current-slide');

    removeStyle(targetSlide, currentSlide, targetDot, currentDot, targetIndex);

});


// Accordion
var acc = document.getElementsByClassName("accordion");
var i;

for (i = 0; i < acc.length; i++) {
  acc[i].addEventListener("click", function() {
    this.classList.toggle("active");
    var panel = this.nextElementSibling;
    if (panel.style.maxHeight) {
      panel.style.maxHeight = null;
    } else {
      panel.style.maxHeight = panel.scrollHeight + "px";
    }
  });
}

// hiding the buttons on carousel
const client_btn2 = document.getElementById('client-btn');
const lawyer_btn2 = document.getElementById('lawyer-btn');
const admin_btn2 = document.getElementById('admin-btn');


function admin_form() {
    lawyer_btn.classList.add("hide");
}
