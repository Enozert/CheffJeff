<?php
$link = $host."/wordpress/wp-json/wp/v2/home"; // API link
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
        // case 'banner':
        //     $Banner = $data[$i]['imageURL']['large'];
        //     // $Banner = str_replace("http://localhost/",$host.'/', $Banner);
        //     break;
        case 'full-stack-web-developer-wordpress-expert':
            $txt1 = $data[$i]['title']['rendered'];
            $img1 = $data[$i]['imageURL']['large'];
            break;
        default:
            break;
    }
}