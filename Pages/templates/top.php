<?php
  if(!empty($_SESSION['menu'])){
    $menuItems = $_SESSION['menu'];
  }
  else{
    include($root."/src/php/api/getMenu.api.php");
    GetMenu($host);
    $menuItems = $_SESSION['menu'];
  }
  if(!empty($_SESSION['subMenu'])){
    $subMenuItems = $_SESSION['subMenu'];
  }
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!-- styles -->
  <!-- <link rel="stylesheet" href="/Recources/CSS/pages/<?= $CSS?>.min.css">
  <link rel="stylesheet" href="/Recources/CSS/pages/main.min.css"> -->
  <!-- end styles -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
  <link href="https://fonts.googleapis.com/css2?family=Gentium+Basic:wght@400;700&display=swap" rel="stylesheet">
  <script src="https://www.google.com/recaptcha/api.js" async defer></script>
  <meta property="og:title" content="cheffjeff.nl">
  <meta property="og:image" content="/Recources/Img/meta/1200x630.png">
  <meta property="og:image:type" content="image/png">
  <link rel="icon" href="/Recources/Img/meta/32x32.png" sizes="32x32">
  <link rel="icon" href="/Recources/Img/meta/192x192.png" sizes="192x192">
  <link rel="shortcut icon" type="image/x-icon" href="/Recources/Img/meta/64x64.png" />
  <link rel="apple-touch-icon-precomposed" href="/Recources/Img/meta/180x180.png">
  <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css"/>
  <meta name="msapplication-TileImage" content="/Recources/Img/meta/270x270.png">
  <link href="/Recources/Img/meta/120x120.png" rel="apple-touch-icon" />
  <link href="/Recources/Img/meta/152x152.png" rel="apple-touch-icon" sizes="152x152" />
  <link href="/Recources/Img/meta/76x76.png" rel="apple-touch-icon" sizes="76x76" />
  <link href="/Recources/Img/meta/120x120.png" rel="apple-touch-icon" sizes="120x120" />
  <link href="/Recources/Img/meta/310x480.png" rel="apple-touch-startup-image" />
  <meta name="msapplication-square70x70logo" content="/Recources/Img/meta/70x70.png" />
  <meta name="msapplication-square150x150logo" content="/Recources/Img/meta/150x150.png" />
  <meta name="msapplication-wide310x150logo" content="/Recources/Img/meta/310x150.png" />
  <meta name="msapplication-square310x310logo" content="/Recources/Img/meta/310x310.png" />
  <meta name="apple-mobile-web-app-capable" content="yes" />
  <meta name="apple-touch-fullscreen" content="yes" />
  <meta name="theme-color" content="#000">
  <meta name="apple-mobile-web-app-status-bar-style" content="#0a0a0a" />
  <meta name="description" content="<?= $pageDescription ?>">
  <title><?= $PageTitle ?></title>
