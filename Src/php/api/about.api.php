<?php
$link = $host."/wordpress/wp-json/wp/v2/about"; // API link
$dataPrep = file_get_contents($link);
$data = json_decode($dataPrep, true);
if(isset($_SESSION['lang'])){
    $lang = $_SESSION['lang'];
}else{
    $lang = 'UK';
}

$age = date_diff(date_create('1999-11-18'), date_create('today'))->y;

for($i = 0; $i < count($data); $i++){
    switch ($data[$i]['slug']){
        // case 'page-tile':
        //     $PageTitle = strip_tags($data[$i]['content']['rendered']);
        //     break;
        // case 'page-description':
        //     $pageDescription = strip_tags($data[$i]['content']['rendered']);
        //     break;
        case 'hi-im-jeffrey-nijkamp':
            switch ($lang){
                case 'NL':
                    $txt1 = $data[$i]['acf']['tille'];
                    $txt2 = $data[$i]['acf']['description'];
                    break;
                default: 
                    $txt1 = $data[$i]['title']['rendered'];
                    $txt2 = $data[$i]['content']['rendered'];
                break;
            }
            $img1 = $data[$i]['imageURL']['large'];
            break;
        case 'sidetxt':
            switch ($lang){
                case 'NL':
                    $txt3 = $data[$i]['acf']['description'];
                    break;
                default: 
                    $txt3 = $data[$i]['content']['rendered'];
                break;
            }
            $txt3 = str_replace('{age}', $age, $txt3);
            $img2 = $data[$i]['imageURL']['large'];
            break;
        case 'developer':
            switch ($lang){
                case 'NL':
                    $txt4 = $data[$i]['acf']['tille'];
                    break;
                default: 
                    $txt4 = $data[$i]['title']['rendered'];
                break;
            }
            break;
        case 'part-time-nerd':
            switch ($lang){
                case 'NL':
                    $txt5 = $data[$i]['acf']['tille'];
                    break;
                default: 
                    $txt5 = $data[$i]['title']['rendered'];
                break;
            }
            break;
        default:
            break;
    }
}