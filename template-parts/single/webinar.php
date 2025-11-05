<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package geffen
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class( 'article' ); ?>>
<div class="conteiner-968 webinar">
    <section class="article-header">
      <div class="conteiner-968">

        <div class="article-title">
          <h1><?= get_field('title') ?></h1>
        </div>

        <div class="articles__thumb">
          <?php if (has_post_thumbnail()) : ?>
            <?php the_post_thumbnail( 'single-thumb', ['class' => 'article-thumbnail'] ); ?>
          <?php endif; ?>
        </div>

      </div>
    </section>

    <div class="webinar-content"><?= get_field('content') ?></div>

    <div class="webinar-wrap">
      <div class="webinar-subtitle"><?= get_field('subtitle') ?></div>

      <div class="webinar-list">
        <?php $web = get_field('webinar_time') ?>
        <?php if ($web) : ?>
          <table>
            <tbody>
              <tr>
                <th class="seminar-date webinar-label"><?= get_field('label_for_date') ?></th>
                <th class="seminar-time webinar-label"><?= get_field('label_for_time') ?></th>
                <th class="seminar-registration webinar-label"><?= get_field('label_for_links') ?></th>
              </tr>
              <?php foreach ($web as $item) : ?>
                <?php if ($item['url']) : ?>
                <tr>
                  <td class="webinar-item"><p><?= $item['date'] ?></p></td>
                  <td class="webinar-item"><p style="direction:ltr !important;"><?= $item['time'] ?></p></td>
                  <td class="webinar-item"><a href="<?= $item['url'] ?>" target="_blank" class="webinar-item-link"><?= $item['link_label'] ?></a></td>
                </tr>
                <?php endif ?>
              <?php endforeach ?>
            </tbody>
          </table>
        <?php endif ?>
      </div>
    </div>
  </div>

</article><!-- #post-<?php the_ID(); ?> -->