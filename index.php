<?php
/**
 * The index page template file
 *
 * If the user doesn't have selected a static page for their homepage, this is what will appear.
 * Learn more: https://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 */

get_header(); 
if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

<div id="homebanner" class="mainbanner" <?php if(!empty($banner = get_the_post_thumbnail_url( get_the_ID(), 'full' ))) { 
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
						echo '<a href="'.$page_banner["cta1-link"].'"><button class="cta1">'.$page_banner["cta1-text"].'</button></a>';
					}
					if(!empty($page_banner["cta2-text"])){
						echo '<a href="'.$page_banner["cta2-link"].'"><button class="cta2">'.$page_banner["cta2-text"].'</button></a>';
					}
					echo '</div>';
				} ?>
	</space>
</div>

<div id="primary" class="content-area">
	<main id="main" class="site-main" role="main">
		
		<?php $page_notif = get_post_meta(get_the_ID(),'_page_notif',true);
		if (!empty($page_notif)) {
			echo '<div class="page-notif">'.$page_notif.'</div>';
		}

		 the_content(); ?>
		
		<?php $i=0; $main_slider_images = get_post_meta(get_the_ID(),'_main_slider_images',true);
		if(!empty($main_slider_images[0])){
			echo '<ul id="imageslide">';
			foreach($main_slider_images as $image) { 
				if(!empty($image)) {?>
					<li <?php if($i == 0) { echo 'class="new"'; } ?>><img src="<?php echo $image; ?>" /></li>
				<?php }
			}
			echo '</ul>';
		} ?>
		
		<section class="boxes">
			<div class="box">
				<img src="<?php echo get_template_directory_uri(); ?>/assets/svg/globe.svg" sizes="(max-width: 120px) 100vw, 120px" alt="international" width="120" height="120" />
		<h3><?php _e( 'Des ventes internationales', 'base-theme' ); ?></h3>
		<p><?php _e( 'Nous vendons et livrons nos produits dans toute l\'europe.', 'base-theme' ); ?></p>
			</div>
			
			<?php /*<div class="box">
				<img src="<?php echo get_template_directory_uri(); ?>/assets/svg/quality.svg" sizes="(max-width: 120px) 100vw, 120px" alt="qualité" width="120" height="120" />
				<h3><?php _e( 'Des accessoires de qualité', 'base-theme' ); ?></h3>
				<p><?php _e( 'Tous nos produits sont élaborés avec soin et en respect des normes en vigueur.', 'base-theme' ); ?></p>
			</div> */ ?>
			
			<div class="box">
				<img src="<?php echo get_template_directory_uri(); ?>/assets/svg/tag.svg" sizes="(max-width: 120px) 100vw, 120px" alt="Sélectionné" width="120" height="120" />
				<h3><?php _e( 'Des offres incomparables', 'base-theme' ); ?></h3>
				<p><?php _e( 'Nous veillons à vous offrir la meilleure expérience d\'hygiène et de santé dans vos déplacements et activités.', 'base-theme' ); ?></p>
			</div>
			
			<div class="box">
				<img src="<?php echo get_template_directory_uri(); ?>/assets/svg/lock.svg" sizes="(max-width: 120px) 100vw, 120px" alt="international" width="120" height="120" />
				<h3><?php _e( 'Des payements sécurisés', 'base-theme' ); ?></h3>
				<p><?php _e( 'Notre site utilise des moyens de payements certifiés et sûrs.', 'base-theme' ); ?></p>
			</div>
		</section>
		
		
		<?php $corporate_reviews = get_post_meta(get_the_ID(),'_corporate_reviews',true);
		if(!empty($corporate_reviews[0][comment])) { ?>
			<section>
				<h2 class="aligncenter"><?php _e( 'ils se sont engagés auprès de nous', 'base-theme' ); ?></h2>
				<div class="over-page comments" >
					<ul id="slider">
					<?php $i = 0;
					foreach($corporate_reviews as $review){
						if (!empty($review[comment])){
							echo '<li '. (($i == 0)? 'class="show"':'') .'>
							<img src="'.$review[reviewer_face].'" class="review-profile" />
							<p>'.$review[comment].'</p>
							</li>';
						}
						$i++;
					} ?>
					</ul>
				</div>
			</section>
		<?php } ?>
			
		
		<?php // get the last articles
		$marks = get_posts(array(
			"post_type" => "post",
			'numberposts' => 3,
			'orderby'          => 'date',
			'order'            => 'DESC',
			"offset" => 0,
		)); 
		if( $marks ) : ?>
			<h2 class="aligncenter"><?php _e( 'Nos dernières actualités', 'base-theme' ); ?></h2>
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
			<?php endforeach; endif; ?>
		</section>

	</main><!-- #main -->
</div><!-- #primary -->

<?php endwhile;	endif;
get_footer(); ?>