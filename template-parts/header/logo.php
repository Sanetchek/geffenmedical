<div class="site-branding">
  <?php
    // Проверяем, находимся ли мы на страницах freestyle-libre или omnipod
    $current_url = $_SERVER['REQUEST_URI'];
    $is_freestyle_libre = (
      get_post_type() === 'freestyle_libre' || 
      is_page('freestyle-libre') || 
      strpos($current_url, '/freestyle-libre') !== false ||
      (function_exists('is_singular') && is_singular('freestyle_libre'))
    );
    
    $is_omnipod = (
      get_post_type() === 'omnipod' || 
      get_post_type() === 'omnipod5' ||
      is_page('omnipod') || 
      strpos($current_url, '/omnipod') !== false ||
      (function_exists('is_singular') && (is_singular('omnipod') || is_singular('omnipod5')))
    );
    
    if (!wp_is_mobile()):
      if ($is_freestyle_libre):
        // Для страниц freestyle-libre показываем два логотипа
        ?>
        <div class="freestyle-libre-logos">
          <a href="/" class="site-logo-link" rel="home" aria-current="page">
            <img src="https://geffenmedical.co.il/wp-content/uploads/2025/12/small-new-logo.svg" class="site-logo" alt="GeffenMedikal" decoding="async">
          </a>
          <a href="/freestyle-libre" class="libre-logo-link">
            <img src="https://geffenmedical.co.il/wp-content/uploads/2025/12/new-lb-logo.svg" class="libre-logo" alt="FreeStyle Libre" decoding="async">
          </a>
        </div>
        <?php
      elseif ($is_omnipod):
        // Для страниц omnipod показываем два логотипа
        ?>
        <div class="omnipod-logos">
          <a href="/" class="site-logo-link" rel="home" aria-current="page">
            <img src="https://geffenmedical.co.il/wp-content/uploads/2025/12/small-new-logo.svg" class="site-logo" alt="GeffenMedikal" decoding="async">
          </a>
          <a href="/omnipod" class="omnipod-logo-link">
            <img src="https://geffenmedical.co.il/wp-content/uploads/2025/12/omnipod-new-logo.svg" class="omnipod-logo" alt="Omnipod" decoding="async">
          </a>
        </div>
        <?php
      else:
        echo theme_logo();
      endif;
    else:
    ?>
      <div class="col-12 col-md-3">
        <div class="site-branding">
          <?php if ($is_freestyle_libre): ?>
            <div class="freestyle-libre-logos">
              <a href="/" class="site-logo-link" rel="home" aria-current="page">
                <img src="https://geffenmedical.co.il/wp-content/uploads/2025/12/small-new-logo.svg" class="site-logo" alt="GeffenMedikal" decoding="async">
              </a>
              <a href="/freestyle-libre" class="libre-logo-link">
                <img src="https://geffenmedical.co.il/wp-content/uploads/2025/12/new-lb-logo.svg" class="libre-logo" alt="FreeStyle Libre" decoding="async">
              </a>
            </div>
          <?php elseif ($is_omnipod): ?>
            <div class="omnipod-logos">
              <a href="/" class="site-logo-link" rel="home" aria-current="page">
                <img src="https://geffenmedical.co.il/wp-content/uploads/2025/12/small-new-logo.svg" class="site-logo" alt="GeffenMedikal" decoding="async">
              </a>
              <a href="/omnipod" class="omnipod-logo-link">
                <img src="https://geffenmedical.co.il/wp-content/uploads/2025/12/omnipod-new-logo.svg" class="omnipod-logo" alt="Omnipod" decoding="async">
              </a>
            </div>
          <?php else: ?>
            <a href="/" class="site-logo-link" rel="home" aria-current="page">
              <img src="https://geffenmedical.co.il/wp-content/uploads/2025/12/new-main-logo.svg" class="site-logo" alt="GeffenMedikal" decoding="async">
            </a>
          <?php endif; ?>
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