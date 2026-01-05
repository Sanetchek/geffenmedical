<?php
/**
 * Shipping Methods Display
 *
 * In 2.1 we show methods per package. This allows for multiple methods per order if so desired.
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/cart/cart-shipping.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 50.0.0
 */

defined( 'ABSPATH' ) || exit;
?>
<section class="woocommerce-shipping-totals shipping">
	<h2 class="cart__title"><?php echo __('שיטת משלוח ', 'geffen') ?></h2>
	<div data-title="<?php echo esc_attr( $package_name ); ?>">
		<?php if ( $available_methods ) : ?>
			<ul id="shipping_method" class="woocommerce-shipping-methods">
				<?php $count = 0; ?>
				<?php foreach ( $available_methods as $method ) : ?>
					<?php
						$count++;
						$cost = $method->cost == 0 ? __('חינם ', 'geffen') : wc_price($method->cost);
						$svg = '<svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" viewBox="0 0 15 15" fill="none"><path d="M7.49968 0C3.3581 0 0 3.3581 0 7.49968C0 11.6413 3.3581 15 7.49968 15C11.6413 15 15 11.6413 15 7.49968C15 3.3581 11.6413 0 7.49968 0ZM9.06095 11.6235C8.67492 11.7759 8.36762 11.8914 8.13714 11.9714C7.9073 12.0514 7.64 12.0914 7.33587 12.0914C6.86857 12.0914 6.50476 11.9771 6.24571 11.7492C5.98667 11.5213 5.85778 11.2324 5.85778 10.8813C5.85778 10.7448 5.8673 10.6051 5.88635 10.4629C5.90603 10.3206 5.93714 10.1606 5.97968 9.98095L6.46286 8.27429C6.5054 8.11048 6.54222 7.95492 6.57143 7.81016C6.60064 7.66413 6.6146 7.53016 6.6146 7.40825C6.6146 7.19111 6.56952 7.03873 6.48 6.95302C6.38921 6.8673 6.21841 6.8254 5.96381 6.8254C5.83937 6.8254 5.71111 6.84381 5.57968 6.88254C5.44952 6.92254 5.33651 6.95873 5.24381 6.99429L5.37143 6.46857C5.68762 6.33968 5.99048 6.22921 6.27937 6.13778C6.56825 6.04508 6.84127 5.99937 7.09841 5.99937C7.56254 5.99937 7.92064 6.11238 8.1727 6.33587C8.42349 6.56 8.54984 6.85143 8.54984 7.20952C8.54984 7.28381 8.54095 7.4146 8.52381 7.60127C8.50667 7.78857 8.47429 7.95937 8.4273 8.11619L7.94667 9.81778C7.9073 9.95429 7.87238 10.1105 7.84064 10.2851C7.80952 10.4597 7.79429 10.593 7.79429 10.6825C7.79429 10.9086 7.84444 11.0629 7.94603 11.1448C8.04635 11.2267 8.22222 11.2679 8.47111 11.2679C8.58857 11.2679 8.72 11.247 8.86857 11.2063C9.01587 11.1657 9.12254 11.1295 9.18984 11.0984L9.06095 11.6235ZM8.97587 4.71683C8.75175 4.92508 8.4819 5.02921 8.16635 5.02921C7.85143 5.02921 7.57968 4.92508 7.35365 4.71683C7.12889 4.50857 7.01524 4.25524 7.01524 3.95937C7.01524 3.66413 7.12952 3.41016 7.35365 3.2C7.57968 2.98921 7.85143 2.88444 8.16635 2.88444C8.4819 2.88444 8.75238 2.98921 8.97587 3.2C9.2 3.41016 9.31238 3.66413 9.31238 3.95937C9.31238 4.25587 9.2 4.50857 8.97587 4.71683Z" fill="#0A3B64"/></svg>';
						$text = __('זמן אספקה 1-5 ימי עסקים. שעות המשלוחים בימים א-ה בין 08:00 ל- 17:00. חשוב להיות זמינים, השליח יתאם הגעתו טלפונית ביום השליחות. ייתכנו עיכובים בהגעת השליח ביישובים מרוחקים.'  , 'geffen');
						$text_done = __('
						זמן אספקה 1-4 ימי עסקים במבחר עמדות לוקרים של DONE ברחבי הארץ. חברת  DONE תשלח הודעה אל מספר הטלפון הנייד המעודכן בהזמנה ברגע שהחבילה תגיע ללוקר. החבילה תהיה זמינה בלוקר ל- 48 שעות.'  , 'geffen');
						$text_output = $method->label == 'DONE' ? $text_done : $text;
						$info = $method->cost == 0 ? '' : '<span class="shipping__choice_label-info">'. $svg .'<span class="shipping__choice_info">'. $text_output .'</span></span>';

						$type = esc_attr( sanitize_title( $method->id ) );

						switch($type) {
							case 'local_pickup2':
								$name = $method->label;
								$name .= ' <a href="https://maps.app.goo.gl/SL8e1gcjP9gkEvti7"> DMC בת״א </a> ';
								break;
							case 'flat_rate6':
								$name = $method->label;
								$name .= ' <a href="google.com"> DMC בת״א </a> ';
								break;
							case 'flat_rate4':
								$name = $method->label;
								break;
							case 'flat_rate5':
								$name = '<img src="'. assets('img/done.png') .'" alt="done">';
								break;
							default:
								$name = $method->label;
						}

					?>
					<li class="woocommerce-shipping-methods-item">
						<?php
						if ( 1 < count( $available_methods ) ) {
							printf( '<input type="radio" name="shipping_method[%1$d]" data-index="%1$d" id="shipping_method_%1$d_%2$s" value="%3$s" class="shipping_method" %4$s data-tab="%5$s" data-cost="%6$s" />', $index, esc_attr( sanitize_title( $method->id ) ), esc_attr( $method->id ), checked( $method->id, $chosen_method, false ), esc_attr( sanitize_title( $method->id ) ), $method->cost ); // WPCS: XSS ok.
						} else {
							printf( '<input type="hidden" name="shipping_method[%1$d]" data-index="%1$d" id="shipping_method_%1$d_%2$s" value="%3$s" class="shipping_method" />', $index, esc_attr( sanitize_title( $method->id ) ), esc_attr( $method->id ) ); // WPCS: XSS ok.
						}
						printf( '<label class="shipping__choice_label" for="shipping_method_%1$s_%2$s"> <span class="shipping__choice_name">%3$s</span><span class="shipping__choice_cost-wrap">
						<span class="shipping__choice_cost">%4$s</span> %5$s</span></label>', $index, esc_attr( sanitize_title( $method->id ) ), $name, $cost, $info ); // WPCS: XSS ok.

						do_action( 'woocommerce_after_shipping_rate', $method, $index );
						?>
					</li>
				<?php endforeach; ?>
			</ul>
			<?php
			// Add hidden fields for shipping method title and price
			// These will be updated by JavaScript when method changes
			$chosen_method = '';
			$chosen_method_title = '';
			$chosen_method_price = 0;

			if (!empty($chosen_methods) && isset($chosen_methods[0])) {
				$chosen_method = $chosen_methods[0];
				foreach ($available_methods as $method) {
					if ($method->id === $chosen_method) {
						$chosen_method_title = $method->get_label();
						$chosen_method_price = floatval($method->get_cost());
						break;
					}
				}
			} elseif (!empty($available_methods)) {
				// Default to first method if none chosen
				$first_method = reset($available_methods);
				$chosen_method_title = $first_method->get_label();
				$chosen_method_price = floatval($first_method->get_cost());
			}
			?>
			<input type="hidden" id="shipping_method_title" name="shipping_method_title" value="<?php echo esc_attr($chosen_method_title); ?>">
			<input type="hidden" id="shipping_method_price" name="shipping_method_price" value="<?php echo esc_attr($chosen_method_price); ?>">
		<?php endif; ?>
	</div>
</section>
