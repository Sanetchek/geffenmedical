<div class="conteiner-968">
  <div class="row">
    <div class="col-md-12">
      <h1 class="text-al-start mt-100"><?php the_field('promotion_title') ?></h1>
    </div>
  </div>

  <div class="row">
    <div class="col-md-12">
      <div class="main-page-promotions">
        <div class="multiple-items2">
          <?php $promo = get_field('posts_for_promotion'); ?>

          <?php if ($promo): ?>
            <?php foreach ($promo as $id): ?>
              <?php $product = wc_get_product($id); ?>
              <?php $args = ['id' => $id, 'product' => $product]; ?>
              <?php get_template_part('template-parts/product', 'related', $args) ?>
            <?php endforeach ?>
          <?php endif ?>

        </div>
      </div>
    </div>
  </div>
</div>