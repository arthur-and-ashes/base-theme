<?php function base_setup() {

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
	 * Let WordPress manage the document title.
	 * By adding theme support, we declare that this theme does not use a
	 * hard-coded <title> tag in the document head, and expect WordPress to
	 * provide it for us.
	 */
	add_theme_support( 'title-tag' );

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
	 */
	add_theme_support( 'post-thumbnails' );
	add_image_size( 'base-thumbnail-avatar', 100, 100, true );
	add_image_size( 'actu-grid', 400, 200, true );  /* Taille pour le blog */

	// Set the default content width.
	$GLOBALS['content_width'] = 900;

	// This theme uses wp_nav_menu() in two locations.
	register_nav_menus( array(
		'header-menu' => __( 'Header Menu', 'base-theme' ),
		'footer-one' => __( 'Footer colonne 1', 'base-theme' ),
	) );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'comment-form',
		'comment-list',
		'gallery',
		'caption',
	) );

	// Add theme support for Custom Logo.
	add_theme_support( 'custom-logo', array(
		'width'       => 250,
		'height'      => 250,
		'flex-width'  => true,
	) );

	// Add theme support for selective refresh for widgets.
	add_theme_support( 'customize-selective-refresh-widgets' );


	/*** Filters Twenty Seventeen array of starter content.
	 * @param array $starter_content Array of starter content.
	 ***/
	$starter_content = apply_filters( 'twentyseventeen_starter_content', $starter_content );

	add_theme_support( 'starter-content', $starter_content );
}
add_action( 'after_setup_theme', 'base_setup' );


