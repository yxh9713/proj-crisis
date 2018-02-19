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
            <div class="entry-content">
              <p>The Crisis Chronology welcomes comments and questions. Be aware that the Crisis Chronology attempts to be fact-based as much as possible in every respect. However, the Crisis Chronology is aware that every event in the world can be seen from multiple perspectives. Opinions are welcome if they add to the understanding of events, but please refrain from partisan politics for its own sake, attacks on others who comment, or offensive language of any kind. The Discussion Page is moderated, and inappropriate comments will be either edited or deleted without discussion. Whenever possible, identify the source of your information so that others can refer to it.</p>
            </div>
          </article>

          <header>
            <h2></br>Comments</h2>
          </header>

          <div>
            <ul class="comments">
            <?php foreach ($comments['data'] as $comment): ?>
              <li>
                <div class="published"><?php echo date('m/d/Y', strtotime($comment['create_at'])); ?></div>
                <address class="vcard author">
                  By <?php echo $comment['name']; ?>
                </address>
                <div class="entry-content">
                  <?php echo nl2br(htmlspecialchars($comment['comment'])); ?>
                </div>

              </li>
            <?php endforeach; ?>
            </ul>
          </div>

          <div>
            <ul class="pagination">
              <?php 
                for($i = 1 ; $i <= $comments['total'] ;$i++) {
                  $className = ($i == $page) ? 'active' : '';
                  echo '<li><a href="/discussion/page/'.$i.'" class="'.$className.'">' . $i . '</a></li>';
                }
              ?>
            </ul>
          </div>


          <div id="respond">
          <h3>Leave a Comment</h3>
            <form action="/discussion/post" method="post" id="commentform">
              <label for="comment_author" class="required">Your name*</label>
              <input type="text" name="comment_author" id="comment_author" value="" tabindex="1" required="required">
              <label for="email" class="required">Your email*</label>
              <input type="email" name="email" id="email" value="" tabindex="2" required="required">
              <label for="comment" class="required">Your Comment*</label>
              <textarea name="comment" id="comment" rows="10" tabindex="4" required="required"></textarea>
              <input type="hidden" name="comment_post_ID" value="1" id="comment_post_ID" />
              <!-- <div class="g-recaptcha" data-sitekey="6LcRFEcUAAAAANiR2edjW9vz1g2CADBUsevUpJW2"></div> -->
              <input name="submit" type="submit" value="Submit" />
            </form>
            <div id="alert" class="alert"></div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<div class="border"></div><br />

<!--FOOTER-->
<?php require_once APP_PATH.'Views/footer.php'; ?>