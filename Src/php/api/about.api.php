<?php
$link = $host."/wordpress/wp-json/wp/v2/about"; // API link
$dataPrep = file_get_contents($link);
$data = json_decode($dataPrep, true);

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
            $txt1 = $data[$i]['title']['rendered'];
            $txt2 = $data[$i]['content']['rendered'];
            $img1 = $data[$i]['imageURL']['large'];
            break;
        case 'sidetxt':
            $txt3 = $data[$i]['content']['rendered'];
            $txt3 = str_replace('{age}', $age, $txt3);
            $img2 = $data[$i]['imageURL']['large'];
            break;
        case 'developer':
            $txt4 = $data[$i]['title']['rendered'];
            break;
        case 'part-time-nerd':
            $txt5 = $data[$i]['title']['rendered'];
            break;
        default:
            break;
    }
}