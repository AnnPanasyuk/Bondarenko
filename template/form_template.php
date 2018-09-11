<div class="services-form">
    <div class="container">
        <div class="services-form-wrapper">
            <div class="title-animation wow fadeIn" style="animation-duration: 0.3s; opacity: 1; visibility: visible; animation-name: fadeIn;">
            <h2><?=_e('[:ru]Заполните форму[:en]Fill the form[:de]Füllen Sie das Formular aus')?></h2>
            <p>
                <?=_e('[:ru]и я свяжусь с Вами в течении пары часов!'
                        . '[:en]and I will contact you within a couple of hours!'
                        . '[:de]und ich werde dich in ein paar Stunden kontaktieren!')?>
            </p>
            <svg class="icon icon-title">
                <use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="<?=$template_url?>/assets/img/symbol/sprite.svg#title"></use>
            </svg>
            </div>
            <form action="<?=$ajax_url?>" class="services-form-info">
                <input type="hidden" name="phone" value="">
                <input type="hidden" name="is_js" value="no_js">
                <input type="hidden" name="action" value="recall_form">
                <input type="hidden" name="form" value="Форма. Страничка: <?php the_title(); ?>">
                <input type="hidden" name="post_id" value="<?php the_ID(); ?>">
                <input type="text" name="name" class="el-btn mod-transparent-grey" placeholder="<?=_e('[:ru]Ваше имя[:en]Name[:de]Name')?>">
                <input type="text" name="phone_contact" class="el-btn mod-transparent-grey" placeholder="<?=_e('[:ru]Ваш телефон[:en]your phone number[:de]Telefon')?>" im-insert="true">
                <button type="submit" class="el-btn mod-transparent-brown">
                    <?=_e('[:ru]отправить заявку[:en]send an application[:de]Sende eine Bewerbung')?>
                </button>
            </form>
        </div>
    </div>
</div>