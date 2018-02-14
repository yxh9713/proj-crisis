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
          <article class="hentry">
            <header>
              <h2 class="entry-title">
                <a href="/discussions" style="color: #F00;" rel="bookmark" title="Welcome to the Discussion">Welcome to the discussion</a>
              </h2>
            </header>
            </br>
            <footer class="post-info">
              <abbr class="published" title="2017-10-30T14:07:00-07:00">
              30th October 2017
              </abbr>
              <address class="vcard author">
                By <a class="url fn" href="about.shtml">Walter Bode</a>
              </address>
            </footer>
            <div class="entry-content">
              <p>This Discussion page is for any comments you have on the annotations, whether questions, opinions, or contribution to the topic. All comments are welcome!
              </p>
            </div>
          </article>

          <header>
            <h2></br>Comments</h2>
          </header>

          <div id="respond">
          <h3>Leave a Comment</h3>
            <form action="/discussion/post" method="post" id="commentform">
              <label for="comment_author" class="required">Your name*</label>
              <input type="text" name="comment_author" id="comment_author" value="" tabindex="1" required="required">
              <label for="email" class="required">Your email*</label>
              <input type="email" name="email" id="email" value="" tabindex="2" required="required">
              <label for="comment" class="required">Your Comment*</label>
              <textarea name="comment" id="comment" rows="10" tabindex="4"  required="required"></textarea>
              <input type="hidden" name="comment_post_ID" value="1" id="comment_post_ID" />
              <input name="submit" type="submit" value="Submit" />
            </form>
          </div>



        </div>
      </div>
    </div>
  </div>
</div>

<div class="border"></div><br />

<!--FOOTER-->
<?php require_once APP_PATH.'Views/footer.php'; ?>