<div class="conteiner-hcp">
  <div class="row">
    <div class="col-md-12">
      <div class="hcp-button-block">
      <?php if (get_post_type() == 'medical_profile'): ?>
        <a href="<?= esc_url($args['jd_link']) ?>"><?= esc_html($args['joining_database']) ?></a>
        <?php endif; ?>
        <a href="/contact"><?= $args['customer_service'] ?></a>
        <a href="<?= $args['ap_link'] ?>"><?= $args['availability_products'] ?></a>
      </div>
    </div>
  </div>
</div>
