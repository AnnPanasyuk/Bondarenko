<?php
    require TEMPLATEPATH . '/includes/base-vars.php'; 
    get_header();
?>
<!-- Begin header -->
<?php require TEMPLATEPATH . '/template/header_inside.php';  ?>

<?php require TEMPLATEPATH . '/template/global_menu.php';  ?>
<!-- End header -->

<!-- Begin page body -->
<div id="page-body" class="page-body mod-specific-event">
    <div class="first-section">
        <?php $img = get_field('картинка_фона'); ?>
        <div class="img-bg" style="background-image: url(<?=$img['url']?>)"></div>
        <div class="container">
            <ul class="breadcrumbs">
                <li>
                    <a href="<?=$home_url?>"><?=_e('[:ru]главная[:en]Main[:de]Main')?></a>
                </li>
                <li>
                    <a href="<?= qtranxf_convertURL(get_post_type_archive_link('portfolio') , $cur_lang) ?>"><?=_e('[:ru]Портфолио[:en]Portfolio[:de]Portfolio')?></a>
                </li>
                <li>
                    <span><?php the_title(); ?></span>
                </li>
            </ul>
            <h1 class="page-titles">
                <?php the_title(); ?>
            </h1>
            <?= get_field('краткое_описание') ?>
        </div>
    </div>
    <?php

    // check if the flexible content field has rows of data
    if( have_rows('контент') ):

         // loop through the rows of data
        $index_cycle = 0;
        while ( have_rows('контент') ) : the_row();

            switch (get_row_layout()) {
                case 'блок_задачи' :
                    ?>
                    <!--      specific-event   -->
                    <div class="specific-event-intro">
                        <div class="container">
                            <div class="task left-animation" data-wow-offset="250">
                                <?= get_sub_field('текст') ?>
                            </div>
                        </div>
                        <div class="stats">
                            <div class="partnership-wrapper">
                                <!--      partnership-steps1   -->
                                <ul class="partnership-steps">
                                    <?php
                                        $items = get_sub_field('этапы_задачи');
                                        foreach ( $items as $item ) :
                                    ?>
                                    <li class="partnership-step">
                                        <div class="next-step"></div>
                                        <div class="partnership-steps-img">
                                            <img src="<?= $item['иконка']['url'] ?>" alt="service-icon">
                                        </div>
                                        <p class="partnership-steps-text">
                                            <?= $item['подпись'] ?>
                                        </p>
                                    </li>
                                    <?php endforeach; ?>
                                </ul>

                                <!--      partnership-steps-2   -->
                                <ul class="partnership-steps mod-circle">
                                    <?php
                                        $items = get_sub_field('исполнение');
                                        $counter = 0;
                                        foreach ( $items as $item ) :
                                    ?>
                                    <li class="partnership-step">
                                        <div class="partnership-img">
                                            <canvas class="chart-spec-events " id="count<?= $counter; ?>" data-percent="<?= $item['процент_круга'] ?>"></canvas>
                                            <p class="partnership-step-info">
                                                <?= $item['текст'] ?>
                                            </p>
                                        </div>
                                        <p class="text">
                                            <?= $item['подпись'] ?>
                                        </p>
                                    </li>
                                    <?php
                                        $counter++;
                                        endforeach; ?>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <?php
                    break;
                case 'текстовый_блок' :
                    ?>
                    <!-- details -->
                    <div class="details">
                        <div class="container">
                            <div class="title-animation">
                                <p class="events-name">
                                    <?= get_sub_field('подпись_оглавления') ?>
                                </p>
                                <h2 class="el-title">
                                    <?= get_sub_field('оглавление') ?>
                                </h2>
                                <svg class="icon icon-title">
                                    <use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="<?= $template_url ?>/assets/img/symbol/sprite.svg#title"></use>
                                </svg>
                                <p class="details-text">
                                    <?= get_sub_field('текст') ?>
                                </p>
                            </div>
                        </div>
                    </div>
                    <?php
                    break;
                case 'слайдер' :
                    ?>
                    <!--      specific-events-gallery   -->
                    <div class="specific-events-gallery">
                        <?php $items = get_sub_field('элементы'); ?>
                        <div class="specific-events-slider">
                            <?php foreach ( $items as $item ) : ?>
                            <div class="slider-item">
                                <img src="<?= $item['картинка']['url'] ?>" alt="slider-img">
                            </div>
                            <?php endforeach; ?>
                        </div>
                        <div class="nav-spec-slider">
                            <div class="current">01</div>/
                            <div class="all"><?= count($items)<10?'0'.count($items):count($items) ?></div>
                        </div>
                    </div>
                    <?php
                    break;
                case 'блок_задач_лево_право' :
                    ?>
                    <?php
                        $index=0;
                        $items = get_sub_field('элементы');
                        foreach ( $items as $item ) :
                    ?>
                    <!--      specific-events-about   -->
                    <div class="section-about">
                        <div class="container">
                            <div class="text-wrap <?= $index % 2 ? 'mod-right' : ''?>">
                                <div class="text-wrap-left <?= $index % 2 ? 'right' : 'left'?>-animation" data-wow-offset="200">
                                    <p class="yel-sub-title">
                                        <?= $item['подпись_оглавления'] ?>
                                    </p>
                                    <h2 class="el-title">
                                        <?= $item['оглавление'] ?>
                                    </h2>
                                    <p class="content-text">
                                        <?= $item['текст'] ?>
                                    </p>
                                </div>
                                <div class="wrap-img <?= $index % 2 ? 'left' : 'right'?>-animation" data-wow-offset="300">
                                    <img src="<?= $item['картинка']['url'] ?>" alt="img">
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php 
                            $index++;
                        endforeach; 
                    ?>
                    <?php
                    break;
                case 'галерея' :
                    ?>
                    <!--      gallery   -->
                    <div class="gallery">
                        <div class="container mod-cards">
                            <div class="title-animation">
                                <h2 class="gallery-title">
                                    <?=_e('[:ru]Фото | Видео отчет[:en]Photo | Video report[:de]Foto | Video bericht')?>
                                </h2>
                            </div>
                            <div class="gallery-items">
                                <?php 
                                    $items = get_sub_field('элементы'); 
                                    $index=0;
                                    foreach ( $items as $item ) :
                                ?>
                                <a data-fancybox="gallery<?= $index_cycle ?>" href="<?= !$item['видео']?$item['фото']['url']:$item['видео_вставка_с_ютюба'] ?>" class="gallery-item mod-biography">
                                    <img src="<?= $item['фото']['sizes']['size_510_350'] ?>" alt="gallery-img">
                                    <?php if( $index < 6 ) : ?>
                                        <?php if( $index < 5 ) : ?>
                                            <?php if( !$item['видео'] ) : ?>
                                                <span class="el-btn mod-brown">
                                                    <?=_e('[:ru]Посмотреть ближе[:en]Look closer[:de]Schau genauer hin')?>
                                                </span> 
                                            <?php else : ?>
                                                <span class="gallery-btn"></span> 
                                            <?php endif; ?>
                                        <?php else : ?>
                                            <div class="items-count">
                                                <p></p>
                                            </div>
                                        <?php endif; ?>
                                    <?php else : ?>
                                        <a data-fancybox="<?= $index_cycle ?>" href="<?= $item['фото']['url'] ?>" class="gallery-item mod-biography">
                                            <img src="<?= $item['фото']['sizes']['size_510_350'] ?>" alt="gallery-img">
                                        </a>
                                    <?php endif; ?>
                                </a>
                                <?php
                                    $index++;
                                    endforeach; 
                                ?>                                
                            </div>            
                        </div>
                    </div>
                    <?php
                    break;
                case 'текстовый_блок_с_картинкой' :
                    ?>
                    <!-- event-review -->
                    <div class="event-review">
                        <div class="container">
                            <div class="event-review-wrapper">
                                <div class="event-review-info left-animation" data-wow-offset="300">
                                    <p class="event-review-name">
                                        <?= get_sub_field('подпись_оглавления') ?>
                                    </p>
                                    <h2 class="el-title">
                                        <?= get_sub_field('оглавление') ?>
                                    </h2>
                                    <p class="event-review-text">
                                        <?= get_sub_field('текст') ?>
                                    </p>
                                </div>
                                <div class="event-review-img right-animation" data-wow-offset="400">
                                    <?php $img = get_sub_field('картинка'); ?>
                                     <img src="<?= $img['url'] ?>" alt="review-img">
                                </div>
                            </div>  
                        </div>
                    </div>
                    <?php
                    break;
                case 'форма_обратной_связи' :
                    require  $template_path .'form_template.php'; 
                    break;
            }
            $index_cycle++;
        endwhile;
    else :
    ?>
        <div class="text_wrap">
            <h3><?=_e('[:ru]Контент не наполнен![:en]Content is not full![:de]Der Inhalt ist nicht voll!')?></h3>
        </div>
    <?php
    endif;
    ?>
</div>
<?php 
    get_footer();
?>