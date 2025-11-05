 <?php

/**
 * Template Name: Your Children
 * Template Post Type: freestyle_libre
 *
 *
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package geffen
 */

get_header();
?>
 <div class="free-style-libre">
 <main class="children">
        <div class="container">
            <div class="next">
                <div class="row align-items-center">
                    <div class="col-sm-3 col-6">
                        <?php if (get_field('url_1')) : ?>
                            <a href="<?= get_field('url_1') ?>" class="next-link left" target="_blank">
                                <img src="<?= assets('img/btn-right-arrow.png') ?>" alt="btn-right-arrow">
                                <span><?= get_field('link_label_1') ?></span>
                            </a>
                        <?php endif ?>
                    </div>
                    <div class="col-sm-6 col-12 next__header my-order-1">
                        <h1><?= get_field('title') ?></h1>
                    </div>
                    <div class="col-sm-3 col-6 text-left">
                        <?php if (get_field('url_2')) : ?>
                            <a href="<?= get_field('url_2') ?>" class="next-link" target="_blank">
                                <span><?= get_field('link_label_2') ?></span>
                                <img src="<?= assets('img/btn-left-arrow.png') ?>" alt="btn-left-arrow">
                            </a>
                        <?php endif ?>
                    </div>
                </div>
            </div>

            <div class="row justify-content-center product__cont">
                <div class="col-lg-5 product__block product__block--blue relative">
                    <div class="product__text-block product__text-block--blue ">
                        <div class="btns-group">
                            <div id="my-inline-buttons" class="sharethis-inline-share-buttons" ></div>
                        </div>

                        <h4><?= get_field('block1_title') ?></h4>

                        <div><?= get_field('block1_text') ?></div>
                    </div>
                </div>
                <div class="col-lg-7 product__block my-order-1">
                    <?php show_image(get_field('block1_image')) ?>
                </div>
            </div>

            <div class="times flex-parent">
                <?php $field = get_field('block2_list') ?>
                <?php if ($field) : ?>
                    <?php foreach ($field as $item) : ?>
                        <div class="times__item flex-items">
                            <?php show_image($item['image'], [90,90], ['style'=> 'width: 90px;']) ?>

                            <b class="orange"><?= $item['title'] ?></b>
                            <?php if ($item['text']) : ?>
                                <span><?= $item['text'] ?></span>
                            <?php endif ?>
                        </div>
                    <?php endforeach ?>
                <?php endif ?>
            </div>

            <div class="row justify-content-center product__cont">
                <div class="col-lg-5 product__block product__block--blue relative">
                    <div class="product__text-block product__text-block--blue ">
                        <h4><?= get_field('block3_title') ?></h4>

                        <div><?= get_field('block3_text') ?></div>
                    </div>
                </div>

                <div class="col-lg-7 product__block my-order-1">
                    <?php show_image(get_field('block3_image')) ?>
                </div>
            </div>

            <?php $bg = wp_get_attachment_image_url(get_field('block4_image'), 'full') ?>
            <div class="product__bigImg product__bigImg--children" style="background: url(<?= $bg ?>) no-repeat center / cover;">
                <div class="product__bigImg-text">
                    <h3><?= get_field('block4_title') ?></h3>

                    <div><?= get_field('block4_text') ?></div>
                </div>
            </div>

            <div class="row justify-content-center product__cont">
                <div class="col-lg-5 product__block product__block--orange">
                    <div class="product__text-block product__text-block--blue">
                        <h3><?= get_field('block5_title') ?></h3>

                        <div><?= get_field('block5_text') ?></div>

                        <?php if (get_field('block5_url')) : ?>
                            <a href="<?= get_field('block5_url') ?>" class="btn btn-transp btn-transp--white" style="margin-left: auto; margin-right: auto; text-transform: none;" target="_blank"><?= get_field('block5_link_label') ?></a>
                        <?php endif ?>
                    </div>
                </div>

                <div class="col-lg-7 product__block">
                    <?php show_image(get_field('block5_image')) ?>
                </div>
            </div>

            <div class="row justify-content-between next__bottom">
                <div class="col-6">
                    <?php if (get_field('block6_url_1')) : ?>
                        <a href="<?= get_field('block6_url_1') ?>" class="next-link left" target="_blank">
                            <img src="<?= assets('img/btn-right-arrow.png') ?>" alt="btn-right-arrow">
                            <?= get_field('block6_link_label_1') ?>
                        </a>
                    <?php endif ?>
                </div>

                <div class="col-6 text-left">
                    <?php if (get_field('block6_url_2')) : ?>
                        <a href="<?= get_field('block6_url_2') ?>" class="next-link">
                            <span><?= get_field('block6_link_label_2') ?></span>
                            <img src="<?= assets('img/btn-left-arrow.png') ?>" alt="btn-left-arrow">
                        </a>
                    <?php endif ?>
                </div>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-md-8 ">
                <ul class="list">
                    <?php $field = get_field('footer_list') ?>
                    <?php if ($field) : ?>
                        <?php foreach ($field as $key => $value) : ?>
                            <li><?= ++$key ?>. <span class="ltr"><?= $value['text'] ?></span></li>
                        <?php endforeach ?>
                    <?php endif ?>
                </ul>
            </div>
        </div>
    </main>
</div>
<?php get_footer() ?>