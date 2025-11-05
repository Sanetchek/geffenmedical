 <?php

/**
 * Template Name: Medical Visit
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
 <main class="medical-visit">
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
                        <h3><?= get_field('block1_title') ?></h3>
                        <p><?= get_field('block1_text') ?></p>
                    </div>
                </div>
                <div class="col-lg-7 product__block my-order-1">
                    <?php show_image(get_field('block1_image'), 'large') ?>
                </div>
            </div>
            <div class="choose section">
                <div class="row justify-content-center">
                    <div class="col-md-8">
                        <h3><?= get_field('block2_title') ?></h3>
                        <p class="sub"><?= get_field('block2_text') ?></p>
                        <div class="choose-list">
                            <?php $list = get_field('block2_list') ?>
                            <?php if ($list) : ?>
                                <?php foreach ($list as $item) : ?>
                                <div class="choose-list__item">
                                    <img src="<?= assets('img/Ellipse-As.png') ?>" alt="Ellipse-As">
                                    <p><?= $item['text'] ?></p>
                                </div>
                                <?php endforeach ?>
                            <?php endif ?>
                        </div>
                        <div class="btn-wrap">
                            <?php if (get_field('block2_url')) : ?>
                                <a href="<?= get_field('block2_url') ?>" style="display: inline-block; margin-bottom: 25px;" target="_blank"><button class="btn btn-orange" style="width: 260px"><?= get_field('block2_link_label') ?></button></a> <br>
                            <?php endif ?>

                        </div>
                    </div>
                </div>
            </div>
            <div class="choose section">
                <div class="row justify-content-center">
                    <div class="col-md-8">
                        <h3><?= get_field('block3_title') ?></h3>
                        <p class="sub"><?= get_field('block3_text') ?></p>
                        <p><?= get_field('block3_text_2') ?></p>
                        <p><?= get_field('block3_text_3') ?></p>
                        <div class="choose-list">
                            <?php $list = get_field('block3_list') ?>
                            <?php if ($list) : ?>
                                <?php foreach ($list as $item) : ?>
                                    <div class="choose-list__item">
                                        <img src="<?= assets('img/Ellipse-As.png') ?>" alt="Ellipse-As">
                                        <p><?= $item['text'] ?></p>
                                    </div>
                                <?php endforeach ?>
                            <?php endif ?>
                        </div>
                    </div>
                </div>
            </div>
            <section class="section">
                <div class="row justify-content-center">
                    <div class="col-md-8">
                        <h3><?= get_field('block4_title') ?></h3>
                        <p><?= get_field('block4_text') ?></p>
                    </div>
                </div>
            </section>
            <div class="row justify-content-between next__bottom">
                <div class="col-6">
                    <?php if (get_field('block4_url_1')) : ?>
                        <a href="<?= get_field('block4_url_1') ?>" class="next-link left" target="_blank">
                            <img src="<?= assets('img/btn-right-arrow.png') ?>" alt="btn-right-arrow">
                            <?= get_field('block4_link_label_1') ?>
                        </a>
                    <?php endif ?>

                </div>
                <div class="col-6 text-left">
                    <?php if (get_field('block4_url_2')) : ?>
                        <a href="<?= get_field('block4_url_2') ?>" class="next-link" target="_blank">
                            <span><?= get_field('block4_link_label_2') ?></span>
                            <img src="<?= assets('img/btn-left-arrow.png') ?>" alt="btn-left-arrow">
                        </a>
                    <?php endif ?>
                </div>
            </div>
        </div>
    </main>
</div>
<?php get_footer() ?>