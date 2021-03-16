<?php
$link = $host."/wordpress/wp-json/wp/v2/privacy"; // API link
$dataPrep = file_get_contents($link);
$data = json_decode($dataPrep, true);
if(isset($_SESSION['lang'])){
    $lang = $_SESSION['lang'];
}else{
    $lang = $UK;
}

for($i = 0; $i < count($data); $i++){
    switch ($data[$i]['slug']){
        // case 'page-tile':
        //     $PageTitle = strip_tags($data[$i]['content']['rendered']);
        //     break;
        // case 'page-description':
        //     $pageDescription = strip_tags($data[$i]['content']['rendered']);
        //     break;
        case 'privacy-statement':
            switch ($lang){
                case $NL:
                    $txt1 = $data[$i]['acf']['tille'];
                    $txt2 = $data[$i]['acf']['description'];
                    break;
                default: 
                    $txt1 = $data[$i]['title']['rendered'];
                    $txt2 = $data[$i]['content']['rendered'];
                break;
            }
            break;
        default:
            break;
    }
}