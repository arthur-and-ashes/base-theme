<?php

/**

 * The header for our theme

 *

 * This is the template that displays all of the <head> section and everything up until <div id="content">

 *

 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials

 *

 */



?><!DOCTYPE html>

<html <?php language_attributes(); ?> class="no-js">

<head>

	<meta charset="<?php bloginfo( 'charset' ); ?>">

	<meta name="viewport" content="width=device-width, initial-scale=1">	

	<link rel="profile" href="http://gmpg.org/xfn/11">

	<?php if(get_option('my-favicon')){ ?>

	<link rel="icon" type="image/png" href="<?php echo get_option('my-favicon'); ?>" />

	<?php } ?>

	

	<!-- Global site tag (gtag.js) - Google Analytics -->

	<script async src="https://www.googletagmanager.com/gtag/js?id=UA-179473329-1"></script>

	<script>

	  window.dataLayer = window.dataLayer || [];

	  function gtag(){dataLayer.push(arguments);}

	  gtag('js', new Date());



	  gtag('config', 'UA-179473329-1');

	</script>



<?php wp_head(); ?>

</head>



<body <?php body_class(); ?>>

	<div id="page" class="site">

	

		<header id="masthead" class="site-header" role="banner">

			<div class="container">

				<div class="header-c flex">

					<a class="header_a_img" href="<?php echo site_url(); ?>" title="Accueil">

						<?php if(get_option('my-custom-logo')) { ?>

						<img class="logo_white" width="120" src="<?php echo get_option('my-custom-logo-white'); ?>" alt="Logo">

						<img class="logo" width="120" src="<?php echo get_option('my-custom-logo'); ?>" alt="Logo">

						<span class="site-name"><?php echo get_bloginfo( 'name' ); ?></span>

						<?php } else { 

							echo '<span class="site-name">'.get_bloginfo( 'name' ).'</span>';

						} ?>

					</a>



					<?php if ( has_nav_menu( 'header-menu' ) ) {

						wp_nav_menu( array(

							'container'=> false,

							'menu_class' => 'header-menu',

							'theme_location' => 'header-menu',

						) );

					} ?>

					

				<?php if ( class_exists( 'WooCommerce' ) ) { ?>

					<div class="fas header-panier open-magic">

						<span class="count">

							<?php if ( class_exists( 'WooCommerce' ) ) { echo WC()->cart->get_cart_contents_count(); } ?>

						</span>

					</div>

					<?php } else if(get_option( 'users_can_register') ) { ?>

					<div class="fas header-profile open-magic"></div>

					<?php } ?>

					

				<?php if(function_exists(pll_the_languages)){

					echo '<div class="langswitch">';

					pll_the_languages( array( 'show_names'=>0, 'show_flags'=>1) );

					echo '</div>';

				} ?>

					

				</div>

				

				<div data-on-anchor="burger" data-on-action="burger" class="burger lg-hidden">

					<span></span>

					<span></span>

					<span></span>

				</div>

				

			</div>

		</header>

		

		<div id="bar-menu">

			<span class="fas fa-arrow-circle-left open-magic"></span>

			<?php if ( class_exists( 'WooCommerce' ) ) { ?>

				<a class="cart-customlocation" href="<?php echo wc_get_cart_url(); ?>" title="<?php _e( 'Consultez votre panier', 'base-theme' ); ?>"><?php echo sprintf ( _n( '%d item', '%d items', WC()->cart->get_cart_contents_count() ), WC()->cart->get_cart_contents_count() ); ?> – <?php echo WC()->cart->get_cart_total(); ?></a>

			<hr>

			<?php if(function_exists(woocommerce_mini_cart)) {

				if(WC()->cart->get_cart_contents_count() > 0) {

				 	echo '<div class="woocommerce-mini-cart">';

						woocommerce_mini_cart();

				 	echo '</div>';

				}

				 else {

					 echo '<strong class="aligncenter">VOTRE PANIER EST VIDE.</strong>';

				 }

			} ?>

			<?php } ?>

			

			<?php if(is_user_logged_in()) { ?>

			<p><?php _e('Vous êtes connecté(e)','base-theme'); ?></p>

				

			<?php if ( class_exists( 'WooCommerce' ) ) { ?>

				<p>

					<a href="<?php echo get_permalink( get_option('woocommerce_myaccount_page_id') ); ?>" class="highlight" >

						<?php _e('Consultez votre compte dès à présent','base-theme'); ?>.

					</a>

				</p>

			<?php }	} else { ?>

				<p>

					<a href="<?php echo get_permalink( get_option('woocommerce_myaccount_page_id') ); ?>" class="highlight">

						<?php _e('Connectez-vous pour suivre vos achats','base-theme'); ?>.

					</a>

				</p>

			<?php } ?>

		</div>

		

		<script type="text/javascript">

			jQuery(document).ready(function($){

				$('.open-magic').on('click', function() {

					$('body').toggleClass('isOpen');

				});

			});

		</script>



	

		<div class="site-content-contain">

			<div id="content" class="site-content">