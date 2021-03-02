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

			<?php
			
				while ( have_posts() ) : the_post();

				$page_notif = get_post_meta(get_the_ID(),'_page_notif',true);
				if (!empty($page_notif)) {
					echo '<div class="woocommerce-info">'.$page_notif.'</div>';
				}

				the_content();

				// If comments are open or we have at least one comment, load up the comment template.
				if ( comments_open() || get_comments_number() ) :
					comments_template();
				endif;
			endwhile; // End of the loop.
			?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php get_footer(); ?>
