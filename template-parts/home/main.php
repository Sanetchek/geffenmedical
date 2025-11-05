<div class="banner-container">

  <?php $libre = get_field('freestyle_libre'); ?>
  <?php if ($libre) : ?>
  <div>
    <div class="image-link">
      <?php if ($libre['image_link']) : ?>
      <a href="<?= $libre['image_link'] ?>">
        <?php endif; ?>

        <?php if ($libre['image'] && !wp_is_mobile()) : ?>
        <?php echo get_image($libre['image'], 'home-thumb') ?>
        <?php endif; ?>

        <?php if ($libre['image_mobile'] && wp_is_mobile()) : ?>
        <?php echo get_image($libre['image_mobile'], 'medium') ?>
        <?php endif; ?>

        <?php if ($libre['image_link']) : ?>
      </a>
      <?php endif; ?>
    </div>
    <div>
      <p class="main-page-title-banner"><?= $libre['title_banner'] ?></p>
    </div>
    <div class="image-buttons">
      <?php if ($libre['button_1_link']) : ?>
      <a href="<?= $libre['button_1_link'] ?>" class="image-button">
        <svg xmlns="http://www.w3.org/2000/svg" width="21" height="21" viewBox="0 0 21 21" fill="none">
          <path d="M13.8823 17.3501L7.64844 11.1173C7.25783 10.7267 7.25783 10.0935 7.64843 9.70293L13.8823 3.4701"
            stroke="#0A3B64" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
        </svg>
        <?= $libre['button_1'] ?>
      </a>
      <?php endif ?>

      <?php if ($libre['button_2_link']) : ?>
      <a href="<?= $libre['button_2_link'] ?>" class="image-button">
        <svg xmlns="http://www.w3.org/2000/svg" width="21" height="21" viewBox="0 0 21 21" fill="none">
          <path d="M13.8823 17.3501L7.64844 11.1173C7.25783 10.7267 7.25783 10.0935 7.64843 9.70293L13.8823 3.4701"
            stroke="#0A3B64" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
        </svg>
        <?= $libre['button_2'] ?>
      </a>
      <?php endif ?>
    </div>
  </div>
  <?php endif; ?>

  <?php $omnipod = get_field('omnipod'); ?>
  <?php if ($omnipod) : ?>
  <div>
    <div class="image-link">
      <?php if ($omnipod['image_link']) : ?>
      <a href="<?= $omnipod['image_link'] ?>">
        <?php endif; ?>

        <?php if ($omnipod['image'] && !wp_is_mobile()) : ?>
        <?php echo get_image($omnipod['image'], 'home-thumb') ?>
        <?php endif; ?>

        <?php if ($omnipod['image_mobile'] && wp_is_mobile()) : ?>
        <?php echo get_image($omnipod['image_mobile'], 'medium') ?>
        <?php endif; ?>

        <?php if ($omnipod['image_link']) : ?>
      </a>
      <?php endif; ?>
    </div>
    <div>
    <p class="main-page-title-banner"><?= $omnipod['title_banner'] ?></p>
  </div>
    <div class="image-buttons">
      <?php if ($omnipod['button_1_link']) : ?>
      <a href="<?= $omnipod['button_1_link'] ?>" class="image-button">
        <svg xmlns="http://www.w3.org/2000/svg" width="21" height="21" viewBox="0 0 21 21" fill="none">
          <path d="M13.8823 17.3501L7.64844 11.1173C7.25783 10.7267 7.25783 10.0935 7.64843 9.70293L13.8823 3.4701"
            stroke="#0A3B64" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
        </svg>
        <?= $omnipod['button_1'] ?>
      </a>
      <?php endif ?>

      <?php if ($omnipod['button_2_link']) : ?>
      <a href="<?= $omnipod['button_2_link'] ?>" class="image-button">
        <svg xmlns="http://www.w3.org/2000/svg" width="21" height="21" viewBox="0 0 21 21" fill="none">
          <path d="M13.8823 17.3501L7.64844 11.1173C7.25783 10.7267 7.25783 10.0935 7.64843 9.70293L13.8823 3.4701"
            stroke="#0A3B64" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
        </svg>
        <?= $omnipod['button_2'] ?>
      </a>
      <?php endif ?>
    </div>
  </div>
  <?php endif; ?>

</div>