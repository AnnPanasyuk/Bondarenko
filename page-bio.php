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
<div id="page-body" class="page-body mod-biography">
    <div class="first-section">
        <?php $img= get_field('картинка_фона'); ?>
        <div class="img-bg" style="opacity:0.5;background-image: url(<?=$img['url']?>)"></div>
        <div class="container">
            <ul class="breadcrumbs">
                <li>
                    <a href="<?=$home_url?>"><?=_e('[:ru]главная[:en]Main[:de]Main')?></a>
                </li>
                <li>
                    <span><?php the_title(); ?></span>
                </li>
            </ul>
            <h1>
                <?= get_field('оглавление')?>
            </h1>
            <?= get_field('описание')?>
        </div>
    </div>
    <!-- details -->
    <div class="details">
        <div class="container">
            <div class="title-animation">
                <p class="events-name"><?=_e('[:ru]немного биографии[:en]little biography[:de]kleine Biografie')?></p>
                <h2 class="el-title">
                    <?= get_field('оглавление_2')?>
                </h2>
                <svg class="icon icon-title">
                    <use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="<?=$template_url?>/assets/img/symbol/sprite.svg#title"></use>
                </svg>
                <?= get_field('описание_2')?>
             </div>
        </div>
    </div>
    <!-- career -->

    <div class="career">
        <div class="container">
            <div class="title-animation">
                <h2 class="el-title"><?= get_field('оглавление_3')?></h2>
            </div>
            <ul class="career-items">
                <li class="career-img mod-first">
                    <img src="<?=$template_url?>/assets/img/career-icon1.png" alt="career-icon">
                </li>
                <?php 
                    $items= get_field('элементы_3');
                    $index=0;
                    foreach ( $items as $item ) :
                        ?>
                <li class="career-item <?= $index % 2 ? 'mod-left' : 'mod-right' ?> ">
                    <p class="career-year <?= $index % 2 ? 'mod-first' : 'mod-right' ?>"><?=$item['год']?></p>
                    <p class="career-text"><?=$item['оглавление']?>
                        <span><?=$item['описание']?></span>
                    </p>
                </li>
                <?php
                    $index++;
                    endforeach; ?>
            </ul>
        </div>
    </div>


    <!-- career-horizontal -->
    <div class="career mod-horizontal">
        <div class="container">
            <div class="title-animation">
                <h2 class="el-title">
                    Пропущенный текст
                    <?= get_field('оглавление_4')?>
                </h2>
            </div>
            <div class="career-humor-wrapper">
                <div class="career-img ">
                    <img src="<?=$template_url?>/assets/img/career-icon1.png" alt="career-icon">
                </div>
                <ul class="career-items">
                    <?php
                        $items= get_field('элементы_4');
                        $index = 0;
                        foreach ( $items as $item ) :
                    ?>
                    <li class="career-item <?= $index % 2 ? 'mod-top-last' : 'mod-top-first' ?>">
                        <p class="career-year"><?= $item['год'] ?></p>
                        <p class="career-text"><?= $item['оглавление'] ?>
                            <?= $item['описание'] ?>
                        </p>
                    </li>
                    <?php
                        $index++;
                        endforeach; ?>
                </ul>
                <div class="career-img">
                    <img src="<?=$template_url?>/assets/img/career-icon2.png" alt="career-icon">
                </div>
            </div>
        </div>
    </div>

    <!-- career-horizontal -->
    <div class="career mod-adaptive">
        <div class="container">
            <div class="title-animation">
                <h2 class="el-title"><?= get_field('оглавление_4')?></h2>
            </div>
            <ul class="career-items">
                <li class="career-img mod-first">
                    <img src="<?=$template_url?>/assets/img/career-icon1.png" alt="career-icon">
                </li>
                <?php
                    $items= get_field('элементы_4');
                    $index = 0;
                    foreach ( $items as $item ) :
                ?>
                <li class="career-item <?= $index % 2 ? 'mod-right' : 'mod-left' ?> ">
                    <p class="career-year <?= $index % 2 ? 'mod-first' : 'mod-right' ?>"><?= $item['год'] ?></p>
                    <p class="career-text mod-bottom">
                        <?= $item['оглавление'] ?>
                        <?= $item['описание'] ?>
                    </p>
                </li>
                <?php $index++; endforeach; ?>
                <li class="career-img mod-last">
                    <img src="<?=$template_url?>/assets/img/career-icon2.png" alt="career-icon">
                </li>            
            </ul>
        </div>
    </div>


    <!--      gallery   -->
    <div class="gallery">
        <div class="container">
            <div class="gallery-items">
                <?php
                    $items= get_field('элементы_5');
                    $index=0;
                    foreach ( $items as $item ) :
                ?>
                    <a data-fancybox="gallery1" href="<?= !$item['видео_картинка']?$item['картинка']['url']:$item['видео'] ?>" class="gallery-item mod-biography">
                        <img src="<?= $item['картинка']['sizes']['size_510_350'] ?>" alt="gallery-img">
                        <?php if( $index < 3 ) : ?>
                            <?php if( $index < 2 ) : ?>
                                <?php if( !$item['видео_картинка'] ) : ?>
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
                            <a data-fancybox="gallery1" href="<?= $item['картинка']['url'] ?>" class="gallery-item mod-biography">
                                <img src="<?= $item['картинка']['sizes']['size_510_350'] ?>" alt="gallery-img">
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



    <!-- career -->
    <div class="career">
        <div class="container">
            <div class="title-animation">
                <h2 class="el-title"><?= get_field('оглавление_6') ?></h2>
            </div>
                <ul class="career-items">
                    <li class="career-img mod-first">
                        <img src="<?=$template_url?>/assets/img/career-icon3.png" alt="career-icon">
                    </li>
                    <?php
                        $items = get_field('элементы_6');
                        $index = 0;
                        foreach ( $items as $item ) :
                    ?>
                    <li class="career-item <?= $index % 2 ? 'mod-right' : 'mod-left' ?>">
                        <p class="career-year <?= $index % 2 ? '' : 'mod-right' ?>"><?= $item['год'] ?></p>
                        <p class="career-text">
                            <?= $item['оглавление'] ?>
                            <span>
                                <?= $item['описание'] ?>
                            </span>
                        </p>
                    </li>
                    <?php
                        $index++;
                        endforeach; ?>
            </ul>
        </div>
    </div>
    <!--      gallery   -->
    <div class="gallery mod-last">
        <div class="container">
            <div class="gallery-items">
            <?php
                    $items= get_field('элементы_7');
                    $index=0;
                    foreach ( $items as $item ) :
                ?>
                    <a data-fancybox="gallery" href="<?= !$item['видео_картинка']?$item['картинка']['url']:$item['видео'] ?>" class="gallery-item mod-biography">
                        <img src="<?= $item['картинка']['sizes']['size_510_350'] ?>" alt="gallery-img">
                        <?php if( $index < 3 ) : ?>
                            <?php if( $index < 2 ) : ?>
                                <?php if( !$item['видео_картинка'] ) : ?>
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
                            <a data-fancybox="gallery" href="<?= $item['картинка']['url'] ?>" class="gallery-item mod-biography">
                                <img src="<?= $item['картинка']['sizes']['size_510_350'] ?>" alt="gallery-img">
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
</div>
<?php 
    get_footer(); 
?>