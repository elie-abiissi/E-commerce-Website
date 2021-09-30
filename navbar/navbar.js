// Adding Variables
var navbar = document.getElementById("header");
var sticky = navbar.offsetTop;
var responsive = false;
var u = '<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"  viewBox="0 0 16 16">';
var p = '<path d="M2 16a2 2 0 0 1-2-2V2a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H2zm6.5-4.5V5.707l2.146 2.147a.5.5 0 0 0 .708-.708l-3-3a.5.5 0 0 0-.708 0l-3 3a.5.5 0 1 0 .708.708L7.5 5.707V11.5a.5.5 0 0 0 1 0z"/></svg>';
var d = '<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"  viewBox="0 0 16 16">';
var w = ' <path d="M2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2zm6.5 4.5v5.793l2.146-2.147a.5.5 0 0 1 .708.708l-3 3a.5.5 0 0 1-.708 0l-3-3a.5.5 0 1 1 .708-.708L7.5 10.293V4.5a.5.5 0 0 1 1 0z"/></svg>';
var icon = document.getElementsByClassName('icon')[0];
var container = document.getElementsByClassName('active')[0];
var nav = document.getElementById("myTopnav");

//End of Adding Variables



var navbar = document.getElementById("header");
var sticky = navbar.offsetTop;

$offset = $("#header").offset().top;

$(window).scroll(function(){
  if ($(window).scrollTop() >= $offset){
    $("#header").addClass("sticky");
   }
  else {
    $("#header").removeClass("sticky");
  }
});




function myNavBar() {
  var nav = document.getElementById("myTopnav");
  if (nav.className === "topnav") {
    responsive = true;
    nav.className += " responsive";
    document.getElementsByClassName('icon')[0].innerHTML = u + p;

  } else {
    nav.className = "topnav";
    responsive = false;
    document.getElementsByClassName('icon')[0].innerHTML = d + w;
  }

}

//End of Adding Functions



// Adding  EventListeners
icon.onmouseover = function () {
icon.style.color = 'white';

icon.style.cursor = 'pointer';
}

icon.onmouseout = function () {
  icon.style.color = '#17989D';

};

container.onmouseout = function () {
  icon.style.color = '#17989D';
}
container.onmouseover = function () {
  if (!responsive) icon.style.color = '#17989D';
  else icon.style.color = 'white';
}

container.onclick = function () {
  if (responsive) myNavBar();
}

//End of Adding  EventListeners