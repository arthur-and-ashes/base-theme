<?php
/**
 * This is the template by default that displays all pages.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage Base theme developped by Arthur H.
 * @version 1.0
 */

get_header(); ?>

<div id="blogbanner" class="mainbanner" <?php if(!empty($banner = get_the_post_thumbnail_url( get_the_ID(), 'full' )) && !is_shop() ) { 
		echo 'style="background-image: url('.$banner.');" "';			 
		} ?> >
	<space id="bannershadow">
		<h1>
			<?php if(is_shop()) { woocommerce_page_title(); } else { the_title(); } ?>
		</h1>
	</space>
</div>

	<div id="primary" class="content-area">
		
		<?php $page_notif = get_post_meta(get_the_ID(),'_page_notif',true);
 		if (!empty($page_notif)) {
			echo '<div class="woocommerce-info">'.$page_notif.'</div>';
		} ?>
		
		<ol class="breadcrumb" itemscope itemtype="http://schema.org/BreadcrumbList">
			<li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem">
				<a itemprop="item" href="<?php echo site_url(); ?>/">
					<span itemprop="name"><?php bloginfo( 'name' ); ?></span>
					<meta itemprop="position" content="1">
				</a>
			</li>			
			<?php if(woocommerce_get_page_id( 'shop' )) { ?>
			>  <li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem">
				<a itemprop="item" href="<?php echo get_permalink( woocommerce_get_page_id( 'shop' )); ?>">
					<span itemprop="name"><?php echo get_the_title( woocommerce_get_page_id( 'shop' )); ?></span>
					<meta itemprop="position" content="2">
				</a>
			</li>
			<?php } ?>
		</ol>
		
		<main id="main" class="site-main" role="main">

			<?php woocommerce_content(); ?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php get_footer(); ?>
