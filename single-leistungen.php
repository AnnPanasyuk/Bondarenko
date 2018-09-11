<?php
    require TEMPLATEPATH . '/includes/base-vars.php'; 
    get_header();
?>
<!-- Begin header -->
<?php require TEMPLATEPATH . '/template/header_inside.php';  ?>

<?php require TEMPLATEPATH . '/template/global_menu.php';  ?>
<!-- End header -->

<!-- Begin page body -->
<div id="page-body" class="page-body mod-corporate-event">
    <div class="first-section">
        <?php $img = get_field('картинка_фона'); ?>
        <div class="img-bg" style="background-image: url(<?=$img['url']?>)"></div>
        <div class="container">
            <ul class="breadcrumbs">
                <li>
                    <a href="<?=$home_url?>"><?=_e('[:ru]главная[:en]Main[:de]Main')?></a>
                </li>
                <li>
                    <a href="<?= qtranxf_convertURL(get_post_type_archive_link('leistungen') , $cur_lang) ?>"><?=_e('[:ru]Услуги[:en]Services[:de]Leistungen')?></a>
                </li>
                <li>
                    <span><?php the_title(); ?></span>
                </li>
            </ul>
            <h1>
                <?php the_title(); ?>
            </h1>
            <?= get_field('краткое_описание') ?>
        </div>
        <div class="line-item"><a href="#partnership_section"></a></div>
    </div>
    <!--      partnership   -->
    <div class="partnership" id="partnership_section">
        <div class="container">
            <div class="partnership-wrapper">
                <div class="title-animation">
                    <h2>
                        <?= get_field('оглавление_блока_процеса') ?>
                    </h2>
                    <svg class="icon icon-title">
                        <use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="<?= $template_url ?>/assets/img/symbol/sprite.svg#title"></use>
                    </svg>
                </div>
                <ul class="partnership-steps"> 
                    <?php $items = get_field('элементы_процеса');
                        $iii = 0;
                    ?>
                    <?php foreach ( $items as $item ) : ?>
                    <li class="partnership-step">
                        <div class="next-step"></div>
                        <div class="partnership-img">
                            <canvas id="content<?php echo $iii;?>" class="chart-events" data-percent="<?= $item['процент_круга'] ?>"></canvas>
                            <img src="<?= $item['иконка']['url'] ?>" alt="service-icon">
                        </div>
                        <?= $item['описание'] ?>
                    </li>
                    <?php $iii++; endforeach; ?>
                </ul>
            </div>
        </div>
    </div>
    <?php

    // check if the flexible content field has rows of data
    if( have_rows('контент') ):

         // loop through the rows of data
        $index_cycle = 0;
        while ( have_rows('контент') ) : the_row();

            switch (get_row_layout()) {
                case 'блоки_лево_право' :
                    $items = get_sub_field('элементы');
                    ?>
                    <!--      corporate-events  -->
                    <?php $index=0; foreach ( $items as $item ) : ?>
                    <div class="corporate-events mod-corporate-event <?php
                        if ($index%2 == 0){
                            echo 'mod-first';
                        }         ?>"
                    >
                        <div class="container">
                            <div class="corporate-events-wrapper <?= $index % 2 ? 'mod-left right-animation' : ''?>">
                                <div class="corporate-events-img <?= $index % 2 ? '' : 'left-animation'?>" data-wow-offset="300">
                                    <a href="#">
                                        <img src="<?= $item['картинка']['url'] ?>" alt="corp-img">
                                    </a>
                                </div>
                                <div class="corporate-events-desc <?= $index % 2 ? 'left' : 'right'?>-animation" data-wow-offset="300">
                                    <h2>
                                        <?=_e('[:ru]Услуга[:en]Service[:de]Leistungen')?> <a href="#"><?= $item['оглавление'] ?></a>
                                    </h2>
                                    <?= $item['текст'] ?>
                                    <a href="#" class="el-look-more mod-order" data-id="<?php the_ID(); ?>">
                                        <span class="look-more-button"></span>
                                        <span class="look-more-text"><?=_e('[:ru]заказать сейчас[:en]order now[:de]jetzt bestellen')?></span>
                                    </a> 
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php $index++; endforeach; ?>
                    <?php
                    break;
                case 'блок_галереи' :
                    ?>
                    <!--      corporate-photos   -->
                    <div class="my-work mod-events-pages">
                        <div class="title-animation">
                            <h2 class="el-title">
                                Пропущен текст
                                <?= get_sub_field('оглавление') ?>
                            </h2>
                            <svg class="icon icon-title">
                                <use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="<?= $template_url ?>/assets/img/symbol/sprite.svg#title"></use>
                            </svg>
                        </div>
                        <div class="my-work-wrapper">
                            <div class="container">
                                <div class="images">
                                    <?php $items = get_sub_field('элементы'); ?>
                                    <div class="container1">
                                        <div class="medium mod-top">
                                            <div class="img-item little ">
                                                <img src="<?=$items[0]['главное_фото']['url']?>" alt="my-work-img">
                                                <a href="<?=$items[0]['главное_фото']['url']?>" class="el-btn mod-brown" data-fancybox="gallery0">
                                                    <?=_e('[:ru]Смотреть галерею[:en]View gallery[:de]Galerie ansehen')?>
                                                </a>
                                                <div style="display:none">
                                                    <?php 
                                                        $gal_items = $items[0]['галерея'];
                                                        foreach ( $gal_items as $item) :
                                                    ?>
                                                    <a href="<?=wp_get_attachment_image_url($item['картинка']['id'],'full') ?>" data-fancybox="gallery0"></a>
                                                    <?php endforeach; ?>
                                                </div>
                                            </div>  
                                            <div class="img-item little mod-smaller">
                                                <img src="<?=$items[1]['главное_фото']['url']?>" alt="my-work-img">
                                                <a href="<?=$items[1]['главное_фото']['url']?>" class="el-btn mod-brown" data-fancybox="gallery1">
                                                    <?=_e('[:ru]Смотреть галерею[:en]View gallery[:de]Galerie ansehen')?>
                                                </a>
                                                <div style="display:none">
                                                    <?php 
                                                        $gal_items = $items[1]['галерея'];
                                                        foreach ( $gal_items as $item) :
                                                    ?>
                                                    <a href="<?=wp_get_attachment_image_url($item['картинка']['id'],'full') ?>" data-fancybox="gallery1"></a>
                                                    <?php endforeach; ?>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="medium mod-bottom">
                                            <div class="img-item little mod-smaller">
                                                <img src="<?=$items[2]['главное_фото']['url']?>" alt="my-work-img">
                                                <a href="<?=$items[2]['главное_фото']['url']?>" class="el-btn mod-brown" data-fancybox="gallery2">
                                                    <?=_e('[:ru]Смотреть галерею[:en]View gallery[:de]Galerie ansehen')?>
                                                </a>
                                                <div style="display:none">
                                                    <?php 
                                                        $gal_items = $items[2]['галерея'];
                                                        foreach ( $gal_items as $item) :
                                                    ?>
                                                    <a href="<?=wp_get_attachment_image_url($item['картинка']['id'],'full') ?>" data-fancybox="gallery2"></a>
                                                    <?php endforeach; ?>
                                                </div>
                                            </div>
                                            <div class="img-item little ">
                                                <img src="<?=$items[3]['главное_фото']['url']?>" alt="my-work-img">
                                                <a href="<?=$items[3]['главное_фото']['url']?>" class="el-btn mod-brown" data-fancybox="gallery3">
                                                    <?=_e('[:ru]Смотреть галерею[:en]View gallery[:de]Galerie ansehen')?>
                                                </a>
                                                <div style="display:none">
                                                    <?php 
                                                        $gal_items = $items[3]['галерея'];
                                                        foreach ( $gal_items as $item) :
                                                    ?>
                                                    <a href="<?=wp_get_attachment_image_url($item['картинка']['id'],'full') ?>" data-fancybox="gallery3"></a>
                                                    <?php endforeach; ?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="img-item container2">
                                        <img src="<?=$items[4]['главное_фото']['url']?>" alt="my-work-img">
                                        <a href="<?=$items[4]['главное_фото']['url']?>" class="el-btn mod-brown" data-fancybox="gallery4">
                                            <?=_e('[:ru]Смотреть галерею[:en]View gallery[:de]Galerie ansehen')?>
                                        </a>
                                        <div style="display:none">
                                            <?php 
                                                $gal_items = $items[4]['галерея'];
                                                foreach ( $gal_items as $item) :
                                            ?>
                                            <a href="<?=wp_get_attachment_image_url($item['картинка']['id'],'full') ?>" data-fancybox="gallery4"></a>
                                            <?php endforeach; ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php
                    break;
                case 'блок_отзывов' :
                    require  $template_path .'reviews_block.php';
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