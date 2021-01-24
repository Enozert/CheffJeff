<?php
    if(is_null($root)){
        include('../config.php');
    }
    if($_SESSION['lang'] == $NL){
        $Page = "Diensten";
    }else{
        $Page = "Services";
    }
    $JS = "services";
    $CSS = $JS;
    include($root."/src/php/api/services.api.php");
    include($root."/pages/templates/top.php");
?>
<section class="skills">
    <div id="particles-js"></div>
    <div class="main-content">
        <div class="txt-wrapper">
            <div class="row justify-content-end">
                <div class="col-lg-6">
                    <div class="inner txt">
                        <h1><?=$txt1?></h1>
                        <?=$txt2?>
                    </div>
                </div>
            </div>
        </div>
        <div class="side-img">
            <img src="<?=$img1?>">
        </div>
    </div>
</section>
<?php 
    include($root."/Pages/Templates/bottom.php")
?>