// Enqueue scripts
function twentyseventeen_scripts() {

	// Theme stylesheet.
	wp_enqueue_style( 'corp-style', get_stylesheet_uri() );
	wp_enqueue_style( 'font-awesome', get_template_directory_uri() . '/assets/fonts/font-awesome.min.css' );
	wp_enqueue_script( 'scripts', get_theme_file_uri( '/assets/js/scripts.js' ), array( 'jquery' ), '1.0', true );

}
add_action( 'wp_enqueue_scripts', 'twentyseventeen_scripts' );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function twentyseventeen_widgets_init() {
	register_sidebar( array(
		'name'          => __( 'Boutique sidebar', 'base-theme' ),
		'id'            => 'sidebar-store',
		'description'   => __( 'Ajoutez des widgets qui apparaîtront sur votre boutique', 'base-theme' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );

	register_sidebar( array(
		'name'          => __( 'Footer colonne 1', 'base-theme' ),
		'id'            => 'footer-1',
		'description'   => __( 'Ajoutez des widgets pour la première colonne de votre footer.', 'base-theme' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
	
	register_sidebar( array(
		'name'          => __( 'Footer colonne 2', 'base-theme' ),
		'id'            => 'footer-2',
		'description'   => __( 'Ajoutez des widgets pour la première colonne de votre footer.', 'base-theme' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );

	register_sidebar( array(
		'name'          => __( 'Signature', 'base-theme' ),
		'id'            => 'signature',
		'description'   => __( 'Ajoutez une ligne de texte qui s\'affichera à la fin de votre footer.', 'base-theme' ),
		'before_widget' => '<section id="%1$s" class="widget footer-line %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
	register_sidebar( array(
		'name'          => __( 'Signature 2', 'base-theme' ),
		'id'            => 'after-footer',
		'description'   => __( 'Ajoutez du texte ici qui s\'affichera en dessous de votre footer.', 'base-theme' ),
		'before_widget' => '<section id="%1$s" class="widget footer-bottom %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'twentyseventeen_widgets_init' );

// Disable the emoji's
function disable_emojis() {
	remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
	remove_action( 'admin_print_scripts', 'print_emoji_detection_script' );
	remove_action( 'wp_print_styles', 'print_emoji_styles' );
	remove_action( 'admin_print_styles', 'print_emoji_styles' );	
	remove_filter( 'the_content_feed', 'wp_staticize_emoji' );
	remove_filter( 'comment_text_rss', 'wp_staticize_emoji' );	
	remove_filter( 'wp_mail', 'wp_staticize_emoji_for_email' );
}
add_action( 'init', 'disable_emojis' );

// Adds a simple Theme Info page to the Appearance section of the WordPress Dashboard.
include('base-theme-info-page.php');

function my_info_page_tabs($hook) {
		wp_enqueue_script('jquery-ui-tabs');
}
add_action( 'admin_enqueue_scripts', 'my_info_page_tabs' );

// Custom login page
function cb_login() {
	echo '<link rel="stylesheet" type="text/css" href="' . get_bloginfo('stylesheet_directory') . '/assets/css/login-style.css" />';
	$mainlogo = get_option('my-custom-logo');
	if(!empty($mainlogo)){
		echo '<style>
			.login #login h1 a { background-image: url("'.$mainlogo.'"); }
		</style>';
	}
	else {
		echo '<style>
			.login #login h1 a { background: none; margin-top: 80px; height: 50px; text-indent:0; }
		</style>';
	}
}
add_action('login_head', 'cb_login');

function my_login_logo_url( $url ) {
	return get_bloginfo( 'url' );
}
add_filter( 'login_headerurl', 'my_login_logo_url' );

function my_login_logo_url_title() {
	$title = 'Connectez-vous sur '.get_bloginfo( 'name' );
	return $title;
}
add_filter( 'login_headertitle', 'my_login_logo_url_title' );



// Specific functions for this theme

// disable gutenberg
/* add_filter('use_block_editor_for_post', '__return_false', 10);
add_filter('use_block_editor_for_post_type', '__return_false', 10); */

// manage supports for posts
add_action('init', 'post_supports');
function post_supports() {
    add_post_type_support( 'post', array('excerpt') );
}

function change_post_menu_label() {
    global $menu;
    global $submenu;
    $menu[5][0] = 'Actualités';
    $submenu['edit.php'][5][0] = 'Actualités';
    $submenu['edit.php'][10][0] = 'Ajouter une actu';
    echo '';
}
function change_post_object_label() {
        global $wp_post_types;
        $labels = &$wp_post_types['post']->labels;
        $labels->name = 'Actualités';
        $labels->singular_name = 'Actualité';
        $labels->add_new = 'ajouter une Actualité';
        $labels->add_new_item = 'ajouter une Actualité';
        $labels->featured_image = 'Image / banner (> 1800px de largeur)';
        $labels->set_featured_image = 'Charger une image (> 1800px de largeur)';
}
add_action( 'init', 'change_post_object_label' );
add_action( 'admin_menu', 'change_post_menu_label' );

function remove_actu_supports_init() {
	remove_post_type_support( 'post', 'author' );
	remove_post_type_support( 'post', 'custom-fields' );
		remove_post_type_support( 'post', 'excerpt' );
		remove_post_type_support( 'post', 'comments' );
		remove_post_type_support( 'post', 'slug' );
}
add_action( 'init', 'remove_actu_supports_init' );

add_action('add_meta_boxes','metabox_pages');
function metabox_pages($post_type){
  add_meta_box('page_details', 'Détails de la page', 'page_details', 'page', 'normal', 'high');
}

function page_details($post){
		
	$page_banner = get_post_meta($post->ID,'_page_banner',true);
	echo '<label for="rem" style="font-weight:bold;">Texte de la bannière : </label>'; 
  	echo '<input id="etude_repondants" type="text" style="width:100%;max-width:100%;display:inline-block;" name="page_banner[punchline]" value="'.$page_banner["punchline"].'" ><br><br><hr>';
	
	echo '<h3>Premier bouton</h3>';
  	echo '<span>Texte : </span><input id="bouton-1" type="text" style="width:400px;max-width:100%;display:inline-block;" name="page_banner[cta1-text]" value="'.$page_banner["cta1-text"].'" ><br>';
	  	echo '<span>Lien : </span><input id="bouton-1" type="url" style="width:400px;max-width:100%;display:inline-block;" name="page_banner[cta1-link]" value="'.$page_banner["cta1-link"].'" ><br><br><hr>';
	
		echo '<h3>Second bouton</h3>';
  	echo '<span>Texte : </span><input id="bouton-2" type="text" style="width:400px;max-width:100%;display:inline-block;" name="page_banner[cta2-text]" value="'.$page_banner["cta2-text"].'" ><br>';
	  	echo '<span>Lien : </span><input id="bouton-2" type="url" style="width:400px;max-width:100%;display:inline-block;" name="page_banner[cta2-link]" value="'.$page_banner["cta2-link"].'" ><br><br><hr>';

}

add_action('save_post','save_page_details');
function save_page_details($post_ID){
		
	if(isset($_POST['page_banner'])){
		update_post_meta($post_ID,'_page_banner', $_POST['page_banner']);
	}
	if(isset($_POST['slider_images'])){
		update_post_meta($post_ID,'_main_slider_images', $_POST['slider_images']);
	}
	if(isset($_POST['review'])){
		update_post_meta($post_ID,'_corporate_reviews', $_POST['review']);
	}
	if(isset($_POST['page-notif'])){
		update_post_meta($post_ID,'_page_notif', $_POST['page-notif']);
	}
}

// Woocommerce support
function mytheme_add_woocommerce_support() {
    add_theme_support( 'woocommerce' );
}
add_action( 'after_setup_theme', 'mytheme_add_woocommerce_support' );

add_theme_support( 'wc-product-gallery-zoom' );
add_theme_support( 'wc-product-gallery-lightbox' );
add_theme_support( 'wc-product-gallery-slider' );

/*
// WOOCOMMERCE Show cart contents / total Ajax
function woocommerce_header_add_to_cart_fragment( $fragments ) {
	global $woocommerce;
	ob_start();
	?>
	<a class="cart-customlocation" href="<?php echo esc_url(wc_get_cart_url()); ?>" title="<?php _e('View your shopping cart', 'woothemes'); ?>"><?php echo sprintf(_n('%d item', '%d items', $woocommerce->cart->cart_contents_count, 'woothemes'), $woocommerce->cart->cart_contents_count);?> – <?php echo $woocommerce->cart->get_cart_total(); ?></a>
	<?php
	$fragments['a.cart-customlocation'] = ob_get_clean();
	return $fragments;
}
add_filter( 'woocommerce_add_to_cart_fragments', 'woocommerce_header_add_to_cart_fragment' ); */

// Ajax refreshing mini cart count and content
function my_header_add_to_cart_fragment( $fragments ) {
    $count = WC()->cart->get_cart_contents_count();

    $fragments['#cart_count'] = '<span id="cart_count" class="cart__amount">' . esc_attr( $count ) . '</span>';

    ob_start();
    ?>
    <div id="mini-cart-content" class="sub-menu sub-menu--right sub-menu--cart">
    <?php my_wc_mini_cart_content(); ?>
    <div>
    <?php

    $fragments['#mini-cart-content'] = ob_get_clean();
    return $fragments;
}
 add_filter( 'woocommerce_add_to_cart_fragments', 'my_header_add_to_cart_fragment' );

// Woocommerce Remove related products output
remove_action( 'woocommerce_after_single_product_summary', 'woocommerce_output_related_products', 20 );
