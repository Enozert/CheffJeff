<?php
if(isset($_GET)){
    if(isset($_GET['lang'])){
        $lang = $_GET['lang'];
    }
    else{
        $lang = 'UK';
    }
}
else{
    $lang = 'UK';
}

$_SESSION['lang'] = $lang;