<div class="customer-club-block">
  <div class="conteiner-792 main-customer-club-conteiner">

    <div class="row main-customer-club">
      <div class="col-md-12">
        <h1 class="text-al-start customer-club-title"><?= get_field('benefit_title') ?></h1>
       <!-- <p class="customer-club-subtitle"><?= get_field('benefit_text') ?></p>-->
      </div>
    </div>

    <div class="row">
      <div class="customer-club">
        <?php $first_benefit = get_field('first_benefit') ?>
        <?php if ($first_benefit) : ?>
        <div class="col-md-4 customer-club-content">
          <?php $icon = $first_benefit['icon'] ?>
          <?php if ($icon) : ?>
            <?= get_image($icon, 'thumbnail') ?>
          <?php endif ?>
          <h3><?= $first_benefit['text'] ?></h3>
        </div>
        <?php endif ?>

        <?php $second_benefit = get_field('second_benefit') ?>
        <?php if ($second_benefit) : ?>
        <div class="col-md-4 customer-club-content">
          <?php $icon = $second_benefit['icon'] ?>
          <?php if ($icon) : ?>
            <?= get_image($icon, 'thumbnail') ?>
          <?php endif ?>
          <h3><?= $second_benefit['text'] ?></h3>
        </div>
        <?php endif ?>

        <?php $third_benefit = get_field('third_benefit') ?>
        <?php if ($third_benefit) : ?>
        <div class="col-md-4 customer-club-content">
          <?php $icon = $third_benefit['icon'] ?>
          <?php if ($icon) : ?>
            <?= get_image($icon, 'thumbnail') ?>
          <?php endif ?>
          <h3><?= $third_benefit['text'] ?></h3>
        </div>
        <?php endif ?>

      </div>
    </div>

    <div class="row">
    <div class="col-md-12">

      <?php $link = get_field('benefit_link') ?>
      <?php if ($link) : ?>
        <div class="customer-club-button">
          <a href="#" class="show-login-popup"><?= get_field('benefit_button') ?></a>
        </div>
      <?php endif ?>

    </div>
  </div>

  </div>
</div>