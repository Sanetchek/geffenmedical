 <?php

/**
 * Template Name: Pregnancy
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
    <main class="pregnancy">
        <div class="container">
            <div class="next">
                <div class="row align-items-center">
                    <div class="col-sm-3 col-6">
                        <?php if (get_field('url')) : ?>
                            <a href="<?= get_field('url') ?>" class="next-link" target="_blank">
                                <img src="<?= assets('img/btn-right-arrow.png') ?>" alt="btn-right-arrow">
                                <span><?= get_field('link_label') ?></span>
                            </a>
                        <?php endif ?>
                    </div>
                    <div class="col-sm-6 col-12 next__header my-order-1">
                        <h1><?= get_field('title') ?></h1>
                    </div>
                    <div class="col-sm-3 col-6 text-left">
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
                        <p><?= get_field('block1_text') ?></p>
                    </div>
                </div>
                <div class="col-lg-7 product__block my-order-1">
                    <?php show_image(get_field('block1_image')) ?>
                </div>
            </div>

            <div class="product__bigImg product__bigImg--pregnancy" style="min-height: auto;">
                <?php show_image(get_field('block2_image')) ?>

                <div class="product__bigImg-text">
                    <h3><?= get_field('block2_title') ?></h3>
                    <div><?= get_field('block2_text') ?></div>
                </div>
            </div>

            <div class="bigImg-mob">
                <?php show_image(get_field('block2_image')) ?>
                <div class="product__bigImg-text bigImg-mob--text">
                <h3><?= get_field('block2_title') ?></h3>
                    <div><?= get_field('block2_text') ?></div>
                </div>
            </div>

            <div class="row justify-content-center product__cont">
                <div class="col-lg-5 product__block product__block--orange">
                    <div class="product__text-block product__text-block--blue">
                        <h3><?= get_field('block3_title') ?></h3>
                        <p><?= get_field('block3_text') ?></p>
                    </div>
                </div>
                <div class="col-lg-7 product__block">
                    <?php show_image(get_field('block3_image')) ?>
                </div>
            </div>

            <section class="section checking">
                <div class="row justify-content-center">
                    <div class="col-md-8">
                        <h5><?= get_field('block4_title') ?></h5>

                        <?php $list = get_field('block4_list') ?>
                        <?php if ($list) : ?>
                            <?php foreach ($list as $key => $value) : ?>
                                <?php if ($key%2 == 0) : ?>
                                    <div class="checking__item">
                                <?php endif ?>

                                <div>
                                    <?php show_image($value['image'], [100,100], ['style'=> 'max-width: 100px;']) ?>
                                    <b class="orange"><?= $value['text'] ?></b>
                                </div>

                                <?php if ($key%2 == 1) : ?>
                                    </div>
                                <?php endif ?>
                            <?php endforeach ?>
                        <?php endif ?>
                    </div>
                </div>
            </section>

            <section class="section glucose">
                <div class="row justify-content-center">
                    <div class="col-md-8">
                        <h4><?= get_field('block5_title') ?></h4>
                        <p><?= get_field('block5_text') ?></p>

                        <?php $list = get_field('block5_list') ?>
                        <?php if ($list) : ?>
                            <?php foreach ($list as $key => $value) : ?>
                                <?php if ($key%2 == 0) : ?>
                                    <div class="glucose__items">
                                <?php endif ?>

                                <div>
                                    <?php show_image($value['image']) ?>
                                    <p><?= $value['text'] ?></p>
                                </div>

                                <?php if ($key%2== 1) : ?>
                                    </div>
                                <?php endif ?>
                            <?php endforeach ?>
                        <?php endif ?>
                    </div>
                </div>
            </section>

            <div class="row justify-content-between next__bottom">
                <div class="col-6">
                </div>
                <div class="col-6 text-left">
                    <?php if (get_field('block6_url')) : ?>

                    <?php endif ?>
                    <a href="<?= get_field('block6_url') ?>" class="next-link left" target="_blank">
                        <span><?= get_field('block6_link_label') ?></span>
                        <img src="<?= assets('img/btn-left-arrow.png') ?>" alt="btn-left-arrow">
                    </a>
                </div>
            </div>
        </div>

        <div class="row justify-content-center">
            <div class="col-md-8 ">
                <ul class="list">
                    <?php $list = get_field('footer_list') ?>
                    <?php if ($list) : ?>
                        <?php foreach ($list as $key => $value) : ?>
                            <li><?= ++$key ?>. <span class="ltr"><?= $value['text'] ?></span></li>
                        <?php endforeach ?>
                    <?php endif ?>
                </ul>
            </div>
        </div>
    </main>
</div>

<?php get_footer() ?>