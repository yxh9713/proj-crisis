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
    var self = $(this);
    var data = $(this).serialize();
    $.ajax({
      url: "/discussion/post",
      type: "POST",
      cache: false,
      data: data,
      error: function(error) {
        $("#alert").text("Error: Fail to submit comment.").delay(3000).fadeOut();
      },
      success: function(response) {
        if(response.status) {
          self.find("input[type=text],input[type=email], textarea").val('');
          $("#alert").text("Your comment has been submitted.").show().delay(3000).fadeOut();
        } else {
          $("#alert").text("Error: Fail to submit comment.").show().delay(3000).fadeOut();
        }
      }
    });

  });



});