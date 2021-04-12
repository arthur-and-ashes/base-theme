<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package WordPress
 * @subpackage Twenty_Seventeen
 * @since 1.0
 * @version 1.0
 */

get_header();
while ( have_posts() ) : the_post(); ?>


<div id="blogbanner" class="mainbanner" <?php if(!empty($banner = get_the_post_thumbnail_url( get_the_ID(), 'full' ))) { 
		echo 'style="background-image: url('.$banner.');" "';			 
	} else {
		echo 'style="background-image: url('.get_template_directory_uri().'/assets/images/basketball.jpg);"';
	} ?> >
	<space id="bannershadow">
		<h1>
			<?php the_title(); ?>
		</h1>
	</space>
</div>

	<div id="primary" class="content-area">
		<ol class="breadcrumb" itemscope itemtype="http://schema.org/BreadcrumbList">
			<li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem">
				<a itemprop="item" href="<?php echo site_url(); ?>/">
					<span itemprop="name"><?php bloginfo( 'name' ); ?></span>
					<meta itemprop="position" content="1">
				</a>
			</li> > 
			<li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem">
				<a itemprop="item" href="<?php echo get_home_url(); ?>/actualites/">
					<span itemprop="name">Actualités</span>
					<meta itemprop="position" content="2">
				</a>
			</li>
		</ol>
		
		<main id="main" class="site-main" role="main">
			<span class="main-title"><?php the_title(); ?></span>
			
			<p class="date-posted">Article publié le <?php the_date(); ?>
				
			<?php $auteurs = get_the_terms(get_the_ID(),'auteurs');
				if(! empty($auteurs)) { 
					echo 'par ';
					foreach ( $auteurs as $auteur ) {
					  	$display_auteurs.= $auteur->name.', ';
					}
					echo rtrim($display_auteurs, ', ').'.';
				} ?>
			
			</p>
			<?php the_content(); ?>
						 
			<?php /* if ( comments_open() || get_comments_number() ) :
				comments_template();
			endif; */ ?>

			<?php the_post_navigation(); ?>

		</main><!-- #main -->
	</div><!-- #primary -->
	
	<?php endwhile; ?>
	
<?php get_footer();