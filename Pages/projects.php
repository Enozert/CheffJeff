<?php
    $Page = "Projects";
    $JS = "projects";
    $CSS = $JS;
    if(is_null($root)){
        include('../config.php');
    }
    include($root."/src/php/api/projects.api.php");
    include($root."/pages/templates/top.php");
?>
<section class="projects"> 
    <div id="particles-js"></div>
    <div class="container-fluid">
        <div class="row title-wrap">
            <div class="col-md-12">
                <div class="page-title">
                    <h1><?=$txt1?></h1>
                </div>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="filter-wrap">
                <p class="btn-filter active" id="All"><?=$btn2?></p>
                <?php foreach ($categories as $categorie): ?>
                    <?php if($categorie['name'] == 'Uncategorized'){ continue; } ?>
                    <p class="btn-filter" id="<?=str_replace(' ', '-', $categorie['name'])?>"><?=$categorie['name']?></p>
                <?php endforeach ?>
            </div>
        </div>
        <div class="row justify-content-center">
            <?php foreach ($projects as $project):?>
                <?php $cats = $project['categoryName'] ?>
                <div class="<?php foreach ($cats as $cat){ echo str_replace(' ', '-', $cat['cat_name']).' '; }?>col-lg-4 col-md-6 project-item active">
                    <div class="project">
                        <div class="img-wrap">
                            <img src="<?=$project['acf']['image']?>">
                        </div>
                        <div class="content-wrap">
                            <div class="inner">
                                <div class="title">
                                    <h2><?=$project['title']['rendered']?></h2>
                                </div>
                                <div class="link">
                                    <a href="<?=$project['acf']['link']?>" target="_blank"><?=$btn?></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach ?>
        </div>
    </div>
</section>
<?php 
    include($root."/Pages/Templates/bottom.php")
?>