</head>
<header>
  <div class="container-fluid">
    <div class="d-flex flex-column">
      <div class="top-wrapper">
          <div class="logo-wrapper">
              <a href="/">
                  <img src="/Recources/Img/LogoWhite.png" alt="logo">
              </a>
          </div>
      </div>
      <div class="middle-wrapper">
        <nav class="mainNav">
          <ul>
            <?php foreach($menuItems as $menuItem): ?>
              <?php if($menuItem['parent'] == null): ?>
                <li class="MenuItem <?php if($Page == $menuItem['Name']){echo "active";} ?>">
                  <a href="<?=$menuItem['Link']?>">
                    <span><?=$menuItem['Name']?></span>
                  </a>
                  <?php if(isset($subMenuItems) && $menuItem['hasChild'] == 1): ?>
                    <ul>
                      <?php foreach($subMenuItems as $subMenuItem): ?>
                        <?php if($subMenuItem['parent'] == $menuItem['Name']): ?>
                          <li>
                            <a href="<?=$subMenuItem['Link']?>">
                              <span><?=$subMenuItem['Name']?></span>
                            </a>
                          </li>
                        <?php endif ?>
                      <?php endforeach ?>
                    </ul>
                  <?php endif ?>
                </li>
              <?php endif ?>
            <?php endforeach ?>
          </ul>
        </nav>
      </div>
      <div class="bottom-wrapper">
        <ul class="socials">
          <li>
            <a href="https://www.instagram.com/jeffrey.ik/" target="_black">
              <svg aria-hidden="true" focusable="false" data-prefix="fab" data-icon="instagram" class="svg-inline--fa fa-instagram fa-w-14" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512">
                <path fill="currentColor" d="M224.1 141c-63.6 0-114.9 51.3-114.9 114.9s51.3 114.9 114.9 114.9S339 319.5 339 255.9 287.7 141 224.1 141zm0 189.6c-41.1 0-74.7-33.5-74.7-74.7s33.5-74.7 74.7-74.7 74.7 33.5 74.7 74.7-33.6 74.7-74.7 74.7zm146.4-194.3c0 14.9-12 26.8-26.8 26.8-14.9 0-26.8-12-26.8-26.8s12-26.8 26.8-26.8 26.8 12 26.8 26.8zm76.1 27.2c-1.7-35.9-9.9-67.7-36.2-93.9-26.2-26.2-58-34.4-93.9-36.2-37-2.1-147.9-2.1-184.9 0-35.8 1.7-67.6 9.9-93.9 36.1s-34.4 58-36.2 93.9c-2.1 37-2.1 147.9 0 184.9 1.7 35.9 9.9 67.7 36.2 93.9s58 34.4 93.9 36.2c37 2.1 147.9 2.1 184.9 0 35.9-1.7 67.7-9.9 93.9-36.2 26.2-26.2 34.4-58 36.2-93.9 2.1-37 2.1-147.8 0-184.8zM398.8 388c-7.8 19.6-22.9 34.7-42.6 42.6-29.5 11.7-99.5 9-132.1 9s-102.7 2.6-132.1-9c-19.6-7.8-34.7-22.9-42.6-42.6-11.7-29.5-9-99.5-9-132.1s-2.6-102.7 9-132.1c7.8-19.6 22.9-34.7 42.6-42.6 29.5-11.7 99.5-9 132.1-9s102.7-2.6 132.1 9c19.6 7.8 34.7 22.9 42.6 42.6 11.7 29.5 9 99.5 9 132.1s2.7 102.7-9 132.1z">
                </path>
              </svg>
            </a>
          </li>
        </ul>
      </div>
      <div class="col-12">
        <div class="mobile-head">
          <div class="logo-wraper">
            <a href="/">
              <img src="/Recources/Img/logo.png" alt="logo">
            </a>
          </div>
          <div class="hamburger-menu">
            <div id="Hamburgur">
              <button id="menuToggle" class="menu" aria-label="Main Menu">
                <svg width="70" height="70" viewBox="0 0 100 100">
                  <path class="line top" d="M 20,29.000046 H 80.000231 C 80.000231,29.000046 94.498839,28.817352 94.532987,66.711331 94.543142,77.980673 90.966081,81.670246 85.259173,81.668997 79.552261,81.667751 75.000211,74.999942 75.000211,74.999942 L 25.000021,25.000058" />
                  <path class="line middle" d="M 20,50 H 80" />
                  <path class="line bottom" d="M 20,70.999954 H 80.000231 C 80.000231,70.999954 94.498839,71.182648 94.532987,33.288669 94.543142,22.019327 90.966081,18.329754 85.259173,18.331003 79.552261,18.332249 75.000211,25.000058 75.000211,25.000058 L 25.000021,74.999942" />
                </svg>
              </button>
            </div>
          </div>
        </div>
        <div class="header-overlay">
        </div>
      </div>
      <div class="menu-wrapper">
        
      </div>
    </div>
  </div>
</header>
<body>