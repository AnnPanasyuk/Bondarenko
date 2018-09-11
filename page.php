<?php
/*
Template Name: Биография
*/
    require TEMPLATEPATH . '/includes/base-vars.php'; 
    get_header();
?>

<!-- Begin header -->
<?php require TEMPLATEPATH . '/template/header_inside.php';  ?>

<?php require TEMPLATEPATH . '/template/global_menu.php';  ?>
<!-- End header -->

<!-- Begin page body -->
<div id="page-body" class="page-body mod-news-details">
    <div class="first-section">
        <?php $img = get_field('картинка_фона_стр'); ?>
        <div class="img-bg" style="background-image: url(<?= $img['url'] ?>)"></div>
        <div class="container">
            <ul class="breadcrumbs">
                <li>
                    <a href="<?=$home_url?>"><?=_e('[:ru]главная[:en]Main[:de]Main')?></a>
                </li>
                <li>
                    <span><?php the_title(); ?></span>
                </li>
            </ul>
            <h1><?php the_title(); ?></h1>
        </div>
    </div>
    <div class="tiny-mce-section">
        <div class="content">
            <?php
                global $post;            
                setup_postdata($post); 
                the_content();
            ?>
        </div>
    </div>
    <?php require  $template_path .'form_template.php';  ?>
</div>
<?php 
    get_footer(); 
?>