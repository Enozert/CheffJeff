<?php
$link = $host."/wordpress/wp-json/wp/v2/projects"; // API link
$dataPrep = file_get_contents($link);
$data = json_decode($dataPrep, true);

for($i = 0; $i < count($data); $i++){
    switch ($data[$i]['slug']){
        // case 'page-tile':
        //     $PageTitle = strip_tags($data[$i]['content']['rendered']);
        //     break;
        // case 'page-description':
        //     $pageDescription = strip_tags($data[$i]['content']['rendered']);
        //     break;
        case 'i-have-worked-on-the-following-websites':
            $txt1 = $data[$i]['title']['rendered'];
            break;
        default:
            break;
    }
}

$link = $host."/wordpress/wp-json/wp/v2/project";
$dataPrep = file_get_contents($link);
$projects = json_decode($dataPrep, true);

$link = $host."/wordpress/wp-json/wp/v2/categories";
$dataPrep = file_get_contents($link);
$categories = json_decode($dataPrep, true);