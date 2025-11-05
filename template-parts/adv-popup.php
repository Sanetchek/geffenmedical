<?php if ( is_page_template( 'freestyle-libre2-sensor.php' ) || is_page_template( 'freestyle2-product.php' ) ) : ?>

  <?php
    $link = get_field('popup_link', 'option');
    $image = get_field('popup_image', 'option');
  ?>

  <?php if ($image) : ?>
    <div class="adv-overlay"></div>
    <div id="adv_popup" class="popup-contactpage">
      <div class="popup-content-contactpage">
        <span class="close-contactpage">&times;</span>

        <div>
          <?php if ($link) : ?>
            <a href="<?= $link ?>" target="_blank">
          <?php endif ?>

            <?php if ($image) : ?>
              <?= get_image($image); ?>
            <?php endif ?>

          <?php if ($link) : ?>
            </a>
          <?php endif ?>
        </div>
      </div>
    </div>
  <?php endif ?>
<?php endif ?>