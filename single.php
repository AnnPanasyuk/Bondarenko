<?php
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
        <?php $img = get_field('картинка_фона'); ?>
        <div class="img-bg" style="background-image: url(<?= $img['url'] ?>)"></div>
        <div class="container">
            <ul class="breadcrumbs">
                <li>
                    <a href="<?=$home_url?>"><?=_e('[:ru]главная[:en]Main[:de]Main')?></a>
                </li>
                <li>
                    <a href="<?= qtranxf_convertURL(get_permalink( get_option( 'page_for_posts' ) ) , $cur_lang) ?>">
                        <?=_e('[:ru]Новости[:en]News[:de]Nachrichten')?>
                    </a>
                </li>
                <li>
                    <span><?php the_title(); ?></span>
                </li>
            </ul>
            <h1><?php the_title(); ?></h1>
            <?= get_field('краткое_описание') ?>
            <div class="date"><?= get_the_date('M d, Y'); ?></div> 
        </div>
    </div>
    <div class="detail-news-content">
        <div class="container">
            <?php $img = get_field('главное_изображение'); ?>
            <img class="general-news-img" src="<?= $img['url'] ?>" alt="img">
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

    <!--      any-news-section   -->
    <!--    <div class="any-news-section">-->
    <div class="news mod-details-news">
        <div class="news-wrapper container">
            <div class="news-items">
                <?php 
                    $prev = get_previous_post(); 
                    $next = get_next_post();
                ?>
                <?php if (is_object( $prev ) ) : ?>
                <div class="news-item-wrapper item-animation" data-wow-offset="300">
                    <a class="news-list" href="<?=get_permalink($prev->ID)?>">
                        <?= _e('[:ru]Предыдущая новость[:en]Previous news[:de]Vorherige Nachrichten');?>
                    </a>
                    <a href="<?=get_permalink($prev->ID)?>">
                        <div class="news-item">
                            <div class="news-img">
                                <?=get_the_post_thumbnail($prev->ID,'size_470_310')?>
                                <a href="<?=get_permalink($prev->ID)?>" class="el-btn mod-brown">
                                    <?= _e('[:ru]Читать полностью[:en]Read completely[:de]Lesen Sie mehr ...');?>
                                </a>
                            </div>
                            <div class="news-information">
                                <p class="news-date"><?= get_the_date('d.m.Y',$next); ?></p>
                                <div class="news-name">
                                    <h3><?= get_the_title($prev) ?></h3>
                                </div>
                                <?= get_field('краткое_описание',$prev ) ?>
                            </div>
                        </div>
                    </a>
                </div> 
                <?php endif; ?>
                <?php if (is_object( $next ) ) : ?>
                <div class="news-item-wrapper item-animation" data-wow-offset="300"> 
                    <a class="news-list mod-next" href="<?=get_permalink($next->ID)?>">
                        <?= _e('[:ru]Следующая новость[:en]Next news[:de]Nächste Nachrichten');?>
                    </a>
                    <a href="<?=get_permalink($next->ID)?>">
                        <div class="news-item">
                            <div class="news-img">
                                <?=get_the_post_thumbnail($next->ID,'size_470_310')?>
                                <a href="<?=get_permalink($next->ID)?>" class="el-btn mod-brown">
                                    <?= _e('[:ru]Читать полностью[:en]Read completely[:de]Lesen Sie mehr ...');?>
                                </a>
                            </div>
                            <div class="news-information">
                                <p class="news-date"><?= get_the_date('d.m.Y',$next); ?></p>
                                <div class="news-name">
                                    <h3><?= get_the_title($next) ?></h3>
                                </div>
                                <?= get_field('краткое_описание',$next ) ?>
                            </div>
                        </div>
                    </a>
                </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
    <?php require  $template_path .'form_template.php';  ?>
</div>
<?php 
    get_footer(); 
?>