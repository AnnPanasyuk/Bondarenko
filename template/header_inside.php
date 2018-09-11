<header id="header" class="wrapper header">
    <div class="container">
        <div class="header-wrapper">
            <a href="<?=$home_url?>" class="el-logo">
                <img src="<?=$template_url?>/assets/img/logo.png" alt="logo">
            </a>
            <?php if ( !is_front_page() ) : ?>
            <ul class="el-social mod-grey">
                <li>
                    <a href="<?= get_field('ссылка_на_youtube',$settings_var_id)?>">
                        <svg class="icon icon-yt">
                            <use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="<?=$template_url?>/assets/img/symbol/sprite.svg#yt"></use>
                        </svg>
                    </a>
                </li>
                <li>
                    <a href="<?= get_field('ссылка_на_twitter',$settings_var_id)?>">
                    <svg class="icon icon-tw">
                        <use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="<?=$template_url?>/assets/img/symbol/sprite.svg#tw"></use>
                    </svg>
                    </a>
                </li>
                <li>
                    <a href="<?= get_field('ссылка_на_g+',$settings_var_id)?>">
                        <svg class="icon icon-gl">
                            <use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="<?=$template_url?>/assets/img/symbol/sprite.svg#gl"></use>
                        </svg>
                    </a>
                </li>
            </ul>
            <?php endif; ?>
            <div class="header-contacts">
                <a href="tel:<?=filter_characters(get_field('телефон_в_шапке',$settings_var_id))?>" class="header-phone">
                    <?= get_field('телефон_в_шапке',$settings_var_id)?>
                </a>
                <a href="#modal" class="header-call el-btn mod-transparent-brown">
                    <?=_e('[:ru]Сделать запрос[:en]Make a request[:de]Stellen Sie eine Anfrage')?>
                </a>
                <div class="header-lang-ct">
                    <ul class="header-lang">
                    <?php
                        global $wp;
                        $enabled_languages = get_option('qtranslate_enabled_languages');
                        foreach ($enabled_languages as $curr){
                            global $qtranslate_slug;
                            if($cur_lang==$curr)
                                echo '<li class="el-btn mod-little-btn '.$curr.' active"><a href="' . get_site_url().'/'.$wp->request . '">' . $curr . '</a></li>';
                            else
                               echo '<li class="el-btn mod-little-btn '.$curr.'"><a href="' . get_site_url().'/'.$wp->request . '?lang='.$curr.'">' . $curr . '</a></li>';
                        }
                    ?>
                    </ul>
                </div>
                <a href="#" class="js-header-menu-btn header-menu-btn el-btn mod-little-btn"></a>
            </div>
        </div>
    </div>
</header>