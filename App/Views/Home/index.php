<?php require_once APP_PATH.'Views/header.php'; ?>

<!--Vertical Navigation-->
<?php require_once APP_PATH.'Views/sidebar.php'; ?>

<!--HOME-->
<!--EMPTY SPACE-->
<div class="closebtn" onclick="closeNav()">
   <div class="grid grid-pad">
      <div class="col-1-1">
         <div class="space-map"></div>
      </div>
   </div>
   <div class="grid grid-pad">
      <div class="col-2-12 hide-on-mobile"></div>
      <div class="col-10-12 mobile-col-1-1">
        <div class="content">
          <div class="map">
            <img src="/public/images/world_map.png">
            
            <?php foreach ($pins as $pin): ?>
            <!--<?php echo $pin['name']; ?>-->                        
            <a href="/countries/<?php echo $pin['country_id']; ?>/event">
              <div class="pin-box" style="top:<?php echo $pin['top_position']; ?>%; left:<?php echo $pin['left_position']; ?>%;">
                <div class="pin-text">
                  <h3><?php echo $pin['name']; ?></h3>
                </div>
              </div>
            </a>
            <?php endforeach; ?>

          </div>
         </div>
      </div>
   </div>
   <div class="pushspace"></div>
   <div class="border"></div>
   <br />
   <div class="grid grid-pad">
      <div class="col-1-9 hide-on-mobile">
         <div class="content"></div>
      </div>
      <div class="col-1-9 hide-on-mobile">
         <div class="content"></div>
      </div>
      <div class="col-7-12 mobile-col-1-1">
         <div class="content">
            <h3>How to Use the CRISIS CHRONOLOGY</h3>
            <br />
            <p> Welcome to the Crisis Chronology, a daily record of world events. The purpose of the chronology is track of changes in current political events around the world. I am currently showing only a few countries, but more will be added as they are checked for completeness and consistency.</p>
            <br />
            <p> All countries tracked form the list on the left. Scroll to a country that interests you and click on it. Under the country’s name, a list of the most major events in the country’s recent history will appear. At the same time, a complete of events for that country will appear on the right, beginning with the most recent. </p>
            <br />
            <p>Pins on the map above mark crises that have reached a new stage in their evolution. That does not imply that there aren’t ongoing and tragic crises elsewhere in the world, but the pins denote a recent change.</p>
            <br />
            <p>I welcome discussion about the events on the discussion page. Please use the Contact page and I will post responsible comments, conversation, and debate, I will make corrections and changes to the list after reviewing any suggestions. </p>
            <br />
            <p style="color:#F00;">&mdash; <a href="https://www.linkedin.com/in/walter-bode-b246857/" style="color: rgba(255,0,4,1.00);"> Walter Bode, Editor</a></p>
         </div>
      </div>
   </div>
</div>

<div class="border"></div><br />

<!--FOOTER-->
<?php require_once APP_PATH.'Views/footer.php'; ?>