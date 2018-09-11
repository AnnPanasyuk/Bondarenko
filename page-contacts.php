<?php
/*
Template Name: Контакты
*/
    require TEMPLATEPATH . '/includes/base-vars.php'; 
    get_header();
?>
<!-- Begin header -->
<?php require TEMPLATEPATH . '/template/header_inside.php';  ?>

<?php require TEMPLATEPATH . '/template/global_menu.php';  ?>
<!-- End header -->

<!-- Begin page body -->
<div id="page-body" class="page-body mod-contact">
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
            <?php 
                global $post;            
                setup_postdata($post); 
                the_content();
            ?>
        </div>
    </div>
    <div class="contact-page-content">
        <div class="container">
            <div class="contact-wrap-page">
                <div class="contact-form-wrap left-animation" data-wow-offset="300">
                    <h2 class="el-title"><?=_e('[:ru]Свяжитесь со мной[:en]Contact me[:de]Kontaktieren Sie mich')?></h2>
                    <p class="content-text">
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
                <div class="contact-text-wrap">
                    <div class="contacts-company right-animation" data-wow-offset="300" data-wow-duration=".5s">
                        <h2 class="contacts-title"><?=_e('[:ru]Контакты[:en]Contacts[:de]Kontaktieren')?></h2>
                        <?php
                            $items = get_field('контактные_групы',$settings_var_id);
                            foreach ( $items as $item ) :
                        ?>
                        <ul class="items">
                            <li class="contacts-city"><?= $item['адрес'] ?></li>
                            <li class="item">
                                <span class="title"><?=_e('[:ru]Телефон[:en]Phone[:de]Telefon')?>:</span>
                                <span><?= $item['телефон'] ?></span>
                            </li>
                            <li class="item"><span class="title"><?=_e('[:ru]Почта[:en]E-mail[:de]E-mail')?>:</span>
                                <span><?= $item['e-mail'] ?></span>
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
    </div>
    <div class="map-wrap">
        <div class="map-image" id="map"></div>
    </div>

    <div class="section-about">
        <div class="container">
            <div class="text-wrap">
                <div class="text-wrap-left  left-animation" data-wow-offset="200">
                    <?= get_field('текст_c',$seo_var_id) ?>
                </div>
                <div class="wrap-img right-animation" data-wow-offset="300">
                    <?php $img = get_field('картинка_c',$seo_var_id) ?>
                    <img src="<?= $img['url'] ?>" alt="img">
                </div>
            </div>
        </div>
    </div>
</div>
<?php 
    get_footer(); 
?>