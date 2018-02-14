function openNav() {
  document.getElementById("mySidenav").style.width = "245px";
  document.getElementById("main").style.marginLeft = "245px";
}
  
function closeNav() {
  document.getElementById("mySidenav").style.width = "0";
}

var shiftWindow = function() { scrollBy(0, -80) };
window.addEventListener("hashchange", shiftWindow);

function load() { 
  if (window.location.hash) shiftWindow(); 
}

function myFunction() {
  var x = document.getElementById("myTopnav");
  if (x.className === "topnav") {
    x.className += " responsive";
  } else {
    x.className = "topnav";
  }
}

$(document).ready(function() {
  try {
    $selectedNav = $('#country-'+id);
    $("#mySidenav").scrollTop($selectedNav.offset().top - 60);
  } catch(e) {
    // console.log(e);
  }

  /**
   * Discussion form
   */
  $("#commentform").on("submit", function(e) {
    e.preventDefault();
    console.log('dis form', $(this).serialize());
  });



});