<?php
session_start();
include('config.php');
$request = $_SERVER['REQUEST_URI'];

$ua = htmlentities($_SERVER['HTTP_USER_AGENT'], ENT_QUOTES, 'UTF-8');
if (preg_match('~MSIE|Internet Explorer~i', $ua) || (strpos($ua, 'Trident/7.0; rv:11.0') !== false)) {
    require __DIR__ . '/Pages/Errors/ie.php';
    die();
}

switch ($request) {
  case '/' :
      require __DIR__ . '/Pages/index.php';
      die();
      break;
  case '/home' :
      require __DIR__ . '/Pages/index.php';
      die();
      break;
  case '' :
      require __DIR__ . '/Pages/index.php';
      die();
      break;
  case '/wp' :
      require __DIR__ . '/wordpress/wp-login.php';
      die();
      break;
  case '/wp-admin' :
      require __DIR__ . '/wordpress/wp-login.php';
      die();
      break;
  default:
      http_response_code(404);
      require __DIR__ . '/Pages/Errors/404.php';
      die();
      break;
}