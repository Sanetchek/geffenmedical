<div class="second-site-navigation col-2 col-md-2">
  <div class="navbar-second-site-navigation">
    <div class="hamburger-second-site-navigation" onclick="toggleMenu()">
      <div class="line-second-site-navigation line1"></div>
      <div class="line-second-site-navigation line2"></div>
      <div class="line-second-site-navigation line3"></div>
    </div>
    <?php if (wp_is_mobile()): ?>
      <div id="hamburger-menu-header">
        <?php $user_ip = $_SERVER['REMOTE_ADDR']; ?>
        <?php if (!is_user_blocked($user_ip)) : ?>
          <div class="user-site-login">
            <?php get_template_part('template-parts/header/login') ?>
          </div>
        <?php endif ?>

        <div class="close" onclick="toggleMenu()">
          <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
            <path d="M5.07369 19L18.9263 5.00001" stroke="#565D65" stroke-width="2" stroke-linecap="round"/>
            <path d="M5.07373 5L18.9264 19" stroke="#565D65" stroke-width="2" stroke-linecap="round"/>
          </svg>
        </div>

        <div class="hi-guest">
          <?php if (is_user_logged_in()) :
            $current_user = wp_get_current_user(); ?>
            <p>היי <?php echo $current_user->user_firstname . $current_user->user_lastname ?></p>
          <?php else: ?>
            <p class="not-login-text show-login-popup"><?= __('התחברות', 'geffen') ?></p>
          <?php endif; ?>
        </div>

        <div class="line-top">
          <svg xmlns="http://www.w3.org/2000/svg" width="100%" height="2" viewBox="0 0 278 2" fill="none">
            <path d="M0 1H277.5" stroke="#0A3B64" stroke-opacity="0.6"/>
          </svg>
        </div>
      </div>

      <?php
        /**
        * Enables a 'reverse' option for wp_nav_menu to reverse the order of menu
        * items. Usage:
        *
        *   wp_nav_menu(array('reverse' => TRUE, ...));
        */
        function my_reverse_nav_menu($menu, $args) {
          if (isset($args->reverse) && $args->reverse) {
            return array_reverse($menu);
          }
          return $menu;
        }
        add_filter('wp_nav_menu_objects', 'my_reverse_nav_menu', 10, 2);
        wp_nav_menu(
          array(
            'theme_location' => 'menu-1',
            'menu_id'        => 'primary-menu',
            'reverse'        => true,
          )
        );
        // get_template_part('template-parts/header/menu');
      ?>
      <svg id="primary-submenu-arrow" xmlns="http://www.w3.org/2000/svg" width="17" height="17" viewBox="0 0 17 17" fill="none">
        <path d="M12.7501 14.1667L7.79056 9.20711C7.40004 8.81659 7.40004 8.18342 7.79056 7.7929L12.7501 2.83334" stroke="#0A3B64" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
      </svg>
      <?php   //  ----------------------Categories menu ----------------------------?>
      <div class="main-navigation-category">
        <svg  id="primary-submenu-arrow-output" xmlns="http://www.w3.org/2000/svg" width="17" height="17" viewBox="0 0 17 17" fill="none">
          <path d="M4.24988 2.83325L9.20944 7.79281C9.59996 8.18334 9.59996 8.8165 9.20944 9.20703L4.24988 14.1666" stroke="#0A3B64" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
        </svg>
        <div class="main-navigation-category-wrap">
          <div class="category-sub-menu">
            <p>כל המוצרים</p>
          </div>
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
    <?php endif; ?>
    <?php
      wp_nav_menu(
        array(
          'theme_location' => 'menu-2',
          'menu_id'        => 'menu-second-site-navigation',
          'menu_class'		 => 'menu-second-site-navigation'
        )
      );
    ?>
  </div>
  <?php if (wp_is_mobile()): ?>
    <div id="hamburger-menu-footer">
      <div class="line-bottom">
        <svg xmlns="http://www.w3.org/2000/svg" width="100%" height="2" viewBox="0 0 278 2" fill="none">
          <path d="M0 1H277.5" stroke="#0A3B64" stroke-opacity="0.6"/>
        </svg>
      </div>

      <?php if (is_user_logged_in()) : ?>
        <div class="output-text"><p><?= __('התנתקות', 'geffen') ?></p></div>
        <div class="arrow-output" id="show_logout_popup">
          <svg xmlns="http://www.w3.org/2000/svg" width="25" height="24" viewBox="0 0 25 24" fill="none">
            <g clip-path="url(#clip0_894_33216)">
            <path d="M12.4602 21.9668H3.49002C2.93984 21.9668 2.49336 21.5203 2.49336 20.9702V3.02992C2.49336 2.47975 2.93989 2.03326 3.49002 2.03326H12.4602C13.0113 2.03326 13.4568 1.58776 13.4568 1.03661C13.4568 0.48545 13.0113 0.039856 12.4602 0.039856H3.49002C1.84152 0.039856 0.5 1.38142 0.5 3.02992V20.9701C0.5 22.6186 1.84152 23.9601 3.49002 23.9601H12.4602C13.0113 23.9601 13.4568 23.5146 13.4568 22.9635C13.4568 22.4123 13.0113 21.9668 12.4602 21.9668Z" fill="#0A3B64"/>
            <path d="M24.203 11.2904L18.1431 5.31028C17.7524 4.92356 17.1206 4.92858 16.7338 5.32027C16.3471 5.71196 16.3511 6.34285 16.7438 6.72956L21.0744 11.0033H9.47004C8.91889 11.0033 8.47339 11.4488 8.47339 12C8.47339 12.5511 8.91889 12.9967 9.47004 12.9967H21.0744L16.7438 17.2704C16.3512 17.6571 16.3482 18.288 16.7338 18.6797C16.9292 18.877 17.1863 18.9767 17.4435 18.9767C17.6967 18.9767 17.9498 18.881 18.1431 18.6896L24.203 12.7095C24.3923 12.5222 24.5 12.267 24.5 11.9999C24.5 11.7329 24.3933 11.4788 24.203 11.2904Z" fill="#0A3B64"/>
            </g>
            <defs>
            <clipPath id="clip0_894_33216">
            <rect width="24" height="24" fill="white" transform="translate(0.5)"/>
            </clipPath>
            </defs>
          </svg>
        </div>
      <?php endif; ?>
    </div>
  <?php endif; ?>
</div>

<script>
  function toggleMenu() {
    const menu = document.getElementById("menu-second-site-navigation");
    const hamburger = document.querySelector(".hamburger-second-site-navigation");
    const primarymenu = document.getElementById("primary-menu");
    const primary_submenu_arrow = document.getElementById("primary-submenu-arrow");
    const header_menu = document.getElementById("hamburger-menu-header");
    const haumb_menu_footer = document.getElementById("hamburger-menu-footer");

    // Toggle classes only if the elements exist
    if (menu) menu.classList.toggle("show");
    if (hamburger) hamburger.classList.toggle("open");
    if (primarymenu) primarymenu.classList.toggle("show");
    if (primary_submenu_arrow) primary_submenu_arrow.classList.toggle("show");
    if (header_menu) header_menu.classList.toggle("show");
    if (haumb_menu_footer) haumb_menu_footer.classList.toggle("show");
  }
</script>