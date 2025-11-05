<div class="conteiner-968 companies-hero">

  <div class="row">

   <!-- <div class="col-md-12">
      <?php $title = get_field( 'companies_title', 'option' ); ?>
      <h2 class="text-al-centr mt-100 customer-club-title"><?= $title ?></h2>
    </div>-->

    <div class="companies-represented">
  <?php $list = get_field('companies', 'option'); ?>
  <?php if ($list) : ?>
    <?php $count = 0; ?>

    <?php foreach ($list as $item) : ?>
      <div class="companies-represented-item">
        <?php
          if ($count % 8 != 0) {
            echo '<div class="companies-represented-sep"></div>';
          }
        ?>
        <?php show_image($item['image']); ?>
      </div>

      <?php $count++; ?>
    <?php endforeach; ?>
  <?php endif; ?>
</div>

  </div>


</div>
