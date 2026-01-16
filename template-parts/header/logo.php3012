<div class="site-branding">
  <?php
    if (!wp_is_mobile()):
    echo theme_logo();
    else:
    ?>
      <div class="col-2 col-md-3">
        <div class="site-branding">
          <a href="/" class="site-logo-link" rel="home" aria-current="page">
            <img src="<?= get_site_url() ?>/wp-content/uploads/2024/07/logo.png" class="site-logo" alt="GeffenMedikal" decoding="async">
          </a>        
        </div><!-- .site-branding -->     
      </div>
    <?php
    endif;
    if ( is_front_page() && is_home() ) :
      ?>
        <h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>"
            rel="home"><?php bloginfo( 'name' ); ?></a></h1>
        <?php
    else :
      ?>
        <p class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>"
            rel="home"><?php bloginfo( 'name' ); ?></a></p>
        <?php
    endif;
    $geffen_description = get_bloginfo( 'description', 'display' );
    if ( $geffen_description || is_customize_preview() ) :
  ?>
  <p class="site-description">
    <?php echo $geffen_description; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
  </p>
  <?php endif; ?>
</div><!-- .site-branding -->