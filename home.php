<?php
    require TEMPLATEPATH . '/includes/base-vars.php'; 
    get_header();
?>
<!-- Begin header -->
<?php require TEMPLATEPATH . '/template/header_inside.php';  ?>

<?php require TEMPLATEPATH . '/template/global_menu.php';  ?>
<!-- End header -->

<!-- Begin page body -->
<div id="page-body" class="page-body mod-news-page">
    <div class="first-section">
        <div class="img-bg" style="opacity: 0.9; background-image: url(<?=$template_url?>/assets/img/bg-news-page.jpg)"></div>
        <div class="container">
            <ul class="breadcrumbs">
                <li>
                    <a href="<?=$home_url?>"><?=_e('[:ru]главная[:en]Main[:de]Main')?></a>
                </li>
                <li>
                    <span><?=_e('[:ru]Новости[:en]News[:de]Nachrichten')?></span>
                </li>
            </ul>
            <?= get_field('текстовка_первого_экрана_n',$seo_var_id) ?>
        </div>
        <div class="line-item"><a href="#news"></a></div>
    </div>
    <!--      news   -->
    <div class="news mod-news-page">
        <div class="news-wrapper container">
            <div class="news-items" id="news">
                <?php if( have_posts() ):  ?>
                <?php 
                    $index=0; 
                    while( have_posts() ): 
                        the_post(); 
                ?>
<!--                <a href="--><?//=get_permalink()?><!--">-->
                    <div class="news-item item-animation" data-wow-offset="300">
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
<!--                </a>-->
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
            </div>
        <?php
            $args = array(
                'show_all'     => false, // показаны все страницы участвующие в пагинации
                'end_size'     => 1,     // количество страниц на концах
                'mid_size'     => 1,     // количество страниц вокруг текущей
                'prev_next'    => true,  // выводить ли боковые ссылки "предыдущая/следующая страница".
                'prev_text'    => __(''),
                'next_text'    => __(''),
                'add_args'     => false, // Массив аргументов (переменных запроса), которые нужно добавить к ссылкам.
                'add_fragment' => '',     // Текст который добавиться ко всем ссылкам.
                'screen_reader_text' => false,
            );
            the_posts_pagination($args); 
        ?>
        </div>
    </div>
      <!--      section-about   -->
    <div class="section-about">
        <div class="container">
            <div class="text-wrap">
                <div class="text-wrap-left left-animation" data-wow-offset="400">
                    <?= get_field('текст_n',$seo_var_id) ?>
                </div>
                <div class="wrap-img right-animation" data-wow-offset="400">
                    <?php $img = get_field('картинка_n',$seo_var_id) ?>
                    <img src="<?= $img['url'] ?>" alt="img">
                </div>
            </div>
        </div>
    </div>
</div>
<?php 
    get_footer(); 
?>