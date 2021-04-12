<?php
/**
 * The template for displaying the footer
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package WordPress
 */
?>

	</div><!-- #content -->

<?php if ( class_exists( 'WooCommerce' ) ) { ?>
	<div class="footer-secure-paiement">
		<p><strong><?php _e('Ce site vous offre une connexion et des moyens de paiements sécurisés','base-theme'); ?></strong></p>
		<img src="<?php echo get_template_directory_uri(); ?>/ssl-paiement-securise.png" />
	</div>
<?php } ?>

	<footer id="colophon" class="site-footer" role="contentinfo">
		<aside class="widget-area" role="complementary">
			<nav class="social-navigation" role="navigation" aria-label="Menu de liens sociaux de pied de page">
				<?php new_social_icons_output(); ?>
			</nav>

			<?php if ( is_active_sidebar( 'footer-1' ) ) { ?>
			<div class="widget-column footer-widget-1">
				<?php dynamic_sidebar( 'footer-1' ); ?>
			</div>
			<?php }
			if ( is_active_sidebar( 'footer-2' ) ) { ?>
			<div class="widget-column footer-widget-2">
				<?php dynamic_sidebar( 'footer-2' ); ?>
			</div>
			<?php } ?>
		</aside><!-- .widget-area -->
		
		<?php if ( is_active_sidebar( 'signature' ) ) { ?>
			<?php dynamic_sidebar( 'signature' ); ?>
		<?php } ?>
		
	</footer>

	<?php if ( is_active_sidebar( 'after-footer' ) ) { ?>
		<?php dynamic_sidebar( 'after-footer' ); ?>
	<?php } ?>

	</div><!-- .site-content-contain -->
</div><!-- #page -->
<?php wp_footer(); ?>

</body>
</html>
