var slideIndex = 1;
var myIndex = 0;
var mybutton = document.getElementById("myBtn");
function scrollFunction() {
    if (document.body.scrollTop > 800 || document.documentElement.scrollTop > 800) {
      mybutton.style.display = "block";
    } else {
      mybutton.style.display = "none";
    }
  }

function topFunction() {
     window.scrollTo(0, 100);
  }

function showSlides(n) {
    var i;
    var slides = document.getElementsByClassName("mySlides");
    if (n > slides.length) { slideIndex = 1 }
    if (n < 1) { slideIndex = slides.length }
    for (i = 0; i < slides.length; i++) {
      slides[i].style.display = "none";
    }
    slides[slideIndex - 1].style.display = "block";
  }


  
  function carousel() {
    var x = document.getElementsByClassName("mySlides");
    for (var i = 0; i < x.length; i++) {
      x[i].style.display = "none";
    }
    if (myIndex === x.length) { myIndex = 0 }
    x[myIndex].style.display = "block";
    setTimeout(carousel, 5000); myIndex++;
  }
  
  function plusSlides(n) {
    showSlides(slideIndex += n);
  }
  
  function currentSlide(n) {
    showSlides(slideIndex = n);
  }

  carousel();
showSlides(slideIndex);

window.onscroll = function () {
    scrollFunction();
  };

