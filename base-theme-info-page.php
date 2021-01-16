<?php
/*
* Info page
*/

function theme_info_menu_link() {
	// Get theme details.
	$theme = wp_get_theme();
	add_theme_page(	'Theme info', 'Réglages du Theme', 'edit_theme_options', 'theme-page-info', 'base_theme_info_page');
	add_action( 'admin_init', 'register_mysettings' );
}
add_action( 'admin_menu', 'theme_info_menu_link' );

function register_mysettings() {
	
	//Paramètres de la page
	register_setting( 'base-theme-opts', 'titlefont-select' );
	register_setting( 'base-theme-opts', 'font-select' );
	register_setting( 'base-theme-opts', 'titlefont-select' );
	register_setting( 'base-theme-opts', 'my-custom-logo' );
	register_setting( 'base-theme-opts', 'my-custom-logo-white' );
	register_setting( 'base-theme-opts', 'my-favicon' );
	register_setting( 'base-theme-opts', 'my-banner' );
	register_setting('base-theme-opts', 'socialurls');
	
}

function base_theme_info_page() {
if ( $_REQUEST['updated'] ) { ?>
	<div id="message" class="updated">
		<p>Settings saved</p>
	</div>
<?php } ?>

<h1>Base theme options pages</h1>
<p>Thème par <a href="https://arthur-and-ashes.com/" target="_blank">Arthur d'Hausen</a>.</p>

<div class="wrap">
<div id="icon-edit" class="icon32"></div>

<script>
jQuery(document).ready(function($) {
    $( "#tabs" ).tabs();
  } );
</script>

<style>
	.ui-tabs .ui-tabs-nav li {
		display:inline-flex;
		padding: 10px 2%;
		font-size: 20px;
		border-bottom: 1px solid #DDD;
	}
	.ui-tabs .ui-tabs-nav li.ui-tabs-active {
		padding-bottom: 10px;
		background-color: white;
	}
	table.widefat {
		background: #fff;
		margin-bottom: 15px;
	}
	img.preview {
		max-height: 50px;
	}
</style>

<div id="tabs">
<ul>
 	<li><a href="#tabs-1">Global settings</a></li>
	<!--- <li><a href="#tabs-2">Other settings</a></li> -->
</ul>

<div id="tabs-1">
	<form method="post" action="options.php" class="widefat">
		<?php settings_fields( 'base-theme-opts' ); ?>

		<table class="widefat">
			<thead>
				<tr><th>Style</th></tr>
			</thead>
			<tbody>
				<tr>
					<td>
						<label for="font-select">Police d'écriture de tous les textes et paragraphes</label>
						<select name="font-select" id="fontselect">
					<option  value="Hind">-- Sélectionner la police (Montserrat par défaut) --</option>
					<option <?php selected(get_option('font-select'), 'Montserrat'); ?> value="Montserrat">Montserrat</option>
					<option <?php selected(get_option('font-select'), 'Valera'); ?> value="Valera">Valera</option>
					<option <?php selected(get_option('font-select'), 'Raleway'); ?> value="Raleway">Raleway</option>
					<option <?php selected(get_option('font-select'), 'Baloo2'); ?> value="Baloo2">Baloo2</option>
					<option <?php selected(get_option('font-select'), 'Caveat'); ?> value="Caveat">Caveat</option>
					<option <?php selected(get_option('font-select'), 'MarckScript'); ?> value="MarckScript">MarckScript</option>
					<option <?php selected(get_option('font-select'), 'MPLUSRounded1c'); ?> value="MPLUSRounded1c">MPLUSRounded1c</option>
					<option <?php selected(get_option('font-select'), 'Nunito'); ?> value="Nunito">Nunito</option>
					<option <?php selected(get_option('font-select'), 'Oxygen'); ?> value="Oxygen">Oxygen</option>
					<option <?php selected(get_option('font-select'), 'PoiretOne'); ?> value="PoiretOne">PoiretOne</option>
					<option <?php selected(get_option('font-select'), 'Quicksand'); ?> value="Quicksand">Quicksand</option>
					<option <?php selected(get_option('font-select'), 'Spartan'); ?> value="Spartan">Spartan</option>
					<option <?php selected(get_option('font-select'), 'SpecialElite'); ?> value="SpecialElite">SpecialElite</option>
					<option <?php selected(get_option('font-select'), 'Maven Pro'); ?> value="Maven Pro">Maven Pro</option>
						</select><br>

						<label for="titlefont-select">Police d'écriture pour tous les titres</label>
						<select name="titlefont-select" id="titlefont-select">
		<option value="Hind">-- Sélectionner la police (Montserrat par défaut) --</option>
		<option <?php selected(get_option('titlefont-select'), 'Montserrat'); ?> value="Montserrat">Montserrat</option>
		<option <?php selected(get_option('titlefont-select'), 'Valera'); ?> value="Valera">Valera</option>
		<option <?php selected(get_option('titlefont-select'), 'Baloo2'); ?> value="Baloo2">Baloo2</option>
		<option <?php selected(get_option('titlefont-select'), 'Caveat'); ?> value="Caveat">Caveat</option>
		<option <?php selected(get_option('titlefont-select'), 'MarckScript'); ?> value="MarckScript">MarckScript</option>
		<option <?php selected(get_option('titlefont-select'), 'MPLUSRounded1c'); ?> value="MPLUSRounded1c">MPLUSRounded1c</option>
		<option <?php selected(get_option('titlefont-select'), 'Nunito'); ?> value="Nunito">Nunito</option>
		<option <?php selected(get_option('titlefont-select'), 'Oxygen'); ?> value="Oxygen">Oxygen</option>
		<option <?php selected(get_option('titlefont-select'), 'PoiretOne'); ?> value="PoiretOne">PoiretOne</option>
		<option <?php selected(get_option('titlefont-select'), 'Quicksand'); ?> value="Quicksand">Quicksand</option>
		<option <?php selected(get_option('titlefont-select'), 'Spartan'); ?> value="Spartan">Spartan</option>
		<option <?php selected(get_option('titlefont-select'), 'SpecialElite'); ?> value="SpecialElite">SpecialElite</option>
		<option <?php selected(get_option('titlefont-select'), 'Maven Pro'); ?> value="Maven Pro">Maven Pro</option>
							</select><br>
						</td>
					</tr>
				</tbody>
			</table>

		<table class="widefat">
			<thead>
				<tr><th>Header & menu</th></tr>
			</thead>
			<tbody>
				<tr>
					
			<td>
				<?php wp_enqueue_media(); 
	if(null !== get_option('my-custom-logo') && get_option('my-custom-logo') !== '') { ?>
				<div class='image-preview-wrapper'>
					<img class='preview' src='<?php echo get_option('my-custom-logo');?>' height='42px' />
				</div>
				<?php } ?>

				<label for="logo-url">Sélectionner un logo :</label>
				<input id="logo-url" type="text" name="my-custom-logo" value="<?php echo get_option('my-custom-logo');?>" />
				<input id="upload-logo" type="button" class="button" value="Charger un logo (100 à 200 px de largeur max.)" />
				<br><br>
				
				<?php wp_enqueue_media(); 
	if(null !== get_option('my-custom-logo-white') && get_option('my-custom-logo-white') !== '') { ?>
				<div class='image-preview-wrapper'>
					<img class='preview' src='<?php echo get_option('my-custom-logo-white');?>' height='42px' />
				</div>
				<?php } ?>

				<label for="logo-url-white">Sélectionner un logo :</label>
				<input id="logo-url-white" type="text" name="my-custom-logo-white" value="<?php echo get_option('my-custom-logo-white');?>" />
				<input id="upload-logo-white" type="button" class="button" value="Charger un logo blanc (100 à 200 px de largeur max.)" />
				<br><br>

				<?php wp_enqueue_media(); 
				if(null !== get_option('my-favicon') && get_option('my-favicon') !== '') { ?>
					<div class='image-preview-wrapper'>
						<img id='favicon-preview' class='preview' src='<?php echo get_option('my-favicon');?>' height='32px' />
					</div>
					<?php } ?>

				<label for="favicon-url">Sélectionner un favicon (32 à 64px maximum) :</label>
				<input id="favicon-url" type="text" name="my-favicon" value="<?php echo get_option('my-favicon');?>" />
				<input id="upload-favicon" type="button" class="button" value="Charger un favicon" />
				<br><br>

				<?php wp_enqueue_media(); 
				if(null !== get_option('my-banner') && get_option('my-banner') !== '') { ?>
					<div class='image-preview-wrapper'>
						<img id='banner-preview' class='preview' src='<?php echo get_option('my-banner');?>' height='42px' >
					</div>
				<?php } ?>

						<label for="banner-url">Sélectionner une bannière par défaut :</label>
						<input id="banner-url" type="text" name="my-banner" value="<?php echo get_option('my-banner');?>" />
						<input id="upload-banner" type="button" class="button" value="Charger une bannière" /><br><br>

					</td>
				</tr>
			</tbody>
		</table>


			<table class="widefat">
				<thead>
					<tr><th>Social network</th></tr>
				</thead>
				<tbody>
					<tr><td>
						<?php  $socialicons = get_option( 'socialurls' ); ?>
						<label for="base-twitter">Lien du compte twitter</label>
						<input type="url" name="socialurls[twitter]" value="<?php echo $socialicons['twitter']; ?>"><br>
						<label for="base-twitter">Lien du compte linkedin</label>
						<input type="url" name="socialurls[linkedin]" value="<?php echo $socialicons['linkedin']; ?>"><br>
						<label for="base-linkedin">Lien du compte facebook</label>
						<input type="url" name="socialurls[facebook]" value="<?php echo $socialicons['facebook']; ?>"><br>
						<label for="base-insta">Lien du compte instagram</label>
						<input type="url" name="socialurls[instagram]" value="<?php echo $socialicons['instagram']; ?>"><br>
						</td></tr>
				</tbody>
			</table>

			<?php submit_button(); ?>
		</form>

	</div>
	
	<div id="tabs-2">
		<p></p>
	</div>

</div>
	
<script type='text/javascript'>
jQuery(document).ready(function($){
  var mediaUploader;
  	$('#upload-logo').click(function(e) {
    	e.preventDefault();
      	if (mediaUploader) { mediaUploader.open(); return; }
		mediaUploader = wp.media.frames.file_frame = wp.media({
			title: 'Sélectionner une image',
			button: { text: 'Sélectionner une image'},
			multiple: false });

		mediaUploader.on('select', function() {
			attachment = mediaUploader.state().get('selection').first().toJSON();
			$('#logo-url').val(attachment.url);
		});
    	mediaUploader.open();
  	});
});
	
jQuery(document).ready(function($){
  var mediaUploader;
  	$('#upload-logo-white').click(function(e) {
    	e.preventDefault();
      	if (mediaUploader) { mediaUploader.open(); return; }
		mediaUploader = wp.media.frames.file_frame = wp.media({
			title: 'Sélectionner une image',
			button: { text: 'Sélectionner une image'},
			multiple: false });

		mediaUploader.on('select', function() {
			attachment = mediaUploader.state().get('selection').first().toJSON();
			$('#logo-url-white').val(attachment.url);
		});
    	mediaUploader.open();
  	});
});

jQuery(document).ready(function($){
  var mediaUploader;
	$('#upload-favicon').click(function(e) {
    	e.preventDefault();
      	if (mediaUploader) { mediaUploader.open(); return; }
		mediaUploader = wp.media.frames.file_frame = wp.media({
			title: 'Sélectionner une image',
			button: { text: 'Sélectionner une image'},
			multiple: false });

		mediaUploader.on('select', function() {
			attachment = mediaUploader.state().get('selection').first().toJSON();
			$('#favicon-url').val(attachment.url);
		});
    	mediaUploader.open();
  	});
});

jQuery(document).ready(function($){
  var mediaUploader;
	$('#upload-banner').click(function(e) {
    	e.preventDefault();
      	if (mediaUploader) { mediaUploader.open(); return; }
		mediaUploader = wp.media.frames.file_frame = wp.media({
			title: 'Sélectionner une image',
			button: { text: 'Sélectionner une image'},
			multiple: false });

		mediaUploader.on('select', function() {
			attachment = mediaUploader.state().get('selection').first().toJSON();
			$('#banner-url').val(attachment.url);
		});
    	mediaUploader.open();
  	});
});
	</script>	
	
<?php } 
	
