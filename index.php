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

<div id="blogbanner" class="mainbanner" <?php if(!empty($banner = get_the_post_thumbnail_url( get_the_ID(), 'full' ))) { 
		echo 'style="background-image: url('.$banner.');" "';			 
	} else {
		echo 'style="background-image: url('.get_template_directory_uri().'/assets/images/start-up-coffee.jpg);"';
	} ?> >
	<space id="bannershadow">
		<?php  $page_banner = get_post_meta(get_the_ID(),'_page_banner',true);
				if(!empty($page_banner["punchline"])){

          echo '<h1>'. $page_banner["punchline"].'</h1>';

				} else {

					echo '<h1>'.get_the_title().'</h1>';

				}

			if(!empty($page_banner["cta1-text"]) || !empty($page_banner["cta2-text"])){

					echo '<div class="buttons">';

					if(!empty($page_banner["cta1-text"])){

						echo '<a href="'.$page_banner["cta1-link"].'" target="_blank"><button class="cta1">'

							.$page_banner["cta1-text"].'</button>

						</a>';

					}

					if(!empty($page_banner["cta2-text"])){

						echo '<a href="'.$page_banner["cta2-link"].'" target="_blank"><button class="cta2">'

							.$page_banner["cta2-text"].'</button>

						</a>';

					}

					echo '</div>';

				} ?>

	</space>

</div>

	<div id="primary" class="content-area">

		<main id="main" class="site-main" role="main">
      
			<?php while ( have_posts() ) : the_post();

				the_content();

				// If comments are open or we have at least one comment, load up the comment template.

			endwhile; ?>
			
			<?php // get the last articles
			$marks = get_posts(array(
				"post_type" => "post",
				'numberposts' => 2,
				'orderby'          => 'date',
				'order'            => 'DESC',
				"offset" => 0,
			)); 
			if( $marks ) : ?>
				<h2 class="aligncenter"><?php _e( 'Nos dernières actualités', 'k19-store' ); ?></h2>
				<section id="grid-container" class="transitions-enabled fluid masonry js-masonry grid">
					<?php foreach($marks as $mark) : ?>
					<article id="post-<?php $mark->ID; ?>" <?php post_class('post'); ?>>
						<space <?php if(!empty($banner = get_the_post_thumbnail_url( $mark->ID, 'actu-grid' ))) { 
								echo 'style="background-image: url('.$banner.');" "';			 
								} else { echo 'class="standard-image"'; } ?> >
						</space> 
						<div class="post-subtitle">
							<a href="<?php echo get_permalink($mark->ID); ?>">
								<h3><?= $mark->post_title ?></h3>
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
				<?php endforeach; ?>
			</section>
			<?php endif; ?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php get_footer(); ?>
