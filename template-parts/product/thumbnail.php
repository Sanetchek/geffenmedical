<div class="product-info-img">
  <?php global $product; ?>

  <?php
  // Check if the product exists
  if ($product) {
    // Get the featured image (thumbnail)
    $thumbnail_id = $product->get_image_id(); // Get the featured image ID
    $thumbnail_url = wp_get_attachment_image_url($thumbnail_id, 'single-post-image'); // Get the URL of the featured image
    $thumbnail_alt = get_post_meta($thumbnail_id, '_wp_attachment_image_alt', true); // Get the alt text

    // Get the gallery images
    $gallery_ids = $product->get_gallery_image_ids(); // Get an array of gallery image IDs
    $gallery_images = array();

    foreach ($gallery_ids as $gallery_id) {
      $gallery_images[] = array(
        'url' => wp_get_attachment_image_url($gallery_id, 'single-post-image'), // Get the URL of the gallery image
        'alt' => get_post_meta($gallery_id, '_wp_attachment_image_alt', true), // Get the alt text
      );
    }

    echo '<section class="single-product-image">';
    
        echo '<div class="gallery-images" dir="rtl">';
      

        // Output the featured image
        if ($thumbnail_url) {
          echo '<div class="gallery-item">';
          echo '<img src="' . esc_url($thumbnail_url) . '" alt="' . esc_attr($thumbnail_alt) . '" />';
          echo '</div>';
        }

        // Output the gallery images
        if (!empty($gallery_images)) {
          foreach ($gallery_images as $gallery_image) {
            echo '<div class="gallery-item">';
            echo '<img src="' . esc_url($gallery_image['url']) . '" alt="' . esc_attr($gallery_image['alt']) . '" />';
            echo '</div>';
          }

        }

      echo '</div>';

      if (!empty($gallery_images)) {
        echo '<div class="thumbnails-images">';

          // Output the featured image
          if ($thumbnail_url) {
            echo '<div class="gallery-item">';
            echo '<img src="' . esc_url($thumbnail_url) . '" alt="' . esc_attr($thumbnail_alt) . '" />';
            echo '</div>';
          }

          // Output the gallery images
          foreach ($gallery_images as $gallery_image) {
            echo '<div class="gallery-item">';
            echo '<img src="' . esc_url($gallery_image['url']) . '" alt="' . esc_attr($gallery_image['alt']) . '" />';
            echo '</div>';
          }

        echo '</div>';
      }

      echo '<div class="hovered-image" style="display:none;"><img src=""></div>';
    echo '</section>';
  }
  ?>

  <div class="product-info-socials">
    <div class="product-info-socials-item share">
      <span class="post-review__like">
        <span class="post-review__like-icon">
          <?php get_template_part('template-parts/svg/share') ?>
        </span>
        <?= socialShare( get_the_permalink(), get_the_title() ); ?>
      </span>
    </div>
    <div class="product-info-socials-item likes">
      <?= simpleLikes() ?>
    </div>
  </div>
</div>