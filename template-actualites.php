<?php
/**
Template Name: Template page de blog 
 *
 * If the user has selected a static page for their homepage, this is what will appear.
 * Learn more: https://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage Base theme developped by Arthur H.
 * @version 1.0
 */

get_header(); 
if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

<div id="blogbanner" class="mainbanner" <?php if(!empty($banner = get_the_post_thumbnail_url( get_the_ID(), 'full' ))) { 
		echo 'style="background-image: url('.$banner.');"';			 
	} else {
		echo 'style="background-image: url('.get_template_directory_uri().'/assets/images/espresso.jpg);"';			 
	} ?> >
	<space id="bannershadow">
		<?php  $page_banner = get_post_meta(get_the_ID(),'_page_banner',true);
				if(!empty($page_banner["punchline"])){
					echo '<h1>'. $page_banner["punchline"].'</h1>';
				} else {
					echo '<h1>'.get_the_title().'</h1>';
				} ?>
	</space>
</div>

<div id="primary" class="content-area">
	<main id="main" class="site-main" role="main">

		<?php the_content(); ?>
		
		<section id="grid-container" class="transitions-enabled fluid masonry js-masonry grid">
					<?php $marks = get_posts(array(
						"post_type" => "post",
						'numberposts' => -1,
						'orderby'          => 'date',
				        'order'            => 'DESC',
						"offset" => 0
						)); 
					if( $marks ) : foreach($marks as $mark) : ?>
					<article id="post-<?php $mark->ID; ?>" <?php post_class('post'); ?>>
						<space <?php if(!empty($banner = get_the_post_thumbnail_url( $mark->ID, 'actu-grid' ))) { 
								echo 'style="background-image: url('.$banner.');" "';			 
								} else { echo 'class="standard-image"'; } ?> >
						</space> 
						<div class="post-subtitle">
							<a href="<?php echo get_permalink($mark->ID); ?>">
								<h2><?= $mark->post_title ?></h2>
							</a>
						</div>
						<div class="post-description">
							<p>
								<?php if ( !empty( $mark->post_excerpt ) ) {
									echo wp_trim_words($mark->post_excerpt, 25);
								} else {
									echo wp_trim_words( $mark->post_content, 25);
								} ?>
							</p>
						</div>
				</article>
				<?php endforeach; endif; ?>
			</section>

	</main><!-- #main -->
</div><!-- #primary -->

<?php endwhile;	endif;
get_footer(); ?>