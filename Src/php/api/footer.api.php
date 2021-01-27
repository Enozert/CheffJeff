<?php
if(isset($_SESSION['lang'])){
    $lang = $_SESSION['lang'];
}
else{
    $lang = $UK;
}
if(isset($_SESSION['footer'])){
    $footer = $_SESSION['footer'];
    if($footer['lang'] == $lang){
        $txtF1 = $footer['links']['title'];
        $txtF2 = $footer['links']['content'];
        $txtF3 = $footer['questions']['title'];
        $txtF4 = $footer['questions']['content'];
    }
    else{
        $footer = getFooter($host, $lang, $NL, $UK);
        $txtF1 = $footer['links']['title'];
        $txtF2 = $footer['links']['content'];
        $txtF3 = $footer['questions']['title'];
        $txtF4 = $footer['questions']['content'];
    }
}else{
    $footer = getFooter($host, $lang, $NL, $UK);
    $txtF1 = $footer['links']['title'];
    $txtF2 = $footer['links']['content'];
    $txtF3 = $footer['questions']['title'];
    $txtF4 = $footer['questions']['content'];
}

function getFooter($host, $lang, $NL, $UK) 
{
    $linkFooter = $host."/wordpress/wp-json/wp/v2/footer";
    $footerPrep = file_get_contents($linkFooter);
    $footer = json_decode($footerPrep, true);
    $footerArr = array();

    for($i = 0; $i < count($footer); $i++){
        switch ($footer[$i]['slug']){
            case 'links':
                switch ($lang){
                    case $NL:
                        $txtFoo1 = $footer[$i]['acf']['tille'];
                        $txtFoo2 = $footer[$i]['acf']['description'];
                        break;
                    default: 
                        $txtFoo1 = $footer[$i]['title']['rendered'];
                        $txtFoo2 = $footer[$i]['content']['rendered'];
                    break;
                }
                break;
            case 'questions':
                switch ($lang){
                    case $NL:
                        $txtFoo3 = $footer[$i]['acf']['tille'];
                        $txtFoo4 = $footer[$i]['acf']['description'];
                        break;
                    default: 
                        $txtFoo3 = $footer[$i]['title']['rendered'];
                        $txtFoo4 = $footer[$i]['content']['rendered'];
                    break;
                }
                break;
            default:
                break;
        }
    }
    $footerArr = [
        'links' => [
            'title' => $txtFoo1,
            'content' => $txtFoo2,
        ],
        'questions' => [
            'title' => $txtFoo3,
            'content' => $txtFoo4,
        ],
        'lang' => $lang
    ];
    
    $_SESSION['footer'] = $footerArr;
    return $footerArr;
}