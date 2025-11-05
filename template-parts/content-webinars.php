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

  <div class="webinar-list">
    <?php $web = get_field('webinar_time') ?>
    <?php if ($web) : ?>
      <table>
        <tbody>
          <tr>
            <th class="seminar-date webinar-label"><?= get_field('label_for_date') ?></th>
            <th class="seminar-time webinar-label"><?= get_field('label_for_time') ?></th>
          </tr>
          <?php foreach ($web as $item) : ?>
            <?php if ($item['url']) : ?>
            <tr>
              <td class="webinar-item"><p><?= $item['date'] ?></p></td>
              <td class="webinar-item"><p style="direction:ltr !important;"><?= $item['time'] ?></p></td>
            </tr>
            <?php endif ?>
          <?php endforeach ?>
        </tbody>
      </table>
    <?php endif ?>
  </div>
</div>