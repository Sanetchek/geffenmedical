<?php $product = $args['product']; ?>
<?php $more = get_field('tab_more_info') ?>
<div class="product-description-tab-row-content">
  <?php if ($more) : ?>
  <div class="product-description-tabs">
    <div class="tabs-slider">

      <div class="product-description-tab active" data-tab="tab1"><?= $more['tab_name'] ?></div>

      <?php
        $tabs = get_field('more_tabs');
        $count = 1;
      ?>
      <?php if ( $tabs  ) : ?>
      <?php foreach ($tabs as $item) : ?>
      <?php $count++ ?>
      <div class="product-description-tab" data-tab="tab<?= $count ?>"><?= $item['tab_name'] ?></div>
      <?php endforeach ?>
      <?php endif ?>

      <?php
        $field = get_field('tab_more_faq');
      ?>

      <?php if ($field ['tab_name'] !== '')  : ?>
      <div class="product-description-tab" data-tab="tab6"><?= $field['tab_name'] ?></div>
      <?php endif ?>

      <?php
        $prod = get_field('nutritional_values');
      ?>
      <?php if ($prod) : ?>
      <div class="product-description-tab" data-tab="tab7"><?= $prod['tab_name'] ?></div>
      <?php endif ?>
    </div>
  </div>
  <div class="product-description-tab-wrap">
    <div class="product-description-tab-content active" id="tab1">
      <div class="product-description-tab-content-text">
        <?= $more['description'] ?>
      </div>
    </div>

    <?php $count = 1; ?>
    <?php if ($tabs) : ?>
    <?php foreach ($tabs as $item) : ?>
    <?php $count++ ?>
    <div class="product-description-tab-content" id="tab<?= $count ?>">
      <div class="product-description-tab-content-text">
        <?= $item['description'] ?>
      </div>
    </div>
    <?php endforeach ?>
    <?php endif ?>

    <?php $count = 1; ?>
    <?php if ($field) : ?>
    <div class="product-description-tab-content" id="tab6">
      <div class="product-description-tab-content-text">
        <?php $faqs = $field['list'] ?>
        <?php if ($faqs) : ?>
        <?php foreach ($faqs as $faq) : ?>
        <div class="instructions-use-fl3">
          <div class="accordion">
            <div class="accordion-item">
              <div class="accordion-header">
                <span class="icon">+</span>
                <p><?= $faq['question'] ?></p>
              </div>

              <div class="accordion-content" style="display: none;width: 100%;text-align: right;">
                <div><?= $faq['answer'] ?></div>
              </div>
            </div>
          </div>
        </div>
        <?php endforeach ?>
        <?php endif ?>
      </div>
    </div>
    <?php endif ?>

    <?php $count = 1; ?>
    <?php if ($prod) : ?>
    <div class="product-description-tab-content" id="tab7">
      <div class="product-description-tab-content-text">
        <?php $prodesk = $prod['list'] ?>
        <?php if ($prodesk) : ?>
        <?php foreach ($prodesk as $prodes) : ?>
        <div class="instructions-use-fl3">
          <div class="accordion">
            <div class="accordion-item-taste">
              <div class="accordion-header-taste product-taste">
                <span class="icon">
                  <svg xmlns="http://www.w3.org/2000/svg" width="9" height="9" viewBox="0 0 9 9" fill="none">
                    <path d="M3.8983 9V5.06H0.258301V3.94H3.8983V0H5.0983V3.94H8.7383V5.06H5.0983V9H3.8983Z"
                      fill="#0D6EFD" />
                  </svg>
                </span>
                <p><?= $prodes['taste'] ?></p>
              </div>

              <div class="accordion-content-taste" style="display: none;width: 100%;text-align: right;">
                <div class="nutritional-values-des"><?= $prodes['ingredients'] ?></div>
                <div class="nutritional-values-content">
                  <div class="nutritional-values-img"><div class="<?= $prodes['border_color']?>"><?php show_image($prodes['taste_image']) ?></div></div>
                  <div class="nutritional-values-table">
                    <div class="<?= $prodes['border_color']?>"><?= $prodes['taste_tabel'] ?></div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <?php endforeach ?>
        <?php endif ?>
      </div>
    </div>
    <?php endif ?>

  </div>
  <?php endif ?>

  <?php if ($product->get_type() === 'variable') : ?>
  <div class="product-variable-more-info">
    <div class="product-variable-more-info-wrap">
      <?php
          $second_variation_ids = [];
          $attr_array = [];
          $is_tab = 0;
          foreach ($product->get_available_variations() as $variation) {
            $variation_id = $variation['variation_id'];
            $selected_tab = get_post_meta($variation_id, '_selected_tab', true);

            if ($selected_tab == 'case') {
              $is_tab = 1;
              // Get the variation object.
              $variation = wc_get_product($variation_id);

              // Get variation attributes (e.g., size, color).
              $variation_attributes = $variation->get_variation_attributes();
              // Get first attribute
              $second_variation_attribute = array_slice($variation_attributes, 1, 1, true);
              $attr_val = reset($second_variation_attribute);

              if ( !in_array($attr_val, $attr_array) ) {
                $attr_array[] = $attr_val;
              }
            }
          }
        ?>

      <div class="more-info"><?= get_field('more_info') ?></div>

      <?php if ($is_tab) : ?>
      <div class="cases">
        <p class="cases-title"><?= __('מידע: ', 'geffen') ?></p>
        <ul>
          <?php foreach($attr_array as $attr_val) : ?>
          <li><?= urldecode($attr_val) ?></li>
          <?php endforeach ?>
        </ul>
      </div>
      <?php endif ?>
    </div>
  </div>
  <?php endif ?>

</div>