<?php
if(session_status() != 2){
    session_start();
}
if(!isset($NL) || empty($NL)){
    include('../../config.php');
}
if(isset($_GET)){    
    if(isset($_GET['lang'])){
        $lang = $_GET['lang'];
        $_SESSION['lang'] = $lang;
        reloadMenu();
    }
    else{
        $lang = $UK;
        $_SESSION['lang'] = $lang;
    }
}
else{
    $lang = $UK;
    $_SESSION['lang'] = $lang;
}

function urlLang($lang)
{
    if(session_status() != 2){
        session_start();
    }
    $_SESSION['lang'] = $lang;
}

function reloadMenu(){
    if(!isset($root) || empty($root)){
        include('../../config.php');
    }
    include($root."/src/php/api/getMenu.api.php");
    GetMenu($host);
}