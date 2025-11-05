<div class="conteiner-968 cat-slider-wrap">

  <div class="row">
    <div class="col-md-12 main-page-menu-title">
      <h1 class="text-al-start"><a
          href="/all-product/"><?php the_field('products_title') ?></a>
      </h1>
    </div>
  </div>

  <div class="row main-page-menu-row">
    <div class="col-md-12">
      <div class="main-page-menu">
        <div class="multiple-items">
          <?php
            $all_categories = get_all_product_categories();
          ?>
          <div class="main-page-menu-content">
            <a href="/freestyle-libre/fsl-plus/#product-info-fl-sensor">
              <div class="main-page-menu-item">
                <img class="fl-icon-all-menu"
                  src="/wp-content/uploads/2025/08/small-icon.svg"
                  alt="category">
              </div>
              <span class="caption">פריסטייל ליברה</span>
            </a>
          </div>
          <div class="main-page-menu-content">
            <a href="/omnipod/omnipod-main/">
              <div class="main-page-menu-item">
                <img src="/wp-content/uploads/2023/07/icon-omnipod.png" alt="category">
              </div>
              <span class="caption">Omnipod</span>
            </a>
          </div>
          <?php if ( $all_categories ) : ?>
          <?php foreach ($all_categories as $cat) : ?>
          <?php
                $term_name = $cat->name;
                $term_id = $cat->term_id;
                $thumbnail_id = get_term_meta($cat->term_id, 'thumbnail_id', true); // Updated function
                $image = wp_get_attachment_url($thumbnail_id);
              ?>
          <div class="main-page-menu-content">
            <a href="<?= get_term_link( $term_id, 'product_cat' ) ?>">
              <div class="main-page-menu-item">
                <img src="<?= $image ?>" alt="category">
              </div>
              <span class="caption"><?= $term_name ?></span>
            </a>
          </div>
          <?php endforeach ?>
          <?php endif ?>

        </div>
      </div>
    </div>
  </div>

</div>