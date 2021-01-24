<?php
    if(is_null($root)){
        include('../config.php');
    }
    if($_SESSION['lang'] == $NL){
        $Page = "Over";
    }else{
        $Page = "About";
    }    
    $JS = "about";
    $CSS = $JS;
    include($root."/src/php/api/about.api.php");
    include($root."/pages/templates/top.php");
?>
<section class="Banner">
    <div class="Banner parallax">
        <div id="BannerImg" class="img" style="background-image: url('<?=$img1?>');">
        </div>        
    </div>
    <div class="BannerContent">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="BannerTitle">
                        <h1><?=$txt1?></h1>
                        <p><?=$txt2?></p>
                    </div>
                </div>
            </div>
        </div>
        <a href="#Me" class="down">
            <span></span>
            <span></span>
        </a>
    </div>
</section>

<section id="Me" class="me">
    <div class="container">
        <div class="row">
            <div class="col-lg-7 col-md-6">
                <div class="background-wrapper">
                    <div class="inner txt">
                        <?=$txt3?>
                    </div>
                    <div class="backgroundTxt">
                        <p><?=$txt5?></p>
                    </div>
                </div>
            </div>
            <div class="col-lg-5 col-md-6">
                <div class="background-wrapper">
                    <div class="inner">
                        <img src="<?=$img2?>" alt="me">
                    </div>
                    <div class="backgroundTxt imgTxt">
                        <p><?=$txt4?></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<?php 
    include($root."/Pages/Templates/bottom.php")
?>