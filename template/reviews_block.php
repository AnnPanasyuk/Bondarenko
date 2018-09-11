<?php $pages = get_pages(array(
        'meta_key' => '_wp_page_template',
        'meta_value' => 'page-reviews.php'
    ));

$reviews_id=$pages[0]->ID;?>
<!--      reviews   -->
<div class="reviews">
    <div class="reviews-wrapper  container">
        <div class="title-animation">
            <h2>
                <?= get_field('оглавление_блока',$reviews_id) ?>
            </h2>
            <svg class="icon icon-title">
                <use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="<?= $template_url ?>/assets/img/symbol/sprite.svg#title"></use>
            </svg>
        </div>
        <div class="reviews-items slider-reviews">
            <?php 
                $items = get_field('элементы',$reviews_id);
                foreach ( $items as $item ) :
            ?>
            <div class="review-item item-animation" data-wow-offset="-50">
                <a href="#" class="reviews-img">
                    <img src="<?= $item['картинка']['url'] ?>" alt="review-img">
                </a>
                <p class="author"><?= $item['название'] ?></p>
                <div class="date">
                    <p><?= $item['подпись'] ?></p>
                </div>
                <p>
                    <?= $item['текст'] ?>
                </p>
            </div>
            <?php endforeach; ?>
        </div>
<!--        <a href="#" class="el-btn mod-transparent-brown">Смотреть все</a>-->
    </div>
</div>