<?php
  $coupon_code = '';
  // Check if the form was submitted
  if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Retrieve the coupon code from the POST data
    $coupon_code = isset($_POST['coupon_code']) ? $_POST['coupon_code'] : '';

    WC()->cart->apply_coupon($coupon_code);
  }
?>

<?php $user_ip = $_SERVER['REMOTE_ADDR']; ?>
<?php if (wc_coupons_enabled() && !is_user_blocked($user_ip)) { ?>
<div class="coupon">
  <label for="coupon_code" class="screen-reader-text"><?php esc_html_e('קוד קופון ', 'geffen'); ?></label>

  <input type="text" name="coupon_code" class="input-text coupon__code" id="coupon_code" value="<?= $coupon_code ?>" placeholder="<?php esc_attr_e('יש לך קוד קופון? ', 'woocommerce'); ?>" />

  <?php
    global $woocommerce;

    // Get applied coupons from the cart
    $applied_coupons = $woocommerce->cart->get_applied_coupons() ? implode(',', $woocommerce->cart->get_applied_coupons()) : '';
  ?>
  <input type="hidden" id="coupon_codes" name="coupon_codes" value="<?= $applied_coupons ?>">

  <button type="button" id="coupon_code_submit"
    class="coupon__btn button<?php echo esc_attr(wc_wp_theme_get_element_class_name('button') ? ' ' . wc_wp_theme_get_element_class_name('button') : ''); ?>"
    name="apply_coupon" value="<?php esc_attr_e('Apply coupon', 'woocommerce'); ?>">
  <!--  <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 16 16" fill="none">
      <path d="M3.74561 6L7.0385 2.70711C7.42902 2.31658 8.06219 2.31658 8.45271 2.70711L11.7456 6"
        stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
      <path d="M7.74561 2.69922L7.74561 10.6992" stroke="white" stroke-width="2" stroke-linecap="round"
        stroke-linejoin="round" />
      <line x1="3" y1="13.0449" x2="13" y2="13.0449" stroke="white" stroke-width="2" stroke-linecap="round" />
    </svg>-->
    <p>אישור</p>
  </button>
</div>
<?php } ?>