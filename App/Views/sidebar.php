<div id="mySidenav" class="open_sidenav sidenav">
  <a href="javascript:void(0)" class="closebtn" onclick="closeNav()" style="color:#000;">&times;</a>
  <div id="logo-container-box"></div>
  <div id="daily-hotspots">
    <img src="/public/images/daily_hotspots.png" />
  </div>
  <?php 
    $count = 0;
    $total = count($navNames);
    foreach ($navCategories as $category) {
      $upperCategory = strtoupper($category['category']);
      echo '<div class="dropdown"><div class="dropbtn">'.$upperCategory.'</div></div>';
      for($i = $count ; $i < $total ; $i++) {
        $nav = $navNames[$i];
        if(strtoupper($nav['category']) !== $upperCategory) {
          break;
        }
        $link = '/countries/' . $nav['id'] . '/event';
        echo '<div id="country-'.$nav['id'].'" class="dropdown"><div class="dropbtn"><a href="'.$link.'">'.$nav['name'].'</a></div></div>';
      $count++;
      }
      echo '<br />';
    }
  ?>
  <div style="margin-bottom:150px;"></div>
</div>