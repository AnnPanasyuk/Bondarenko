<?php
    require TEMPLATEPATH . '/includes/base-vars.php'; 
    get_header();
?>
<!-- Begin header -->
<?php require TEMPLATEPATH . '/template/header_inside.php';  ?>

<?php require TEMPLATEPATH . '/template/global_menu.php';  ?>
<!-- End header -->

<!-- Begin page body -->
<div id="page-body" class="page-body js-index">
    
    <div class="main-information-wrapper">
        <div class="slider-top">
            <?php 
                $items = get_field('слайдер_1');
                foreach ( $items as $item ) :
            ?>
            <div class="slider-top-item" style="background-image: url('<?= $item['картинка_фона']['url'] ?>')">
                <div class="wrapper-content-slider container">
                    <div class="main-information-desc">
                        <p class="title"><?= $item['должность'] ?></p>
                        <p class="name"><?= $item['имя'] ?></p>
                        <a href="<?= $item['ссылка_на_видео_youtube'] ?>" data-fancybox class="el-look-more mod-video">
                            <span class="look-more-button"></span>
                            <span class="look-more-text"><?=_e('[:ru]смотреть промо-видео[:en]watch promo video[:de]Sehen Sie sich das Promo-Video')?></span>
                        </a>
                    </div>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
        <div class="container">
            <div class="slider-footer-container container">
                <ul class="el-social mod-grey">
                    <li>
                        <a href="<?= get_field('ссылка_на_youtube',$settings_var_id)?>">
                            <svg class="icon icon-yt">
                                <use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="<?= $template_url ?>/assets/img/symbol/sprite.svg#yt"></use>
                            </svg>
                        </a>
                    </li>
                    <li>
                        <a href="<?= get_field('ссылка_на_twitter',$settings_var_id)?>">
                            <svg class="icon icon-tw">
                                <use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="<?= $template_url ?>/assets/img/symbol/sprite.svg#tw"></use>
                            </svg>
                        </a>
                    </li>
                    <li>
                        <a href="<?= get_field('ссылка_на_g+',$settings_var_id)?>">
                            <svg class="icon icon-gl">
                                <use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="<?= $template_url ?>/assets/img/symbol/sprite.svg#gl"></use>
                            </svg>
                        </a>
                    </li>
                </ul>
                <div class="nav-slider">
                    <div class="current">01</div>
                    /
                    <div class="all"><?= count($items)<10 ? '0'.count( $items ) : count( $items ) ?></div>
                </div>
            </div>
        </div>
        <div class="line-item"><a href="#services"></a></div>
    </div>
    
       <?php

    // check if the flexible content field has rows of data
    if( have_rows('контент') ):

         // loop through the rows of data
        $index_cycle = 0;
        while ( have_rows('контент') ) : the_row();

            switch (get_row_layout()) {
                case 'блок_услуг' :
                    $args = array(
                        'nopaging'=>true,
                        'post_type'   => 'leistungen',
                        'suppress_filters' => true, // подавление работы фильтров изменения SQL запроса
                    );
                    $posts = get_posts( $args );
                    $index=0;
                    foreach($posts as $post): setup_postdata($post);
                    ?>
                    <!--      services   -->
                    <div class="services <?= $index % 2 ? 'mod-right' : ''?>" id="services">
                        <div class="services-img" style="background-image: url(<?=get_the_post_thumbnail_url(get_the_ID(),'full')?>)"></div>
                        <div class="services-wrapper">
                            <?php if ( $index==0 ) : ?>
                            <div class="title-animation wow fadeIn">
                                <h2 class="el-title">
                                    <?=_e('[:ru]Предоставляю услуги'
                                            . '[:en]Provide services'
                                            . '[:de]Stellen Sie Dienste zur Verfügung')
                                    ?>
                                </h2>
                                <svg class="icon icon-title">
                                    <use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="<?=$template_url?>/assets/img/symbol/sprite.svg#title"></use>
                                </svg>
                            </div>
                            <?php endif; ?>
                            <div class="services-information <?= $index % 2 ? 'left' : 'right'?>-animation" data-wow-offset="10">
                                <div class="services-name">
                                  <p><?=_e('[:ru]Услуга[:en]Service[:de]Leistungen')?></p>
                                  <a href="<?=get_permalink()?>"><?php the_title(); ?></a>
                                </div>
                                <a class="services-items" href="<?=get_permalink()?>">
                                    <?php 
                                        $items = get_field('элементы');
                                        $ind2= 0;
                                        foreach ( $items as $item ) :
                                    ?>
                                    <div class="services-item">
                                        <div class="services-icon">
                                            <canvas id="curr<?php echo $index . $ind2; ?>" class="chart" data-percent="<?= $item['процент_круга'] ?>"></canvas>
                                            <img src="<?= $item['иконка']['url'] ?>" alt="services-icon">
                                        </div>
                                        <?= $item['описание'] ?>
                                    </div>
                                    <?php $ind2++; endforeach; ?>
                                </a>
                                <div class="el-look-more">
                                    <a href="<?=get_permalink()?>" class="look-more-button"></a>
                                    <a href="<?=get_permalink()?>" class="look-more-text"><?=_e('[:ru]читать больше[:en]read more[:de]Lesen Sie mehr')?></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php 
                        $index++;
                    endforeach;
                    wp_reset_postdata(); 
                    break;
                case 'блок_с_описанием' :
                    ?>
                    <!--      my-work   -->
                    <div class="my-work">
                        <div class="my-work-wrapper">
                            <div class="information">
                                <div class="title-animation wow fadeIn">
                                    <?= get_sub_field('оглавление') ?>
                                </div>
                                <?= get_sub_field('описание') ?>
                                <a href="<?= get_sub_field('ссылка') ?>" class="el-look-more">
                                    <span class="look-more-button"></span>
                                    <span class="look-more-text"><?=_e('[:ru]читать больше[:en]read more[:de]Lesen Sie mehr')?></span>
                                </a>
                            </div>
                            <div class="images">
                                <?php $images = get_sub_field( 'картинки' ); ?>
                                <div class="container1">
                                    <div class="medium mod-top">
                                        <div class="little ">
                                            <img src="<?= $images[0]['картинка']['url'] ?>" alt="my-work-img">
                                        </div>
                                        <div class="little mod-smaller">
                                            <img src="<?= $images[1]['картинка']['url'] ?>" alt="my-work-img">
                                        </div>
                                    </div>
                                    <div class="medium mod-bottom">
                                        <div class="little mod-smaller">
                                            <img src="<?= $images[2]['картинка']['url'] ?>" alt="my-work-img">
                                        </div>
                                        <div class="little ">
                                            <img src="<?= $images[3]['картинка']['url'] ?>" alt="my-work-img">
                                        </div>
                                    </div>
                                </div>
                                <div class="container2">
                                    <img src="<?= $images[4]['картинка']['url'] ?>" alt="my-work-img">
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php
                    break;
                case 'формат_сотрудничества' :
                    ?>
                    <!--      partnership   -->
                    <div class="partnership">
                        <div class="container">
                            <div class="partnership-wrapper">
                                <div class="title-animation">
                                    <h2>
                                        <?= get_sub_field( 'оглавление' ) ?>
                                    </h2>
                                    <svg class="icon icon-title">
                                        <use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="<?=$template_url?>/assets/img/symbol/sprite.svg#title"></use>
                                    </svg>
                                </div>
                                <div class="partnership-steps">
                                    <?php
                                        $items = get_sub_field( 'элементы' );
                                        $iii = 0;
                                        foreach ( $items as $item ) :

                                    ?>
                                    <div class="partnership-step">
                                        <div class="next-step"></div>
                                        <div class="partnership-img">
                                            <canvas id="partnership<?php echo $iii; ?>" class="chart-color" data-percent="<?= $item['проценты_круга'] ?>"></canvas>
                                            <img src="<?= $item['иконка']['url'] ?>" alt="service-icon">
                                        </div>
                                        <p>
                                            <?= $item['описание'] ?>
                                        </p>
                                    </div>
                                    <?php $iii++; endforeach; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php
                    break;
                case 'блок_мероприятий' :
                    ?>
                    <!--      events   -->

                    <div class="events">
                        <div class="events-wrapper">
                            <div class="title-animation">
                                <h2 class="el-title"><?= get_sub_field( 'оглавление' ) ?></h2>
                                <svg class="icon icon-title">
                                    <use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="<?=$template_url?>/assets/img/symbol/sprite.svg#title"></use>
                                </svg>
                            </div>
                            <div class="slider-events mod-pl">
                                <?php
                                    // параметры по умолчанию
                                    $args = array(
                                            'numberposts' => 10,
                                            'post_type'   => 'portfolio',
                                            'suppress_filters' => true, // подавление работы фильтров изменения SQL запроса
                                    );

                                    $posts = get_posts( $args );

                                    foreach($posts as $post): 
                                        setup_postdata($post);
                                        $img = get_field('превью_картинка_для_главной');
                                ?>
                                <a href="<?= get_permalink() ?>" class="slider-item" style="background-image: url('<?= $img['sizes']['size_470_700'] ?>')">
                                    <div class="img-overlay"></div>
                                    <div class="slider-info">
                                        <div class="date"><?= get_the_date('d / m / Y'); ?></div>
                                        <h2><?= get_field('название') ?></h2>
                                        <div class="el-look-more">
                                            <div class="look-more-button"></div>
                                            <div class="look-more-text">
                                                <?=_e('[:ru]читать больше[:en]read more[:de]Lesen Sie mehr')?>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                                <?php 
                                    endforeach;
                                    wp_reset_postdata();
                                ?>
                            </div>
                            <a href="<?= qtranxf_convertURL(get_post_type_archive_link('portfolio') , $cur_lang) ?>" class="el-btn mod-brown">
                                <?=_e('[:ru]Смотреть все[:en]See all[:de]Alle anzeigen')?>
                            </a>
                        </div>
                    </div>
                    <?php
                    break;
                case 'блок_новостей' :
                    ?>
                    <!--      news   -->
                    <div class="news">
                        <div class="news-wrapper container">
                            <div class="title-animation">
                                <h2 class="el-title">
                                    <?= get_field('текстовка_первого_экрана_n',$seo_var_id) ?>
                                </h2>
                            </div>
                            <div class="news-items news-slider">
                                <?php
                                    // параметры по умолчанию
                                    $args = array(
                                            'numberposts' => 3,
                                            'post_type'   => 'post',
                                            'suppress_filters' => true, // подавление работы фильтров изменения SQL запроса
                                    );

                                    $posts = get_posts( $args );

                                    foreach($posts as $post): 
                                        setup_postdata($post);
                                ?>
                                    <!--
                                <a href="<?=get_permalink()?>">
                                -->
                                    <div class="news-item item-animation" data-wow-offset="-50">
                                        <div class="news-img">
                                            <?=get_the_post_thumbnail(get_the_ID(),'size_470_310')?>
                                            <a href="<?=get_permalink()?>" class="el-btn mod-brown">
                                                <?= _e('[:ru]Читать полностью[:en]Read completely[:de]Lesen Sie mehr ...');?>
                                            </a>
                                        </div>
                                        <div class="news-information">
                                            <p class="news-date"><?= get_the_date('d.m.Y'); ?></p>
                                            <div class="news-name">
                                                <h3><a href="#"><?php the_title(); ?></a></h3>
                                            </div>
                                            <?= get_field('краткое_описание') ?>
                                        </div>
                                    </div>
                                    <!--
                                </a>
                                     -->
                                <?php 
                                    endforeach;
                                    wp_reset_postdata();
                                ?>
                            </div>
                            <a href="<?= qtranxf_convertURL(get_permalink( get_option( 'page_for_posts' ) ) , $cur_lang) ?>" class="el-btn mod-brown">
                                <?=_e('[:ru]Смотреть все[:en]See all[:de]Alle anzeigen')?>
                            </a>
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
    <!--      contacts   -->
    <div class="contacts">
        <div class="contacts-wrapper container">
            <div class="contacts-user">
                <div class="contacts-user-wrapper left-animation" data-wow-offset="10">
                    <h2><?=_e('[:ru]Свяжитесь со мной[:en]Contact me[:de]Kontaktieren Sie mich')?></h2>
                    <p>
                        <?=_e('[:ru]Оставьте свои данные! <br> В течении пары часов я свяжусь с Вами!'
                                . '[:en]Leave your data! <br> Within a couple of hours I will contact you!'
                                . '[:de]Hinterlassen Sie Ihre Daten! <br> Innerhalb von ein paar Stunden werde ich Sie kontaktieren!')?>
                    </p>
                    <form action="<?=$ajax_url?>" class="contacts-info">
                        <input type="hidden" name="phone" value="">
                        <input type="hidden" name="is_js" value="no_js">
                        <input type="hidden" name="action" value="recall_form">
                        <input type="hidden" name="form" value="Форма. Страничка: <?php the_title(); ?>">
                        <input type="hidden" name="post_id" value="<?php the_ID(); ?>">
                        <input type="text" name="name" class="el-btn mod-transparent-grey" placeholder="<?=_e('[:ru]Ваше имя[:en]Name[:de]Name')?>">
                        <input type="text" name="phone_contact" class="el-btn mod-transparent-grey" placeholder="<?=_e('[:ru]Ваш телефон[:en]your phone number[:de]Telefon')?>">
                        <button class="el-btn mod-brown" type="submit"><?=_e('[:ru]отправить заявку[:en]send an application[:de]Sende eine Bewerbung')?></button>
                    </form>
                </div>
                <div class="map-wrapper">
                    <div class="map-image" id="map"></div>
                </div>
            </div>
            <div class="contacts-company right-animation" data-wow-offset="10">
                <h2><?=_e('[:ru]Контакты[:en]Contacts[:de]Kontaktieren')?></h2>
                <?php
                    $items = get_field('контактные_групы',$settings_var_id);
                    foreach ( $items as $item ) :
                ?>
                <ul class="items">
                    <li class="contacts-city"><?= $item['адрес'] ?></li>
                    <li class="item">
                        <span class="title"><?=_e('[:ru]Телефон[:en]Phone[:de]Telefon')?>:</span>
                        <a href="tel:<?= $item['телефон'] ?>"><span><?= $item['телефон'] ?></span></a>
                    </li>
                    <li class="item"><span class="title"><?=_e('[:ru]Почта[:en]E-mail[:de]E-mail')?>:</span>
                        <a href="mailto:<?= $item['e-mail'] ?>"><span><?= $item['e-mail'] ?></span></a>
                    </li>
                    <li class="item"><span class="title"><?=_e('[:ru]Адрес[:en]Adress[:de]Adresse')?>:</span>
                        <span><?= $item['адрес_детально'] ?></span>
                    </li>
                </ul>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</div>
  <!-- End page body -->
<?php 
    get_footer(); 
?>