function mycustomthemestyle(){ ?>
	<style>
		@font-face {
			font-family: "Montserrat";
			src: url("<?php echo get_template_directory_uri(); ?>/assets/fonts/Montserrat-Regular.ttf") format("truetype");
		}
		@font-face {
			font-family: "Maven Pro";
			src: url("<?php echo get_template_directory_uri(); ?>/assets/fonts/MavenPro-VariableFont_wght.ttf") format("truetype");
		}
		@font-face {
			font-family: "Baloo2";
			src: url("<?php echo get_template_directory_uri(); ?>/assets/fonts/Baloo2-Regular.ttf") format("truetype");
		}
		@font-face {
			font-family: "Caveat";
			src: url("<?php echo get_template_directory_uri(); ?>/assets/fonts/Caveat-Regular.ttf") format("truetype");
		}
		@font-face {
			font-family: "MarckScript";
			src: url("<?php echo get_template_directory_uri(); ?>/assets/fonts/MarckScript-Regular.ttf");
		}
		@font-face {
			font-family: "MPLUSRounded1c";
			src: url("<?php echo get_template_directory_uri(); ?>/assets/fonts/MPLUSRounded1c-Regular.ttf");
		}
		@font-face {
			font-family: "Nunito";
			src: url("<?php echo get_template_directory_uri(); ?>/assets/fonts/Nunito-Regular.ttf");
		}
		@font-face {
			font-family: "Oxygen";
			src: url("<?php echo get_template_directory_uri(); ?>/assets/fonts/Oxygen-Regular.ttf");
		}
		@font-face {
			font-family: "PoiretOne";
			src: url("<?php echo get_template_directory_uri(); ?>/assets/fonts/PoiretOne-Regular.ttf");
		}
		@font-face {
			font-family: "Quicksand";
			src: url("<?php echo get_template_directory_uri(); ?>/assets/fonts/Quicksand-VariableFont_wght.ttf");
		}
		@font-face {
			font-family: "Spartan";
			src: url("<?php echo get_template_directory_uri(); ?>/assets/fonts/Spartan-VariableFont_wght.ttf");
		}
		@font-face {
			font-family: "SpecialElite";
			src: url("<?php echo get_template_directory_uri(); ?>/fonts/SpecialElite-Regular.ttf");
		}
		 @font-face {
			font-family: "Valera";
			src: url("<?php echo get_template_directory_uri(); ?>/assets/fonts/Varela-Regular.ttf");
		}
		@font-face {
			font-family: "Raleway";
			src: url("<?php echo get_template_directory_uri(); ?>/assets/fonts/Raleway-Regular.ttf") format("truetype");
		}

		@font-face {
			font-family: "Playlist";
			src: url("<?php echo get_template_directory_uri(); ?>/assets/fonts/playlist.otf") format("truetype");
		}

		@font-face {
			font-family: "Josefin";
			src: url("<?php echo get_template_directory_uri(); ?>/assets/fonts/JosefinSans-Regular.ttf") format("truetype");
		}

		@font-face {
			font-family: "Architects";
			src: url("<?php echo get_template_directory_uri(); ?>/assets/fonts/ArchitectsDaughter-Regular.ttf") format("truetype"); 
		}
		@font-face {
			font-style: normal;
			font-weight: normal;
			font-family: "fontawesome-regular";
			src: url("<?php echo get_template_directory_uri(); ?>/assets/fonts/fa-regular-400.woff2") format("woff2");
		}
		@font-face {
			font-style: normal;
			font-weight: normal;
			font-family: "fontawesome-solid";
			src: url("<?php echo get_template_directory_uri(); ?>/assets/fonts/fa-solid-900.woff2") format("woff2");
		}
		@font-face {
			font-style: normal;
			font-weight: normal;
			font-family: "fontawesome-brand";
			src: url("<?php echo get_template_directory_uri(); ?>/assets/fonts/fa-brands-400.woff2") format("woff2");
		}
		body,button,input,select,textarea {font-family:<?php echo get_option('font-select'); ?>; }
		h2, h3, h4, h5, h6 {font-family:<?php echo get_option('titlefont-select'); ?>; }
		.mainbanner, .over-page { background-image: url("<?php echo get_option('my-banner'); ?>"); }
	</style>
<?php };
add_action('wp_head', 'mycustomthemestyle'); 


function new_social_icons_output() {
	if ( ! empty( $output_socialicons = get_option('socialurls') ) ) {
		echo '<ul class="my-social-menu">';
		foreach ( $output_socialicons as  $socialkey => $social_url ) { 
			if ($social_url != '') {?>
		 	<li>
				<a class="<?php echo esc_attr( $socialkey ); ?>" target="_blank" href="<?php echo $social_url; ?>">
					<i class="<?php echo 'fa fa-'.$socialkey; ?>" title="<?php echo esc_attr( $socialkey ); ?>"></i>
				</a>
			</li>
			<?php } 
		}
		echo "</ul>";
	}
}	?>