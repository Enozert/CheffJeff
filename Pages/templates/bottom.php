<?php
    include($root."/src/php/api/footer.api.php");
?>
<footer>
    <div class="container"> 
        <div class="row">
            <div class="col-md-2">
                <div class="inner logo">
                    <a href="/">
                        <img src="/src/img/LogoWhite.png" alt="logo">
                    </a>
                </div>
            </div>
            <div class="col-md-4">
                <div class="inner nav">
                    <div>
                        <p><?=$txtF1?></p>
                        <?=$txtF2?>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="inner contact2">
                    <div>
                        <p class="title"><?=$txtF3?></p>
                        <?=$txtF4?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>
<div id="overlay"></div>
</body>
    <script type="text/javascript" src="//code.jquery.com/jquery-1.11.0.min.js"></script>
    <script type="text/javascript" src="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
    <?php if(!empty($JS)): ?>
        <script src="/dist/js/<?= $JS?>.js"></script>
    <?php endif ?>
</html>