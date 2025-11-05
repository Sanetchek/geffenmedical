 <?php

/**
 * Template Name: Using Reader
 * Template Post Type: freestyle_libre
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
 <main class="using-reader">
        <div class="container">
            <div class="next">
                <div class="row align-items-center">
                    <div class="col-sm-3 col-6">
                        <?php if (get_field('url_1')) : ?>
                            <a href="<?= get_field('url_1') ?>" class="next-link left">
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
                            <a href="<?= get_field('url_2') ?>" class="next-link">
                                <span><?= get_field('link_label_2') ?></span>&nbsp;
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
                        <h5><?= get_field('block1_title') ?></h5>
                        <p><?= get_field('block1_text') ?></p>
                    </div>
                </div>
                <div class="col-lg-7 product__block my-order-1">
                    <?php show_image(get_field('block1_image')) ?>
                </div>
            </div>
            <section class="products-items">
                <div class="container">
                    <?php $field = get_field('block2_list') ?>
                    <?php if ($field) : ?>
                        <?php foreach ($field as $key => $value) : ?>
                            <div class="products__item">
                                <div class="row justify-content-center">
                                    <?php if ($key%2== 0) : ?>
                                        <div class="col-md-4">
                                            <?php show_image($value['image']) ?>
                                        </div>
                                    <?php endif ?>

                                    <?php $item = $value['content'] ?>
                                    <?php if ($item) : ?>
                                        <div class="col-md-6">
                                            <h4><?= $item['title'] ?></h4>
                                            <p><?= $item['text'] ?></p>
                                        </div>
                                    <?php endif ?>

                                    <?php if ($key%2== 1) : ?>
                                        <div class="col-md-4">
                                            <?php show_image($value['image']) ?>
                                        </div>
                                    <?php endif ?>
                                </div>
                            </div>
                        <?php endforeach ?>
                    <?php endif ?>

                </div>
            </section>
            <div class="video relative">
                <div class="row">
                    <div class="col-md-8">
                        <?php if (get_field('block3_youtube')) : ?>
                            <iframe src="<?= get_field('block3_youtube') ?>" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                        <?php endif ?>
                    </div>
                    <div class="col-md-4 my-order-1">
                        <h4><?= get_field('block3_title') ?></h4>
                        <p><?= get_field('block3_text') ?></p>
                        <div class="btns-group">
                            <div id="my-inline-buttons" class="sharethis-inline-share-buttons" ></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row justify-content-center product__cont">
                <div class="col-lg-5 product__block product__block--blue relative">
                    <div class="product__text-block product__text-block--blue ">
                        <h4><?= get_field('block4_title') ?></h4>
                        <p style="max-width: 515px; margin-left: auto; margin-right: auto"><?= get_field('block4_text') ?></p>
                        <?php if (get_field('block4_url')) : ?>
                            <a href="<?= get_field('block4_url') ?>" class="btn btn-transp btn-transp--white" style="margin-left: auto; margin-right: auto" target="_blank"><?= get_field('block4_link_label') ?></a>
                        <?php endif ?>
                    </div>
                </div>
                <div class="col-lg-7 product__block my-order-1">
                    <?php show_image(get_field('block4_image')) ?>
                </div>
            </div>
            <div class="row justify-content-between next__bottom">
                <div class="col-6">
                    <?php if (get_field('block5_url_1')) : ?>
                        <a href="<?= get_field('block5_url_1') ?>" class="next-link left" target="_blank">
                            <img src="<?= assets('img/btn-right-arrow.png') ?>" alt="btn-right-arrow">
                            <?= get_field('block5_link_label_1') ?>
                        </a>
                    <?php endif ?>
                </div>
                <div class="col-6 text-left">
                    <?php if (get_field('block5_url_2')) : ?>
                        <a href="<?= get_field('block5_url_2') ?>" class="next-link" target="_blank">
                            <span><?= get_field('block5_link_label_2') ?></span>
                            <img src="<?= assets('img/btn-left-arrow.png') ?>" alt="btn-left-arrow">
                        </a>
                    <?php endif ?>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-md-8 ">
                    <ul class="list">
                        <?php $field = get_field('footer_list') ?>
                        <?php if ($field) : ?>
                            <?php foreach ($field as $key => $value) : ?>
                                <li><?= ++$key ?>.<span class="ltr"><?= $value['text'] ?></span></li>
                            <?php endforeach ?>
                        <?php endif ?>
                    </ul>
                </div>
            </div>
        </div>
    </main>
</div>
<?php get_footer() ?>