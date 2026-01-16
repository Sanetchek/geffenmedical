<?php $is_post = (is_single() && 'freestyle_libre' != get_post_type() && 'omnipod' != get_post_type() && 'omnipod5' != get_post_type()); ?>

<div class="breadcrumbs" itemscope="" itemtype="http://schema.org/BreadcrumbList">
  <span class="breadcrumbs__parent" itemprop="itemListElement" itemscope="" itemtype="http://schema.org/ListItem">
    <a href="/" itemprop="item" class="home">
      <span itemprop="name"><?= __('עמוד הבית ', 'geffen') ?></span>
    </a>
  </span>

  <?php if ($is_post): ?>
  <span class="sep">
    ></span>
      <span class="breadcrumbs__parent" itemprop="itemListElement" itemscope="" itemtype="http://schema.org/ListItem">
        <a href="/blog/" itemprop="item" class="home">
          <span itemprop="name"><?= __('הבלוג שלנו ', 'geffen') ?></span>
        </a>
      </span>
      <?php endif ?>

      <span class="sep">
        > </span>
          <span class="breadcrumbs__current">
            <?php if (is_category()): ?>
            <?php single_cat_title() ?>
            <?php elseif ($is_post): ?>
            <?= __('מאמרים ', 'geffen') ?>
            <?php elseif (is_search()): ?>
            <?= __('תוצאות חיפוש ', 'geffen') ?>
            <?php else: ?>
            <?php the_title() ?>
            <?php endif ?>
          </span>
</div>