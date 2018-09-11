<?php
    global $wp_query;
    $args=array(
        'nopaging'=>true
    );
    $new_query=array_merge($args,$wp_query->query);
    query_posts($new_query);
    
    require TEMPLATEPATH . '/includes/base-vars.php'; 
    get_header();
?>
<!-- Begin header -->
<?php require TEMPLATEPATH . '/template/header_inside.php';  ?>

<?php require TEMPLATEPATH . '/template/global_menu.php';  ?>
<!-- End header -->

<!-- Begin page body -->
<div id="page-body" class="page-body mod-portfolio">
    <div class="first-section">
        <?php $img = get_field('картинка_фона_p',$seo_var_id) ?>
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
            <?= get_field('текстовка_первого_экрана_p',$seo_var_id) ?>
        </div>
        <div class="line-item"><a href="#portfolio-page-content"></a></div>
    </div>
    <div class="portfolio-page-content" id="portfolio-page-content">
        <div class="container">
            <?php if( have_posts() ):  ?>
            <?php 
                $index=1; 
                while( have_posts() ): 
                    the_post(); 
            ?>
                <div class="section-about-portfolio">
                    <div class="img-wrap <?= $index % 2 ? 'left' : 'right' ?>-animation" data-wow-offset="10" style="order:<?= $index % 2 ? '1' : '2' ?>;">
                        <a href="<?=get_permalink()?>" title="<?php the_title(); ?>">
                            <?=get_the_post_thumbnail(get_the_ID(),'full')?>
                        </a>
                    </div>
                    <div class="text-wrap <?= $index % 2 ? 'right' : 'left' ?>-animation" data-wow-offset="10" style="order:<?= $index % 2 ? '2' : '1' ?>;">
                        <small>
                            <?= get_field('название') ?>
                        </small>
                        <a href="<?=get_permalink()?>" title="<?php the_title(); ?>">
                            <h2 class="el-title mod-separate">
                                <?php the_title(); ?>
                            </h2>
                        </a>
                        <?= get_field('краткое_описание') ?>
                        <a href="<?=get_permalink()?>" class="el-look-more" data-person-id="<?php the_ID(); ?>">
                            <span class="look-more-button"></span>
                            <span class="look-more-text">
                                <?= _e('[:ru]Смотреть детальнее[:en]View details[:de]Details anzeigen');?>
                            </span>
                        </a>
                    </div>
                </div>
            <?php 
                    $index++; 
                endwhile; 
                wp_reset_postdata(); 
            ?>
            <?php 
                else :
            ?>
                <div class="photos-wrap">
                    <!--потеряли блок, нужно вставить картинки-->
                    <img src="" alt="img">
                    <img src="" alt="img">
                    <img src="" alt="img">
                    <img src="" alt="img">
                </div>
                <div class="text_wrap">
                    <h3><?= _e('[:ru]Записей нет.[:en]There are no records.[:de]Es gibt keine Aufzeichnungen.');?></h3>
                </div>
            <?php endif; ?>
        </div>
    </div>

    <div class="section-about">
        <div class="container">
            <div class="text-wrap">
                <div class="text-wrap-left  left-animation" data-wow-offset="10">
                    <?= get_field('текст_p',$seo_var_id) ?>
                </div>
                <div class="wrap-img right-animation" data-wow-offset="10">
                    <?php $img = get_field('картинка_p',$seo_var_id) ?>
                    <img src="<?= $img['url'] ?>" alt="img">
                </div>
            </div>
        </div>
    </div>
</div>
<?php 
    get_footer(); 
?>