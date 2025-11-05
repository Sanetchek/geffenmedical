<div class="blue-bg">
  <div class="conteiner-hcp">
    <div class="row">
      <div class="col-md-12">
        <?= $id ?>

        <div class="doctor-foto">
          <?php
            $image = get_field('image', $id);
            $size = '135-148';
            if( $image ) {
              echo wp_get_attachment_image( $image, $size );
            }
          ?>
        </div>

        <div class="doctor-info">
          <h2><?= get_the_title($id) ?></h2>
          <h3><?= get_field('subtitle', $id) ?></h3>
        </div>
      </div>
    </div>
  </div>
</div>