!(function(d){
  var itemClassName = "carousel__photo";
      items = d.getElementsByClassName(itemClassName),
      totalItems = items.length,
      slide = 0,
      moving = true;

  function setInitialClasses() {

    items[totalItems - 1].classList.add("prev");
    items[0].classList.add("active");
    items[1].classList.add("next");
  }

  // Set click events to navigation buttons

  function setEventListeners() {
    var next = d.getElementsByClassName('carousel__button--next')[0],
        prev = d.getElementsByClassName('carousel__button--prev')[0];

    next.addEventListener('click', moveNext);
    prev.addEventListener('click', movePrev);
  }

  // Disable interaction by setting 'moving' to true for the same duration as our transition (0.5s = 500ms)
  function disableInteraction() {
    moving = true;

    setTimeout(function(){
      moving = false
    }, 500);
  }

  function moveCarouselTo(slide) {

    // Check if carousel is moving, if not, allow interaction
    if(!moving) {

      // temporarily disable interactivity
      disableInteraction();

      // Preemptively set variables for the current next and previous slide, as well as the potential next or previous slide.
      var newPrevious = slide - 1,
          newNext = slide + 1,
          oldPrevious = slide - 2,
          oldNext = slide + 2;

      // Test if carousel has more than three items
      if ((totalItems - 1) > 3) {

        // Checks if the new potential slide is out of bounds and sets slide numbers
        if (newPrevious <= 0) {
          oldPrevious = (totalItems - 1);
        } else if (newNext >= (totalItems - 1)){
          oldNext = 0;
        }

        // Check if current slide is at the beginning or end and sets slide numbers
        if (slide === 0) {
          newPrevious = (totalItems - 1);
          oldPrevious = (totalItems - 2);
          oldNext = (slide + 1);
        } else if (slide === (totalItems -1)) {
          newPrevious = (slide - 1);
          newNext = 0;
          oldNext = 1;
        }

        items[oldPrevious].className = itemClassName;
        items[oldNext].className = itemClassName;

        // Add the new classes
        items[newPrevious].className = itemClassName + " prev";
        items[slide].className = itemClassName + " active";
        items[newNext].className = itemClassName + " next";
      }
    }
  }

  // Next navigation handler
  function moveNext() {

    // Check if moving
    if (!moving) {

      // If it's the last slide, reset to 0, else +1
      if (slide === (totalItems - 1)) {
        slide = 0;
      } else {
        slide++;
      }

      // Move carousel to updated slide
      moveCarouselTo(slide);
    }
  }

  // Previous navigation handler
  function movePrev() {

    // Check if moving
    if (!moving) {

      // If it's the first slide, set as the last slide, else -1
      if (slide === 0) {
        slide = (totalItems - 1);
      } else {
        slide--;
      }

      // Move carousel to updated slide
      moveCarouselTo(slide);
    }
  }

  // Initialise carousel
  function initCarousel() {
    setInitialClasses();
    setEventListeners();

    moving = false;
  }

  initCarousel();

}(document));

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
const client_btn = document.getElementById('client-btn');
const lawyer_btn = document.getElementById('lawyer-btn');
const admin_btn = document.getElementById('admin-btn');


function admin_form() {
    lawyer_btn.classList.add("hide");
}
