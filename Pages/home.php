<?php
    $Page = "Home";
    $JS = "home";
    $CSS = "home";
    if(is_null($root)){
        include('../config.php');
    }
    include($root."/src/php/api/home.api.php");
    include($root."/pages/templates/top.php");
?>
<section class="Home">
    <div class="HomeBackgroud">
        <img src="<?=$img1?>" alt="home background">
    </div>
    <div class="HomeTexts">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="HomeTextInner">
                        <h1><?=$txt1?></h1>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<?php 
    include($_SERVER['DOCUMENT_ROOT']."/Pages/Templates/bottom.php")
?>