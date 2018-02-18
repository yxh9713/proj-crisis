<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="Crisis Chronology, a daily record of world events. The purpose of the chronology is to track changes in current political events around the world.">
    <meta name="keywords" content="Walter Bode, Crisis, Chronology, crisischronolgy, North Korea, Brazil, Venezuela, Syria, political, events">
    <title>Crisis Chronology</title>
    <link href="https://fonts.googleapis.com/css?family=Montserrat:200,300,400,600,800" rel="stylesheet">
    <link href="/public/css/global.css" rel="stylesheet" type="text/css" />
    <?php if($title === 'Discussion'): ?><link href="/public/css/main.css" rel="stylesheet" type="text/css" /><?php endif; ?>
    <?php if($title === 'Contact'): ?><link href="/public/css/contact.css" rel="stylesheet" type="text/css" /><?php endif; ?>
    <script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
    <script src="/public/js/main.js"></script>
  </head>
  <body>

  <!--Horizontal Navigation-->
  <div class="box">
    <div class="grid grid-pad">
      <div class="col-3-12"></div>
      <div class="col-9-12 mobile-col-1-1">
        <div class="content">
          <div class="topnav" id="myTopnav">
            <a href="/">Home</a>
            <a href="/about">About</a>
            <a href="/discussion/page/1">Discussion</a>
            <a href="/contact">Contact</a>
            <a href="javascript:void(0);" style="font-size:25px;" class="icon" onclick="myFunction()">&#9776;</a>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="pushspace"></div>   
  
  <!--Logo-->
  <a href="index.shtml">
    <div id="logo-container">
      <img src="/public/images/crisis_chronology_logo.png"
      onmouseover="this.src='/public/images/crisis_chronology_logo_red.png'"
      onmouseout="this.src='/public/images/crisis_chronology_logo.png'" alt="World Crisis Chronology"/>
    </div>
  </a>

  <div style="color:#FFF; cursor:pointer;" onclick="openNav()">
    <div class="tab"></div>
  </div>
