<?php
    if(is_null($root)){
        include('../config.php');
    }
    if($_SESSION['lang'] == $NL){
        $Page = "Privacy";
    }else{
        $Page = "Privacy";
    }    
    $JS = "privacy";
    $CSS = $JS;
    include($root."/src/php/api/privacy.api.php");
    include($root."/pages/templates/top.php");
?>
<section class="privacy">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="inner">
                    <div class="title-wrap">
                        <h1><?=$txt1?></h1>
                    </div>
                    <div class="content">
                        <?=$txt2?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<canvas class="matrix"></canvas>
<?php 
    include($root."/Pages/Templates/bottom.php")
?>