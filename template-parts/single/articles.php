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
  <?php
    $posts_per_page = 3;
    if (wp_is_mobile()) $posts_per_page =  -1;
  ?>
	<section class="article-header">
		<div class="conteiner-968">

			<div class="article-title">
				<h1><?= get_the_title() ?></h1>
			</div>

			<div class="articles__thumb">
				<?php if (has_post_thumbnail()) : ?>
					<?php the_post_thumbnail( 'single-thumb', ['class' => 'article-thumbnail'] ); ?>
				<?php endif; ?>
			</div>

		</div>
	</section>

	<section class="article-content">
		<div class="conteiner-968">

			<?php the_content() ?>

		</div>
	</section>

	<section class="more-articles">
		<div class="conteiner-968">
			<h2 class="more-articles-title">
				<?= __('מאמרים נוספים ', 'geffen') ?>
			</h2>
			<?php if (wp_is_mobile()): ?>
		      <div class="row blog-row slick-slider-mobile">
		    <?php else: ?>
		      <div class="row blog-row">
		    <?php endif; ?>
				<?php
					$category = get_the_terms( get_the_ID(), 'category' );

					$array_id = [];
					foreach ( $category as $cat){
						$array_id[] = $cat->term_id;
					}
					$args = [
						'post_type' => 'post',
						'tax_query' => array(
							array(
								'taxonomy' => 'category',
								'field' => 'term_id',
								'terms' => $array_id,
						 	),
						),
						'post__not_in' => array(get_the_ID()),
						'posts_per_page' => $posts_per_page, //3,
						'orderby' => 'rand',
					];

					$related_query = new WP_Query($args);
				?>

				<?php if ($related_query->have_posts()) : ?>
					<?php while ($related_query->have_posts()) : $related_query->the_post(); ?>

						<?php get_template_part('template-parts/content', 'articles'); ?>

					<?php endwhile; ?>
				<?php endif; ?>
				<?php wp_reset_postdata(); ?>
			</div>
		</div>
	</section>

</article><!-- #post-<?php the_ID(); ?> -->