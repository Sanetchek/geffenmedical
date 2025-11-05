<div class="conteiner-792">

  <div class="row">

   <div class="col-md-12">
      <h1 class="text-al-centr mt-100 customer-club-title"><?= get_field('company_title') ?></h1>
    </div>
    <div class="companies-represented">

      <div class="row mb-50">
        <?php $image = get_field('company_1'); ?>
        <?php if ($image) : ?>
          <div class="col-md-4">
            <?= get_image($image, 'medium') ?>
          </div>
        <?php endif ?>

        <?php $image = get_field('company_2') ?>
        <?php if ($image) : ?>
          <div class="col-md-4">
            <?= get_image($image, 'medium') ?>
          </div>
        <?php endif ?>

        <?php $image = get_field('company_3') ?>
        <?php if ($image) : ?>
          <div class="col-md-4">
            <?= get_image($image, 'medium') ?>
          </div>
        <?php endif ?>
      </div>

      <div class="row">
        <div class="col-md-2">
        </div>

        <?php $image = get_field('company_4') ?>
        <?php if ($image) : ?>
          <div class="col-md-4">
            <?= get_image($image, 'medium') ?>
          </div>
        <?php endif ?>

        <?php $image = get_field('company_5') ?>
        <?php if ($image) : ?>
          <div class="col-md-4">
            <?= get_image($image, 'medium') ?>
          </div>
        <?php endif ?>

        <div class="col-md-2">
        </div>
      </div>

    </div>

  </div>

</div>