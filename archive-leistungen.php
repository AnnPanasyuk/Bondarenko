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
<div id="page-body" class="page-body mod-services-page">
    <div class="first-section">
        <div class="img-bg" style="opacity: 0.9; background-image: url(<?=$template_url?>/assets/img/services-page-bg.png)"></div>
        <div class="container">
            <ul class="breadcrumbs">
                <li>
                    <a href="<?=$home_url?>"><?=_e('[:ru]главная[:en]Main[:de]Main')?></a>
                </li>
                <li>
                    <span><?=_e('[:ru]Услуги[:en]Services[:de]Leistungen')?></span>
                </li>
            </ul>
            <h1>
                <?=_e('[:ru]Услуги[:en]Services[:de]Leistungen')?>
            </h1>
            <p>
                <?=_e('[:ru]Услуги, которые я предоставляю'
                        . '[:en]Services I provide'
                        . '[:de]Dienste, die ich anbiete')
                ?>
            </p>
        </div>
    </div>
    
    <?php if( have_posts() ):  ?>
    <?php 
        $index=0; 
        while( have_posts() ): 
            the_post(); 
    ?>
    <!--      services   -->
    <div class="services <?php
        if ($index%2 == 1){
            echo 'mod-right';
        }
        ?>"
    >
        <div class="services-img" style="background-image: url(<?=get_the_post_thumbnail_url(get_the_ID(),'full')?>)"></div>
        <div class="services-wrapper">
            <?php if ( $index==0 ) : ?>
            <h2 class="el-title">
                <?=_e('[:ru]Предоставляю услуги'
                        . '[:en]Provide services'
                        . '[:de]Stellen Sie Dienste zur Verfügung')
                ?>
            </h2>
            <svg class="icon icon-title">
                <use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="<?=$template_url?>/assets/img/symbol/sprite.svg#title"></use>
            </svg>
            <?php endif; ?>
            <div
                    class="services-information <?php
                    if ($index%2 == 0){
                        echo 'right-animation';
                    } else {
                        echo 'left-animation';
                    }
                    ?>"
                    data-wow-offset="10" id="services-information">
                <div class="services-name">
                  <p><?=_e('[:ru]Услуга[:en]Service[:de]Leistungen')?></p>
                  <a href="<?=get_permalink()?>"><?php the_title(); ?></a>
                </div>
                <a class="services-items" href="<?=get_permalink()?>">
                    <?php 
                        $items = get_field('элементы');
                        $iii = 0;
                        foreach ( $items as $item ) :
                    ?>
                    <div class="services-item">
                        <div class="services-icon">
                            <canvas class="chart" id="cont<?php echo $index . $iii; ?>" data-percent="<?= $item['процент_круга'] ?>"></canvas>
                            <img src="<?= $item['иконка']['url'] ?>" alt="services-icon">
                        </div>
                        <?= $item['описание'] ?>
                    </div>
                    <?php $iii++; endforeach; ?>
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
        endwhile; 
        wp_reset_postdata(); 
    ?>
    <?php 
        else :
    ?>
    <div class="text_wrap">
        <h3><?= _e('[:ru]Записей нет.[:en]There are no records.[:de]Es gibt keine Aufzeichnungen.');?></h3>
    </div>
    <?php endif; ?>
        
    <div class="services-form">
        <div class="container">
            <div class="services-form-wrapper">
                <div class="title-animation">
                    <h2>
                        <?=_e('[:ru]Не знаете что правильно заказать?'
                                . '[:en]Do not know what to order correctly?'
                                . '[:de]Weiß nicht, was ich richtig bestellen soll?')
                        ?>
                    </h2>
                    <p>
                        <?=_e('[:ru]Оставьте свои данные и я проконсультирую Вас бесплатно!'
                                . '[:en]Leave your data and I will consult you for free!'
                                . '[:de]Hinterlassen Sie Ihre Daten und ich berate Sie kostenlos!')
                        ?>
                    </p>
                    <svg class="icon icon-title">
                        <use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="<?=$template_url?>/assets/img/symbol/sprite.svg#title"></use>
                    </svg>
                </div>
                <form action="<?=$ajax_url?>" class="services-form-info">
                    <input type="hidden" name="phone" value="">
                    <input type="hidden" name="is_js" value="no_js">
                    <input type="hidden" name="action" value="recall_form">
                    <input type="hidden" name="form" value="Форма. Страничка: Услуги">
                    <input type="hidden" name="post_id" value="<?php the_ID(); ?>">
                    <input type="text" name="name" class="el-btn mod-transparent-grey" placeholder="<?=_e('[:ru]Ваше имя[:en]Name[:de]Name')?>">
                    <input type="text" name="phone_contact" class="el-btn mod-transparent-grey" placeholder="<?=_e('[:ru]Ваш телефон[:en]your phone number[:de]Telefon')?>">
                    <button class="el-btn mod-brown" type="submit"><?=_e('[:ru]отправить заявку[:en]send an application[:de]Sende eine Bewerbung')?></button>
                </form>
            </div>
        </div>
    </div>
        
    <!--      section-about   -->
    <div class="section-about">
        <div class="container">
            <div class="text-wrap">
                <div class="text-wrap-left  left-animation" data-wow-offset="10">
                    <?= get_field('текст_s',$seo_var_id) ?>
                </div>
                <div class="wrap-img right-animation" data-wow-offset="10">
                    <?php $img = get_field('картинка_s',$seo_var_id) ?>
                    <img src="<?= $img['url'] ?>" alt="img">
                </div>
            </div>
        </div>
    </div>
    
    <!--      contacts   -->
    <div class="contacts">
        <div class="contacts-wrapper container">
            <div class="contacts-user">
                <div class="contacts-user-wrapper left-animation" data-wow-offset="10">
                    <h2>
                        <?= get_field('оглавление_формы_f',$settings_var_id) ?>
                    </h2>
                    <?= get_field('описание_формы_f',$settings_var_id) ?>
                    <form action="<?=$ajax_url?>" class="contacts-info">
                        <input type="hidden" name="phone" value="">
                        <input type="hidden" name="is_js" value="no_js">
                        <input type="hidden" name="action" value="recall_form">
                        <input type="hidden" name="form" value="Форма в контактах. Страничка: Услуги">
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
<?php 
    get_footer(); 
?>