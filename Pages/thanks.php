<?php
    $Page = "Thanks";
    $JS = "thanks";
    $CSS = $JS;
    if(is_null($root)){
        include('../config.php');
    }
    include($root."/src/php/api/thanks.api.php");
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
                        <?=$txt2?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<?php 
    include($root."/Pages/Templates/bottom.php")
?>