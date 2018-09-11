<div class="global-menu">
    <div class="menu-content">
        <div class="menu-header">
            <a href="<?=$home_url?>" class="el-logo">
                <img src="<?=$template_url?>/assets/img/logo.png" alt="logo">
            </a>
            <ul class="el-social">
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
        </div>
        <div class="list-menu-wrap">
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
                        'items_wrap'      => '<ul id="%1$s" class="%2$s">%3$s</ul>',
                        'depth'           => 1,
                        'walker'          => '',
                ) ); 
            ?>
        </div>
        <div class="menu-footer">
            <a href="#modal" class="el-btn mod-brown">
                <?=_e('[:ru]Заказать звонок[:en]Request a call[:de]Bestellen Sie einen Anruf')?>
            </a>
            <a href="tel:<?=filter_characters(get_field('телефон_в_шапке',$settings_var_id))?>" class="header-phone">
                <?=get_field('телефон_в_шапке',$settings_var_id)?>
            </a>
        </div>
    </div>
    <div class="menu-overlay js-menu-overlay"></div>
    <a href="#" class="js-btn-close-menu btn-close-menu"></a>
</div>
