<?php
$link = $host."/wordpress/wp-json/wp/v2/contact"; // API link
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
        case 'contact':
            switch ($lang){
                case $NL:
                    $txt1 = $data[$i]['acf']['tille'];
                    $lbl1 = 'Voornaam.';
                    $lbl2 = 'Achternaam.';
                    $lbl3 = 'E-mailadres.';
                    $lbl4 = 'Telefoon nummer.<small>(optineel)</small>';
                    $lbl5 = 'Bericht.';
                    $btn  = 'Verstuur'; 
                    break;
                default: 
                    $txt1 = $data[$i]['title']['rendered'];
                    $lbl1 = 'First name.';
                    $lbl2 = 'Last name.<small>(sir name)</small>';
                    $lbl3 = 'E-mail adress.';
                    $lbl4 = 'Phone number.<small>(optional)</small>';
                    $lbl5 = 'Message.';
                    $btn  = 'Send'; 
                break;
            }
            $img1 = $data[$i]['imageURL']['large'];
            break;
        default:
            break;
    }
}