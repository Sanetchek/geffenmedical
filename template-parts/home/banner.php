<div class="conteiner-968">
  <div class="row">
    <a href="#" class="action-main-banner-button show-login-popup">
      <div class="col-md-12">

        <div class="action-main-banner">
          <div class="action-main-banner-img decstop-action-main-banner-img col-12 col-md-12">
            <?php $image = get_field('baner_image') ?>
            <?php if ($image) : ?>
            <?= get_image($image, 'large') ?>
            <?php endif ?>
          </div>
          <div class="action-main-banner-img mobile-ction-main-banner-img col-12 col-md-12">
            <?php $image = get_field('baner_image_mobile') ?>
            <?php if ($image) : ?>
            <?= get_image($image, '338-200') ?>
            <?php endif ?>

            <!-- <p class="action-main-banner-text mobile">
            <?php the_field('baner_text') ?>
              </p>
              <?php $link = get_field('baner_link') ?>
              <div class="baner-button-mobile">
            <?php if ($link) : ?>
              <a href="<?= $link ?>" class="action-main-banner-button">
                <img src="/wp-content/uploads/2023/07/arrow-left.png" alt="">
                <?= get_field('baner_button') ?>

                </div>-->
          </div>

          <!-- <div class="action-main-banner-content col-12 col-md-7">
          <p class="action-main-banner-text">
            <?php the_field('baner_text') ?>
          </p>

              <img src="/wp-content/uploads/2023/07/arrow-left.png" alt="">
              <?= get_field('baner_button') ?>
            </a>
          <?php endif ?>
            </div>-->

        </div>

      </div>
    </a>
  </div>
</div>