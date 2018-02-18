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
      echo '<div class="dropdown"><div class="dropbtn">'.$upperCategory.'</div></div>'."\n";

      for($i = $count ; $i < $total ; $i++) {
        $nav = $navNames[$i];
        if(strtoupper($nav['category']) !== $upperCategory) {
          break;
        }
        $link = '/countries/' . $nav['id'] . '/event';
        echo '<div class="dropdown"><div id="country-'.$nav['id'].'" class="dropbtn"><a href="'.$link.'">'.$nav['name'].'</a></div>';

        $subheadContent = '';
        foreach($navSubheads as $subhead){
          if($subhead['country_id'] == $nav['id']) {
            
            $str_date = substr($subhead['date'], -2);
            if($str_date === '00') {
              $date = date("m/Y", strtotime($subhead['date'] . "+1 day"));
            } else {
              $date = date("m/d/Y", strtotime($subhead['date']));
            }
            // var_dump($subhead['id'].'-'.$date);
            $subheadContent .= '<a href="'.$link.'#'.$subhead['id'].'">'.$date.'</a>';
            $subheadContent .= '<span class="subhead">'.$subhead['subhead'].'</span>';
            $subheadContent .= '<div class="line"></div>'."\n";
          }
        };
        
        if($subheadContent !== '') {
          $dropdownContent = '<div class="dropdown-content">'."\n" . $subheadContent . '<div style="margin-bottom:40px;"></div></div>'."\n";
          echo $dropdownContent;
        }
        echo '</div>';
        $count++;
      }
      
      echo '<br />';
    }
  ?>
  <div style="margin-bottom:150px;"></div>
</div>
