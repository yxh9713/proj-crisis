$(document).ready(function () {

  $('#sidebarCollapse').on('click', function () {
    $('#sidebar, #content').toggleClass('active');
    $('.collapse.in').toggleClass('in');
    $('a[aria-expanded=true]').attr('aria-expanded', 'false');
  });

  $("#new-country").on("submit", function(e) {
    e.preventDefault();

    $.ajax({
      url: "/admin/countries/post",
      type: "POST",
      cache: false,
      data: $("#new-country").serialize(),
      beforeSend: function() {
        // console.log($("#new-country").serialize());
      },
      error: function(error) {
        popAlert('Fail to create a country', 'alert-danger');
      },
      success: function(response) {
        if(response.status) {
          popAlert('The country has been created', 'alert-success');
          $("input[type=text]").val('');
        } else {
          popAlert('Fail to create a country.', 'alert-danger');
        }
      }
    });    
  });

  $(".btn-save").on("click", function() {
    var $field = $(this).parent().siblings("input");
    var countryName = $.trim( $field.val() );
    var data = {country: countryName, id: $field.attr('ref')};

    $.ajax({
      url: "/admin/countries/update",
      type: "POST",
      cache: false,
      data: data,
      beforeSend: function() {
        if(!countryName) {
          popAlert('Country name is required.', 'alert-danger');
          return false;
        }
      },
      error: function(error) {
        popAlert('Fail to update the country.', 'alert-danger');
      },
      success: function() {
        popAlert('The country has been updated.', 'alert-success');
        window.location.href = window.location.href;
      }
    });
  });

  $(".btn-delete").on("click", function() {
    var $field = $(this).parent().siblings("input");
    $.ajax({
      url: "/admin/countries/delete",
      type: "POST",
      cache: false,
      data: {id: $field.attr('ref')},
      error: function(error) {
        popAlert('Fail to delete the country.', 'alert-danger'); 
      },
      success: function(response) {
        if(response.status) {
          popAlert('The country has been deleted.', 'alert-success');
          $field.parent().remove();
        } else {
          popAlert('Fail to delete a country.', 'alert-danger');
        }
      }
    });
  });

  $(".close-alert").on("click", function() {
    $("#alert").hide();
  });

  $(".date").datepicker({
    dateFormat: "yy-mm-dd",
    changeMonth: true,
    changeYear: true
  });

  $("#new-event").on("submit", function(e) {
    e.preventDefault();

    $.ajax({
      url: "/admin/events/post",
      type: "POST",
      cache: false,
      data: $("#new-event").serialize(),
      error: function(error) {
        popAlert('Fail to create an event.', 'alert-danger'); 
      },
      success: function(response) {
        if(response.status) {
          popAlert('The event has been created', 'alert-success');
          $("#new-event input, #new-event textarea").val('');
        } else {
          popAlert('Fail to create an event.', 'alert-danger');
        }
      }
    });    
  });

  $(".btn-save-event").on("click", function() {
    var $field = $(this).parent().parent();
    var data = {
      id: $field.attr('ref'),
      subhead: $field.find("input[name=subhead]").val(),
      date: $field.find("input[name=date]").val(),
      description: $field.find("textarea[name=description]").val(),
      country: $("#country option:selected").val()
    }

    $.ajax({
      url: "/admin/events/update",
      type: "POST",
      cache: false,
      data: data,
      error: function(error) {
        popAlert('Fail to update the event.', 'alert-danger');
      },
      success: function(response) {
        if(response.status) {
          popAlert('The event has been updated.', 'alert-success');
        } else {
          popAlert('Fail to update an event.', 'alert-danger');
        }
      }
    });
  });

  $(".btn-delete-event").on("click", function() {
    var $field = $(this).parent().parent();
    $.ajax({
      url: "/admin/events/delete",
      type: "POST",
      cache: false,
      data: {id: $field.attr('ref')},
      error: function(error) {
        popAlert('Fail to delete the event.', 'alert-danger');
      },
      success: function(response) {
        if(response.status) {
          popAlert('The event has been deleted.', 'alert-success');
          $field.remove();
        } else {
          popAlert('Fail to delete the event.', 'alert-danger');
        }
      }
    });
  });

  $("#country").on("change", function() {
    window.location.replace('/admin/events/'+$(this).val()+'/edit');
  })

});

function popAlert( message, className ) {
  $("#message").text(message);
  $("#alert").removeClass().addClass("alert collapse").addClass(className).show();
}