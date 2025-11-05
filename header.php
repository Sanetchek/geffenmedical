<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package geffen
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>

<head>
	<meta charset="<?php bloginfo('charset'); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">
	<link rel="manifest" href="<?php echo get_template_directory_uri(); ?>/manifest.json">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
	<?php wp_body_open(); ?>

	<?php
		if (is_page_template('templates/phone-check-page.php')) {
			return;
		}
	?>

	<div id="page" class="site">

		<?php if (!is_page_template('HCP.php') && !is_page_template('templates/multiaccount-order-email.php') && get_post_type() !== 'medical_profile' && get_post_type() !== 'customer' && get_post_type() !== 'managements') : ?>
		<header id="masthead" class="site-header des-header">
			<div class="user-site-navigation col-5 col-md-2">
				<?php $user_ip = $_SERVER['REMOTE_ADDR']; ?>
				<?php if (!wp_is_mobile() && !is_user_blocked($user_ip)): ?>
				<div class="user-site-login">
					<?php get_template_part('template-parts/header/login') ?>
				</div>
				<?php endif; ?>
				<div class="user-site-basket">
					<?php $content = do_shortcode('[xoo_wsc_cart]'); echo $content; ?>
				</div>
				<div class="user-site-favorit">
					<?php get_template_part('template-parts/header/favorites') ?>

					<div class="login-header-hover">
						<svg xmlns="http://www.w3.org/2000/svg" width="24" height="17" viewBox="0 0 24 17" fill="none">
							<path
								d="M10.4152 1.05873C11.2158 0.0187154 12.7842 0.0187153 13.5848 1.05873L23.3777 13.78C24.3901 15.0951 23.4525 17 21.7928 17H2.20715C0.547474 17 -0.390052 15.0951 0.622342 13.78L10.4152 1.05873Z"
								fill="#DAECFC" />
						</svg>
						<span class="header-hover">מועדפים</span>
					</div>
				</div>

				<div class="user-site-search">
					<?php get_template_part('template-parts/header/search') ?>
				</div>
			</div>

			<div class="col-2 col-md-8">
				<?php get_template_part('template-parts/header/logo') ?>
			</div>

			<?php get_template_part('template-parts/header/burger-menu') ?>

			<?php get_template_part('login-form') ?>

			<div class="page-overlay"></div>

			<div class="lds-ring">
				<div></div>
				<div></div>
				<div></div>
				<div></div>
			</div>
		</header>

		<?php if (get_post_type() === 'freestyle_libre') : ?>
		<?php get_template_part('template-parts/header/libre-menu'); ?>
		<?php elseif (get_post_type() === 'omnipod') : ?>
		<?php get_template_part('template-parts/header/omnipod-menu'); ?>
		<?php else : ?>
		<?php if (!wp_is_mobile()) : ?>
		<div lass="col-12 col-md-12 menu-main-geffen-row ds-header-menu2">
			<?php get_template_part('template-parts/header/menu'); ?>
		</div>
		<?php endif; ?>
		<div class="banner-slider-main-page" style="display: block!important;">
			<div lass="col-12 col-md-12 menu-main-geffen-row ds-header-menu2">
			</div>
			<?php if ( is_front_page() ) : ?>
			<div class="col-12 col-md-12 header-slider-banner-home-page"
				style="display: flex!important;justify-content: center;">
				<style>
					.header-slider-desk {
						display: block;
					}

					.header-slider-mobile {
						display: none;
					}

					@media (max-width: 980px) {
						.header-slider-desk {
							display: none;
						}

						.header-slider-mobile {
							display: block !important;
						}

						.header-slider-mobile .slick-slide img {
							display: block;
							width: 100vw;
							height: 500px;
						}


					}
				</style>
				<div class="header-slider header-slider-desk">
					<?php $media = get_field('banner_image', 'option'); ?>
					<?php if ($media) : ?>
					<?php foreach ($media as $item) : ?>
					<div>
						<?php if (!empty($item['video'])) : ?>
						<a href="<?= esc_url($item['banner-link']) ?>" tabindex="0">

							<div class="video-background">
								<!--<video autoplay muted loop playsinline>
									<source
										src="https://geffenmedical.co.il/wp-content/uploads/2024/11/097026b0-834c-49a9-bc49-af956236bb1b.mp4"
										type="video/mp4">
								</video>---->
								<video autoplay muted loop playsinline style="max-height: 460px;width: 100vw;">
									<source src="<?= esc_url($item['video']) ?>" type="video/mp4">
								</video>
							</div>

						</a>
						<?php elseif (!empty($item['image'])) : ?>
						<a href="<?= esc_url($item['banner-link']) ?>" tabindex="0">
							<?php show_image($item['image'], ['auto', '500']); ?>
						</a>
						<?php endif; ?>
					</div>
					<?php endforeach; ?>
					<?php endif; ?>
				</div>

				<div class="header-slider header-slider-mobile">
					<?php $media = get_field('banner_image', 'option'); ?>
					<?php if ($media) : ?>
					<?php foreach ($media as $item) : ?>

					<div>
						<?php if (!empty($item['video_mobile'])) : ?>
						<a href="<?= esc_url($item['banner-link']) ?>" tabindex="0">

							<div class="video-background">
								<!--<video autoplay muted loop playsinline>
									<source
										src="https://geffenmedical.co.il/wp-content/uploads/2024/11/097026b0-834c-49a9-bc49-af956236bb1b.mp4"
										type="video/mp4">
								</video>---->
								<video autoplay muted loop playsinline style="max-height: 460px;width: 100vw;">
									<source src="<?= esc_url($item['video_mobile']) ?>" type="video/mp4">
								</video>
							</div>

						</a>
						<?php elseif (!empty($item['image_mobile'])) : ?>
						<a href="<?= esc_url($item['banner-link']) ?>" tabindex="0" class="image_preview">
							<?php show_image($item['image_mobile']); ?>
						</a>
						<style media="screen">
						  .image_preview img {
						    height: 500px !important;
						  }
						</style>

						<?php endif; ?>
					</div>
					<?php endforeach; ?>
					<?php endif; ?>
				</div>

				<?php endif; ?>
			</div>
			<?php if (is_front_page()) : ?>
			<?php get_template_part('template-parts/companies') ?>
			<?php endif; ?>
		</div>
		<?php endif; ?>
		<?php endif; ?>
