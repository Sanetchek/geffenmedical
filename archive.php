<?php
/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package geffen
 */

 get_header();
 ?>

<?php $post_type = get_post_type(); ?>
<div class="contact-page">
  <?php get_template_part('template-parts/breadcrumbs') ?>

  <div class="conteiner-968">
    <div class="row">
      <div class="col-md-12 contact-page-menu-title">
        <h1 class="text-al-start text-center">
          <?php single_cat_title() ?>
        </h1>
      </div>
    </div>
  </div>

  <div class="blog-page-menu-row">
    <div class="conteiner-968">
      <div class="row">
        <div class="col-md-12">
          <div class="row blog-page-menu-content">
            <?php
            $links = get_field('blog_links', 'option');
            $name = '';
            switch($post_type) {
              case 'recipes':
                $name = 'מתכונים';
                break;
              case 'personal_stories':
                $name = 'סיפורים אישיים';
                break;
            }
            ?>
            <?php if ($links) : ?>
              <?php foreach ($links as $item) : ?>
                <?php
                  $cur = '';
                  if ($name === $item['title']) {
                    $cur = ' current';
                  }
                ?>
                <div class="main-page-menu-content">
                  <a href="<?= $item['link'] ?>" tabindex="0">
                    <div class="main-page-menu-item<?= $cur ?>">
                      <?php show_image($item['image'], ['45', '45']) ?>
                    </div>
                    <span class="caption"><?= $item['title'] ?></span>
                  </a>
                </div>
              <?php endforeach ?>
            <?php endif ?>
          </div>
        </div>
      </div>
    </div>
  </div>


  <?php
    $post_type = get_post_type();

    switch($post_type) {
      case 'recipes':
        $taxonomy_name = 'recipes_category';
        break;
      case 'personal_stories':
        $taxonomy_name = 'personal_stories_category';
        break;
      default:
        $taxonomy_name = 'category';
    }

    // Get all categories
    $categories = get_categories(['taxonomy' => $taxonomy_name, 'hide_empty' => true]);
  ?>
  <?php if ($categories) : ?>
  <div class="conteiner-968">
    <div class="row">
      <div class="col-md-12">
        <div class="blog-article-subcategory">
          <?php foreach ($categories as $category) : ?>
            <a href="<?= get_category_link($category->term_id) ?>"><?= $category->name ?></a>
          <?php endforeach ?>
        </div>
      </div>
    </div>
  </div>
  <?php endif ?>

  <div class="conteiner-968 contact-response-time">
    <div class="row blog-row">
    <?php if (have_posts()) : ?>
      <?php while (have_posts()) : the_post();?>

				<?php if ($post_type == 'recipes') : ?>
        	<?php get_template_part('template-parts/content', 'recipes') ?>
				<?php else : ?>
        	<?php get_template_part('template-parts/content', 'articles') ?>
				<?php endif ?>

      <?php endwhile ?>
    <?php endif ?>
    </div>
  </div>

</div>
<?php
get_footer(); ?>