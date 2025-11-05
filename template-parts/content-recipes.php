<div class="blog-item">
  <a class="item_thumbnail" href="<?php the_permalink() ?>">
    <?php the_post_thumbnail('blog-thumb') ?>
  </a>
  <div class="blog-decor"></div>
  <a class="item-title-wrap" href="<?php the_permalink() ?>">
    <?php if (!wp_is_mobile()): ?>
      <h3 class="blog-title"><?= str_word( get_the_title(), 12, '...') ?></h3>
    <?php else: ?>
      <h3 class="blog-title"><?= mb_strimwidth(get_the_title(), 0, 35, '...'); ?></h3>
    <?php endif; ?>
  </a>
  <p class="blog-subtitle blog-subtitle-recept"><?= str_word( get_the_content(), 12, '...') ?></p>
  <div class="blog-subinfo-recept">
    <div class="calories">
      <?php get_template_part('template-parts/svg/calories') ?>
      <p><span dir="ltr"><?= get_field('calories') ?></span> <?= __('קלוריות ', 'geffen') ?>  </p>
    </div>
    <div class="grams">
      <?php get_template_part('template-parts/svg/grams') ?>
      <p><span dir="ltr"><?= get_field('protein') ?></span> <?= __('גר׳ חלבון ', 'geffen') ?>  </p>
    </div>
    <div class="carbohydrate">
      <?php get_template_part('template-parts/svg/carbohydrate') ?>
      <p><span dir="ltr"><?= get_field('carbohydrate') ?></span> <?= __('גר׳ פחמימה ', 'geffen') ?>  </p>
    </div>
    <div class="fat">
    <img src="/wp-content/uploads/2024/07/Fat-icon1.svg" alt="fat icon">
      <p><span dir="ltr"><?= get_field('fat') ?></span> <?= __('גר׳ שמן ', 'geffen') ?>  </p>
    </div>
  </div>
</div>