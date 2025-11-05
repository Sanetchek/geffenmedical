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
    <!--<p class="blog-subtitle"><?php //echo str_word( get_the_content(), 12, '...') ?></p>-->
    <p class="blog-subtitle"><?= wp_trim_excerpt(); ?></p>
  <!--<div class="blog-subinfo">
    <p class="blog-date"  dir="ltr"><?= get_the_date('j.n.Y') ?></p>
    <p class="blog-author"><?php the_author(); ?></p>
  </div>-->
</div>