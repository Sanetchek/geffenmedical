<div class="fl-libre-main-menu ds-header-menu2">
  <div class="col-1">
  </div>
  <?php if (wp_is_mobile()): ?>
  <div class="col-2 fl-logo-fl-menu" style="display: flex; ">
    <a href="/omnipod/omnipod-new-main/">
      <img src="<?= assets('img/new-omnipod/omni-simplify-life.jpg') ?>" alt="" style="padding-top: 0; width: auto; height: 90px;">
    </a>
  </div>
  <?php endif; ?>
  <div class="col-9">
    <div class="fl-libre-main-menu-items">
      <nav id="site-navigation" class="main-navigation fl-libre-main-navigation">
        <?php if (!wp_is_mobile()): ?>
        <button class="menu-toggle" aria-controls="libre-menu" aria-expanded="false">Omnipod Menu</button>
        <?php else: ?>
          <button class="menu-toggle omnipod" aria-controls="libre-menu" aria-expanded="false">
            <svg xmlns="http://www.w3.org/2000/svg" height="16" width="4" viewBox="0 0 128 512"><!--!Font Awesome Free 6.5.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2023 Fonticons, Inc.--><path d="M64 360a56 56 0 1 0 0 112 56 56 0 1 0 0-112zm0-160a56 56 0 1 0 0 112 56 56 0 1 0 0-112zM120 96A56 56 0 1 0 8 96a56 56 0 1 0 112 0z"/></svg>
          </button>
        <?php endif; ?>
        <div class="menu-fl-libre-main-menu-container menu-omnipod-main-menu-container">
          <?php
            if (!wp_is_mobile()) {
              wp_nav_menu(
                array(
                  'theme_location' => 'menu-omnipod',
                  'menu_id'        => 'omnipod-menu',
                )
              );
            } else {
              wp_nav_menu(
                array(
                  'theme_location' => 'menu-omnipod',
                  'menu_id'        => 'omnipod-menu',
                  'reverse' => TRUE,
                )
              );
            }
          ?>
        </div>
      </nav>
    </div>
  </div>
  <?php if (!wp_is_mobile()): ?>
  <div class="col-1 fl-logo-fl-menu" style="display: flex; ">
    <a href="/omnipod/omnipod-new-main/">
      <img src="<?= assets('img/new-omnipod/omni-simplify-life.jpg') ?>" alt="" style="padding-top: 15px; width: auto; max-height: 90px;">
    </a>
  </div>
  <div class="col-1" style="text-align: center;">
  <?php endif; ?>
  </div>
</div>