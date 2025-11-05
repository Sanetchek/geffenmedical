<?php $menus = $args['menus'] ?>

<?php if ($menus) : ?>
  <?php foreach ($menus as $menu) : ?>
    <div class="conteiner-hcp menu-conteiner-hcp">
      <div class="row">
        <div class="col-md-12">
          <div class="hcp-fl-block">
            <div class="hcp-fl-block-title">
              <h2><?= $menu['title'] ?></h2>

              <?php show_image($menu['image'], [44, 60]) ?>
            </div>
          </div>
        </div>
      </div>
    </div>

    <?php if ($menu['menu_name']) : ?>
      <div class="conteiner-hcp ">
        <div class="row">
          <div class="col-md-12">
            <div class="hcp-fl-block" style="margin: 10px 0 60px;">
              <div class="hcp-fl-block-menu">
                <?php wp_nav_menu('menu=' . $menu['menu_name']); ?>
              </div>
            </div>
          </div>
        </div>
      </div>
    <?php endif ?>
  <?php endforeach ?>
<?php endif ?>



<script>
  document.addEventListener('DOMContentLoaded', function () {
    var menuItems = document.querySelectorAll('.menu-item-has-children');

    menuItems.forEach(function (item) {
      item.addEventListener('click', function (e) {
        // Check if the clicked element is a submenu link
        if (e.target.tagName === 'A' && e.target.closest('.sub-menu')) {
          // Allow the link to be clicked without closing the submenu
          return;
        }

        e.preventDefault(); // Prevent default action if clicking on the parent menu item

        // Close all other open submenus
        menuItems.forEach(function (innerItem) {
          if (innerItem !== item) {
            innerItem.classList.remove('menu-item-open');
          }
        });

        // Toggle the current submenu
        item.classList.toggle('menu-item-open');
      });
    });

    // Close submenu if clicking outside
    document.addEventListener('click', function (e) {
      if (!e.target.closest('.menu-item-has-children')) {
        menuItems.forEach(function (item) {
          item.classList.remove('menu-item-open');
        });
      }
    });
  });
</script>