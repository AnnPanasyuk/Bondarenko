            <!-- Begin footer -->
            <?php
                require TEMPLATEPATH . '/includes/base-vars.php'; 
            ?>
            <footer id="footer" class="wrapper footer">
                <div class="top-footer-wrapper">
                    <div class="container">
                        <div class="footer-wrapper">
                            <div class="pages">
                                <?php
                                    wp_nav_menu( array(
                                            'theme_location'  => '',
                                            'menu'            => '', 
                                            'container'       => '', 
                                            'container_class' => '',
                                            'container_id'    => '',
                                            'menu_class'      => 'pages-items', 
                                            'menu_id'         => '',
                                            'echo'            => true,
                                            'fallback_cb'     => 'wp_page_menu',
                                            'before'          => '',
                                            'after'           => '',
                                            'link_before'     => '',
                                            'link_after'      => '',
                                            'items_wrap'      => '<ul id="%1$s" class="%2$s ">%3$s</ul>',
                                            'depth'           => 1,
                                            'walker'          => '',
                                    ) ); 
                                ?>
                            </div>
                            <div class="footer-contacts">
                                <ul class="el-social">
                                    <li>
                                        <a href="<?= get_field('ссылка_на_youtube',$settings_var_id)?>" target="_blank">
                                            <svg class="icon icon-yt">
                                                <use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="<?=$template_url?>/assets/img/symbol/sprite.svg#yt"></use>
                                            </svg>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="<?= get_field('ссылка_на_twitter',$settings_var_id)?>" target="_blank">
                                            <svg class="icon icon-tw">
                                                <use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="<?=$template_url?>/assets/img/symbol/sprite.svg#tw"></use>
                                            </svg>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="<?= get_field('ссылка_на_g+',$settings_var_id)?>" target="_blank">
                                            <svg class="icon icon-gl">
                                                <use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="<?=$template_url?>/assets/img/symbol/sprite.svg#gl"></use>
                                            </svg>
                                        </a>
                                    </li>
                                </ul>
                                <a href="<?=$home_url?>" class="el-logo">
                                    <img src="<?=$template_url?>/assets/img/logo.png" alt="logo">
                                </a>
                                <p class="dev">
                                    <a href="http://sheep.fish/" target="_blank">
                                        <?=_e('[:ru]Разработано в[:en]Developed by[:de]Entwickelt in')?> SHEEP. FISH
                                    </a>
                                </p>
                            </div>
                        </div>
                  </div>
                </div>
                <div class="bottom-footer-wrapper">
                    <div class="container">
                        <p class="privacy text-center">
                            <a href="<?= get_field('конфид',$settings_var_id)?>">
                                <?=_e('[:ru]Политика конфиденциальности и пользовательского соглашения на обработку персональных данных'
                                        . '[:en]Privacy Policy and User Agreement for Processing Personal Data'
                                        . '[:de]Datenschutzrichtlinie und Benutzervereinbarung für die Verarbeitung personenbezogener Daten')
                                ?>
                            </a>
                        </p>
                    </div>
                </div>
            </footer>
            <!-- End footer -->
            
            <!--      popap   -->
            <div class="remodal" data-remodal-id="modal">
                <div class="record-form-wrapper">
                    <a href="#" class="js-btn-close-menu btn-close-menu" data-remodal-action="confirm"></a>
                    <div class="modal-title">
                        <h2 class="el-title">
                            <?=_e('[:ru]Заполните форму[:en]Fill the form[:de]Füllen Sie das Formular aus')?>
                        </h2>
                        <p>
                            <?=_e('[:ru]и я свяжусь с Вами в течении пары часов!'
                                    . '[:en]and I will contact you within a couple of hours!'
                                    . '[:de]und ich werde dich in ein paar Stunden kontaktieren!')
                            ?>
                        </p>
                        <svg class="icon icon-title">
                            <use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="<?=$template_url?>/assets/img/symbol/sprite.svg#title"></use>
                        </svg>
                    </div>
                    <form action="<?=$ajax_url?>" class="record-form js-validate">
                        <div class="record-form-inputs">
                            <input type="hidden" name="phone" value="">
                            <input type="hidden" name="is_js" value="no_js">
                            <input type="hidden" name="action" value="recall_popup">
                            <input type="hidden" name="form" value="Форма в попапе. Страничка: <?php the_title(); ?>">
                            <input type="hidden" name="post_id" value="<?php the_ID(); ?>">
                            <input name="name" required="required" data-valid="name" type="text" class="form-item" placeholder="<?=_e('[:ru]Ваше имя[:en]Name[:de]Name')?>">
                            <input name="surname" data-valid="surname" type="text" class="form-item" placeholder="<?=_e('[:ru]Фамилия[:en]Surname[:de]Nachname')?>">
                            <input name="phone_contact" data-valid="phone" type="text" class="form-item" placeholder="<?=_e('[:ru]Ваш телефон[:en]your phone number[:de]Telefon')?>">
                            <input name="company" data-valid="company" type="text" class="form-item" placeholder="<?=_e('[:ru]Компания[:en]Company[:de]Firma')?>">
                            <input name="email" data-valid="email" type="text" class="form-item" placeholder="<?=_e('[:ru]Электронная почта[:en]E-mail[:de]E-mail')?>">
                            <input name="lang" data-valid="lang" type="text" class="form-item" placeholder="<?=_e('[:ru]Язык[:en]Language[:de]Sprache')?>">
                            <input name="place" data-valid="place" type="text" class="form-item" placeholder="<?=_e('[:ru]Место проведения[:en]Location[:de]Veranstaltungort')?>">
                            <input name="people-count" data-valid="people-count" type="text" class="form-item" placeholder="<?=_e('[:ru]Количество зрителей[:en]Number of viewers[:de]Anzahl der Zuschauer')?>">
                            <input name="duration" data-valid="duration" type="text" class="form-item" placeholder="<?=_e('[:ru]Продолжительность события[:en]Duration of the event[:de]Dauer der Veranstaltung')?>">
                            <input name="date" data-valid="date" type="text" class="form-item" placeholder="<?=_e('[:ru]Дата мероприятия[:en]Date of the event[:de]Datum des Ereignisses')?>">
                            <input name="time" data-valid="time" type="text" class="form-item" placeholder="<?=_e('[:ru]Время события[:en]Event time[:de]Veranstaltungszeit')?>">
                            <input name="info-from" data-valid="info-from" type="text" class="form-item" placeholder="<?=_e('[:ru]Откуда Вы узнали о нас?[:en]Where did you hear about us?[:de]Wo hast du von uns gehört?')?>">
                        </div>
                        <textarea name="desc" id="desc" placeholder="<?=_e('[:ru]Описание мероприятия[:en]Description of the event[:de]Beschreibung der Veranstaltung')?>"></textarea>
                        <input id="privacy" type="checkbox" class="checkbox" checked="checked">
                        <?php $policy_url=''; ?>
                        <label class="add" for="privacy">
                            <?=_e('[:ru]Отправляя нам запрос Вы соглашаетесь с нашей <a href="'.$policy_url.'">политикой конфиденциальности</a>'
                                    . '[:en]By sending us a request you agree with our <a href="'.$policy_url.'">Privacy Policy[:de]</a>'
                                    . 'Indem Sie uns eine Anfrage senden, stimmen Sie unserer <a href="'.$policy_url.'">Datenschutzrichtlinie zu</a>')
                            ?>
                        </label>
                        <input id="weddings" type="checkbox" class="checkbox" checked="checked">
                        <label for="weddings" class="add mod-eur">
                            <?=_e('[:ru]Да, я хочу узнать больше о современных свадьбах в Европе.[:en]'
                                  . 'Yes, I want to learn more about modern weddings in Europe.[:de]'
                                  . 'Ja, ich möchte mehr über moderne Hochzeiten in Europa erfahren.')
                            ?>
                        </label>
                        <button class="el-btn mod-brown"><?=_e('[:ru]отправить заявку[:en]send an application[:de]Sende eine Bewerbung')?></button>
                    </form>
                </div>
            </div>

            <!--      popap-small   -->
            <div class="remodal mod-small" data-remodal-id="modal2">
                <div class="record-form-wrapper">
                    <a href="#" class="js-btn-close-menu btn-close-menu" data-remodal-action="confirm"></a>
                    <div class="modal-title">
                        <h2 class="el-title">
                            <?=_e('[:ru]УКАЖИТЕ СВОИ КОНТАКТЫ[:en]CONTACT YOUR CONTACTS[:de]KONTAKTIEREN SIE IHRE KONTAKTE')?>
                        </h2>
                        <p>
                            <?=_e('[:ru]и я свяжусь с Вами в течении пары часов!'
                                    . '[:en]and I will contact you within a couple of hours!'
                                    . '[:de]und ich werde dich in ein paar Stunden kontaktieren!')
                            ?>
                        </p>
                        <svg class="icon icon-title">
                            <use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="<?=$template_url?>/assets/img/symbol/sprite.svg#title"></use>
                        </svg>
                    </div>
                    <form action="<?=$ajax_url?>" class="record-form mod-small">
                        <input type="hidden" name="phone" value="">
                        <input type="hidden" name="is_js" value="no_js">
                        <input type="hidden" name="action" value="recall_popup">
                        <input type="hidden" name="form" value="Форма в попапе. Страничка: <?php the_title(); ?>">
                        <input type="hidden" name="post_id" value="<?php the_ID(); ?>">
                        <div class="record-form-inputs">
                            <input name="name" type="text" class="form-item" placeholder="<?=_e('[:ru]Ваше имя[:en]Name[:de]Name')?>">
                            <input name="phone_contact" type="text" class="form-item" placeholder="<?=_e('[:ru]Ваш телефон[:en]your phone number[:de]Telefon')?>">
                            <input name="email" type="text" class="form-item" placeholder="<?=_e('[:ru]Электронная почта[:en]E-mail[:de]E-mail')?>">
                        </div>
                        <button type="submit" class="el-btn mod-brown">
                          <?=_e('[:ru]отправить заявку[:en]send an application[:de]Sende eine Bewerbung')?>
                        </button>
                        <input id="privacy" type="checkbox" class="checkbox">
                        <label class="add" for="privacy">
                            *<?=_e('[:ru]Отправляя нам запрос Вы соглашаетесь с нашей <a href="'.$policy_url.'">политикой конфиденциальности</a>'
                                    . '[:en]By sending us a request you agree with our <a href="'.$policy_url.'">Privacy Policy[:de]</a>'
                                    . 'Indem Sie uns eine Anfrage senden, stimmen Sie unserer <a href="'.$policy_url.'">Datenschutzrichtlinie zu</a>')
                            ?>
                        </label>
                    </form>
                </div>
            </div>


            <div class="hidden-block" style="display: none; ">

                <div id="call_success">

                    <div class="modal-title">
                        <h2 class="el-title"> Спасибо за заявки </h2>
                        <p> мы когдато вам перезвоним </p>
                    </div>

                </div>

            </div>
        </div>
        <script>
            <?php $coords = get_field('координаты',$settings_var_id); ?>
            var cords={
                'lat':<?= $coords['lat'] ?>,
                'lng':<?= $coords['lng'] ?>,
                'address':"<?= $coords['address'] ?>"
            } 
        </script>
        <!-- Begin script -->
        <script  src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCShgF5B0Tk-6FprwqYN2E_J8gdiKI4I-U"></script>
        <script src="<?=$template_url?>/assets/js/libs.js"></script>
        <script  src="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.3.5/jquery.fancybox.min.js"></script>
        <script src="<?=$template_url?>/assets/js/scripts.js"></script>
        <!-- End script -->
        
        <?php wp_footer(); ?>
    </body>
</html>