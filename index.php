<?php
session_start();
include('config.php');
$request = $_SERVER['REQUEST_URI'];

$ua = htmlentities($_SERVER['HTTP_USER_AGENT'], ENT_QUOTES, 'UTF-8');
if (preg_match('~MSIE|Internet Explorer~i', $ua) || (strpos($ua, 'Trident/7.0; rv:11.0') !== false)) {
    require __DIR__ . '/Pages/Errors/ie.php';
    die();
}

// if(empty($_SESSION['menu'])){
//     include($root."/Recources/PHP/Api/getMenu.api.php");
//     GetMenu($host);          
// }  

include($root."/src/php/api/getMenu.api.php");
GetMenu($host);  

$menuItems = $_SESSION['menu'];

if(strpos($request, '?fbclid')){
    $request = substr($request, 0, strpos($request, "?fbclid"));
}

foreach($menuItems as $menuItem){
    if($request == $menuItem['Link']){
        $requestPrep = file_get_contents($menuItem['templateIpa']);
        $template = json_decode($requestPrep, true);
        $template = $template[0]['acf']['template'];
        require __DIR__ . '/Pages/'.$template;
        die();
    }
}

switch ($request) {
    case '/' :
        require __DIR__ . '/Pages/home.php';
        die();
        break;
    case '/home' :
        require __DIR__ . '/Pages/home.php';
        die();
        break;
    case '' :
        require __DIR__ . '/Pages/home.php';
        die();
        break;
    case '/wordpress' :
        require __DIR__ . '/Pages/home.php';
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