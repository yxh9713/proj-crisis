<?php require_once APP_PATH.'Views/header.php'; ?>

<!--Vertical Navigation-->
<?php require_once APP_PATH.'Views/sidebar.php'; ?>

<div class="closebtn" onclick="closeNav()">
  <div class="grid grid-pad">
    <div class="col-1-9">
      <div class="content"></div>
    </div>
    <div class="col-1-9">
      <div class="content"></div>
    </div>

    <div class="col-7-12 mobile-col-1-1">
      <div class="content">
          <h2><?php echo strtoupper($country['name']); ?><div class="underline"></div></h2>
      </div>
    </div>
  </div>

  <?php if(!count($events)): ?>
    <div class="grid grid-pad">
      <!-- BLANK SPACE -->
      <div class="col-1-8"></div>
      <div class="col-1-8"></div>
      <!-- FACTS -->
      <div class="col-1-5 mobile-col-1-1">
        <div class="content">
          <dd>
            <div class="facts">Not available yet.</div>
          </dd>
        </div>
      </div>
    </div>
  <?php else : ?>
    <!-- foreach Event content -->

    <?php foreach ($events as $event): ?>

    <?php 
      $str_date = substr($event['date'], -2);
      if($str_date === '00') {
        $date = date("m/Y", strtotime($event['date'] . "+1 day"));
      } else {
        $date = date("m/d/Y", strtotime($event['date']));
      }
    ?>

    <?php if($event['subhead']) : ?>
      <div class="border" id="<?php echo $event['id']; ?>"></div>
      <br /><br />
      <div class="grid grid-pad">
        <!-- BLANK SPACE -->
        <div class="col-1-8"></div>
        <div class="col-1-8"></div>
        <!-- FACTS -->
        <div class="col-1-5 mobile-col-1-1">
          <div class="content">
            <dt>
              <div class="large-indent"><?php echo $date; ?></div>
            </dt>
            <dd>
              <div class="facts">
                <div class="large-facts">
                  <?php echo htmlspecialchars($event['subhead']); ?>
                </div>
                <?php echo htmlspecialchars($event['description']); ?>
              </div>
            </dd>
          </div>
        </div>
      </div>

    <?php else : ?>

    <div class="grid grid-pad">
        <!-- BLANK SPACE -->
        <div class="col-1-8"></div><div class="col-1-8"></div>
        <!-- FACTS -->
        <div class="col-1-5 mobile-col-1-1">
          <div class="content">
            <dt><div class="date-indent"><?php echo $date; ?></div></dt>
            <dd><div class="facts"><?php echo htmlspecialchars($event['description']); ?></dd>     
          </div>           
        </div>
      </div>
    <?php endif; ?>
    <?php endforeach; ?>
  <?php endif; ?>

</div><!-- end .closebtn -->
<div class="border"></div><br />

<script type="text/javascript">
  var id = <?php echo $id; ?>;
</script>
<!--FOOTER-->
<?php require_once APP_PATH.'Views/footer.php'; ?>