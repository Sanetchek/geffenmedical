<nav id="site-navigation" class="main-navigation">
  <button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false"><?php esc_html_e( 'Primary Menu', 'geffen' ); ?></button>

  <?php
    wp_nav_menu(
      array(
        'theme_location' => 'menu-1',
        'menu_id'        => 'primary-menu',
      )
    );
  ?>

  <div class="main-navigation-category">

    <div class="main-navigation-category-wrap">
    <div class="main-page-menu-content">
            <a href="/freestyle-libre/fsl-plus/#product-info-fl-sensor">
              <div class="main-page-menu-item">
                <img class="fl-icon-all-menu" src="/wp-content/uploads/2025/08/small-icon.svg" alt="category">
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

      <?php
        $all_categories = get_all_product_categories();
      ?>

      <?php if ( $all_categories ) : ?>
        <?php foreach ($all_categories as $cat) : ?>
          <?php
            $term_name = $cat->name;
            $term_id = $cat->term_id;
            $thumbnail_id = get_term_meta( $cat->term_id, 'thumbnail_id', true );
            $image = wp_get_attachment_url( $thumbnail_id );
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
</nav>