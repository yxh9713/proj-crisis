<?php require_once APP_PATH.'Views/header.php'; ?>

<!--Vertical Navigation-->
<?php require_once APP_PATH.'Views/sidebar.php'; ?>

<!--DISCUSSION-->
<div class="closebtn" onclick="closeNav()">
  <!-- SPACE:start-->
  <div class="space"></div><div class="space"></div>
  <!--SPACE:end-->
  <div class="grid grid-pad">
    <div class="col-1-9">
      <div class="content"></div>
    </div>
    <div class="col-1-9">
      <div class="content"></div>
    </div>
    <div class="col-7-12 mobile-col-1-1">
      <div class="content">
        <div class="container">
          <form id="contactForm" action="/email/send" method="POST">
            <table>
              <tr>
                <td>Email: </td>
                <td><input type="email" name="femail" size="85" value=""></td>
              </tr>
            </table>
            <p>
            <table>
              <tr>
                <td>Country: </td>
                <td><input type="text" name="scountry" size="80" value=""></td>
              </tr>
            </table>
            <p>
            <table>
              <tr>
                <td>
                  <p>Subject:<br />
                    <textarea name="fsendmail" ROWS="10" COLS="100"></textarea>
                </td>
              </tr>
              <tr>
                <td align="right"><input type="submit" value="Submit">
                </td>
              </tr>
            </table>
          </form>
          <div id="alert" class="alert"></div>
        </div>
      </div>
    </div>
  </div>
</div>

<div class="border"></div><br />

<script type="text/javascript">
  $(document).ready(function() {
    $("#contactForm").on("submit", function(e) {
      e.preventDefault();

      $.ajax({
        url: "/email/send",
        type: "POST",
        cache: false,
        data: $("#contactForm").serialize(),
        error: function(error) {
          $("#alert").text("Fail to send youe message.").delay(3000).fadeOut();
        },
        success: function(response) {
          if(response.status) {
            $("#alert").html("You message has been sent.").show().delay(3000).fadeOut();
            $("input[type=text], input[type=email], textarea").val('');
          } else {
            $("#alert").text(response.message).delay(3000).fadeOut();
          }
        }
      });    
    });
  });

</script>




<!--FOOTER-->
<?php require_once APP_PATH.'Views/footer.php'; ?>