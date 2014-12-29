<?php
require_once ( ABSPATH . 'wp-admin/includes/image.php' );
require_once('font-awesome-functions.php');
require_once('install-plugins.php'); 
require_once('installation.php');
require_once('picture-menu.php');

if ( !class_exists( 'ReduxFramework' ) && file_exists( dirname( __FILE__ ) . '/redux-framework/ReduxCore/framework.php' ) ) {
	require_once( dirname( __FILE__ ) . '/redux-framework/ReduxCore/framework.php' );
}
if ( !isset( $entiri_opt ) && file_exists( dirname( __FILE__ ) . '/redux-framework/config/config.php' ) ) {
	require_once( dirname( __FILE__ ) . '/redux-framework/config/config.php' );
}

if ( function_exists( 'vc_map' ) ) {
	require_once('visual-composer-functions.php');
}

if(function_exists('vc_set_as_theme')) vc_set_as_theme();

/**
 * vow functions and definitions.
 *
 * Sets up the theme and provides some helper functions, which are used
 * in the theme as custom template tags. Others are attached to action and
 * filter hooks in WordPress to change core functionality.
 *
 * When using a child theme (see http://codex.wordpress.org/Theme_Development and
 * http://codex.wordpress.org/Child_Themes), you can override certain functions
 * (those wrapped in a function_exists() call) by defining them first in your child theme's
 * functions.php file. The child theme's functions.php file is included before the parent
 * theme's file, so the child theme functions would be used.
 *
 * Functions that are not pluggable (not wrapped in function_exists()) are instead attached
 * to a filter or action hook.
 *
 * For more information on hooks, actions, and filters, see http://codex.wordpress.org/Plugin_API.
 *
 * @package WordPress
 * @subpackage vow
 * @since vow 1.0
 */

/**
 * Sets up the content width value based on the theme's design and stylesheet.
 */
if ( ! isset( $content_width ) )
	$content_width = 625;





function vow_setup() {
	
	load_theme_textdomain( 'vow', get_template_directory() . '/languages' );

	// This theme styles the visual editor with editor-style.css to match the theme style.
	add_editor_style();

	// Adds RSS feed links to <head> for posts and comments.
	add_theme_support( 'automatic-feed-links' );


	// This theme uses wp_nav_menu() in one location.
	register_nav_menu( 'primary', __( 'Primary Menu', 'vow' ) );

	// This theme supports a variety of post formats.
	add_theme_support( 'post-formats', array( 'video', 'image', 'quote', 'gallery' ) );


	// This theme uses a custom image size for featured images, displayed on "standard" posts.
	add_theme_support( 'post-thumbnails' );
	set_post_thumbnail_size( 200, 200, true ); // Unlimited height, soft crop
	add_image_size( "home-slider", 300,200, true ); 
	add_image_size( "circle-gallery", 360,360, true );
	add_image_size( "gallery-big", 960,640, true ); 
	add_image_size( "gallery", 480,320, true );   
	add_image_size( "slider-thumb", 240,160, true ); 
	add_image_size( "listing", 1140,516, true );  
	add_image_size( "logo", 200,140, false );   
	add_image_size( "logo-thumb", 150,140, false );
	add_image_size( "recent-news", 800,533, true );

}
add_action( 'after_setup_theme', 'vow_setup' );

add_action( 'init', 'post_type_settings' );

function post_type_settings() {
	register_post_type( 'slider',
			array(
				'labels' => array(
					'name' => __( 'Slider', 'decoy' ),
					'singular_name' => __( 'Slider', 'decoy' )
				),
			'public' => true,
			'has_archive' => true,
			'taxonomies' => array('category', 'post_tag'),
			'rewrite' => array('slug' => 'slider')
			)
		);
	add_post_type_support('slider', 'thumbnail');
	add_post_type_support( 'slider', 'categories');
	
	register_nav_menu('main',__( 'Main' ));

}

//add_action('admin_head', 'my_add_tinymce');
/* 
function my_add_tinymce() {
	// global $typenow;
	// if(!in_array($typenow,array('post','page')))
	// 	return ;
	add_filter('mce_external_plugins', 'my_add_tinymce_plugin');
	add_filter('mce_buttons', 'my_add_tinymce_button');
}
 
function my_add_tinymce_plugin($plugin_array) {
	$plugin_array['shortcode'] =	get_template_directory_uri().'/js/shortcode-generator.js';
 
	return $plugin_array;
}
 
function my_add_tinymce_button($buttons) {
	array_push($buttons, 'shortcode');
	return $buttons;
}
*/
function vow_admin_style() {
    global $post_type;
    wp_enqueue_style( 'vow-admin-style', get_stylesheet_directory_uri() . '/css/admin.css' );
    wp_enqueue_style( 'font-awesome', get_template_directory_uri().'/css/font-awesome.min.css' );
    wp_enqueue_style( 'fancybox', get_template_directory_uri().'/css/jquery.fancybox.css' );
    wp_enqueue_script( 'fancybox', get_template_directory_uri() . '/js/jquery.fancybox.pack.js', $deps = array('jquery'), '', false );
    wp_enqueue_script( 'admin-functions', get_template_directory_uri() . '/js/admin-functions.js', $deps = array('jquery'), '', false );

    $subset = _x( 'no-subset', 'Open Sans font: add new subset (greek, cyrillic, vietnamese)', 'vow' );

    $subsets = '';
	if ( 'cyrillic' == $subset )
		$subsets .= ',cyrillic,cyrillic-ext';
	elseif ( 'greek' == $subset )
		$subsets .= ',greek,greek-ext';
	elseif ( 'vietnamese' == $subset )
		$subsets .= ',vietnamese';

	$protocol = is_ssl() ? 'https' : 'http';
	$query_args = array(
		'family' => 'Open+Sans:300,300italic,700italic,400,600,700',
		'subset' => $subsets,
	);
	wp_enqueue_style( 'vow-fonts', add_query_arg( $query_args, "$protocol://fonts.googleapis.com/css" ), array(), null );
}

add_action( 'admin_enqueue_scripts', 'vow_admin_style', 11 );

function custom_style() { 
	global $entiri_opt;
	if(isset($entiri_opt)) {
	?>
		<style type="text/css" class="theme-generated-style">
			body {
				<?php if(isset($entiri_opt['color-background'])) { ?>
					background-color: <?php echo $entiri_opt['color-background']; ?>; 
				<?php } ?>
				<?php
				if(isset($entiri_opt['body-font'])) { ?>
					font-family: <?php echo $entiri_opt['body-font']['font-family']; ?>;
  					font-size: <?php echo $entiri_opt['body-font']['font-size']; ?>;
  					line-height: <?php echo $entiri_opt['body-font']['line-height']; ?>;
  					color: <?php echo $entiri_opt['body-font']['color']; ?>;
				<?php
				}
				?>
			}
			<?php
				if(isset($entiri_opt['body-font'])) { ?>
					p {
						font-family: <?php echo $entiri_opt['body-font']['font-family']; ?>;
  						font-size: <?php echo $entiri_opt['body-font']['font-size']; ?>;
  						line-height: <?php echo $entiri_opt['body-font']['line-height']; ?>;
  						color: <?php echo $entiri_opt['body-font']['color']; ?>;
  					}
				<?php
				}
				?>
			<?php 
			for ($i = 1;$i < 7;$i++) {
				if(isset($entiri_opt['h'.$i.'-font'])) { ?>
					h<?php echo $i; ?>, h<?php echo $i; ?> a {
						font-family: <?php echo $entiri_opt['h'.$i.'-font']['font-family']; ?>;
						font-size: <?php echo $entiri_opt['h'.$i.'-font']['font-size']; ?>;
						font-weight: <?php echo $entiri_opt['h'.$i.'-font']['font-weight']; ?>;
						line-height: <?php echo $entiri_opt['h'.$i.'-font']['line-height']; ?>;
					}
			<?php 

				} 
			} ?>
			.circle h2, .circle-2 h2 {
				font-family: <?php echo $entiri_opt['header-circle-font']['font-family']; ?>;
			}


		</style>
	<?php
	}
}

function copy_and_attach($file,$mime_type) {
	$uploads = wp_upload_dir();
	copy(get_template_directory_uri().'/'.$file, $uploads['path'].'/'.basename($file));
	$url = $uploads['url'].'/'.basename($file);
	$attachment = array(
        'post_mime_type' => $mime_type,
        'post_title' => basename($file),
        'post_content' => '',
        'post_status' => 'published',
        'guid' => $url
    );
    $attach_id = wp_insert_attachment($attachment, $uploads['path'].'/'.basename($file));
    $attach_data = wp_generate_attachment_metadata( $attach_id, $uploads['path'].'/'.basename($file) );
	wp_update_attachment_metadata( $attach_id,  $attach_data );
	
	return array('url' => $url , 'id' => $attach_id );
	
}

function vow_scripts_styles() {
	global $wp_styles;
	global $entiri_opt;

	/*
	 * Adds JavaScript to pages with the comment form to support
	 * sites with threaded comments (when in use).
	 */
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) )
		wp_enqueue_script( 'comment-reply' );

	/*
	 * Adds JavaScript for handling the navigation menu hide-and-show behavior.
	 */
	
	wp_enqueue_script( 'jquery', $in_footer = true );
	wp_enqueue_script( 'modernizr', get_template_directory_uri() . '/js/modernizr.js',array(), '', false );
	wp_enqueue_script( 'bootstrap', get_template_directory_uri() . '/js/bootstrap.min.js',array(), '', true );
	wp_enqueue_script( 'fittext', get_template_directory_uri() . '/js/fittext.js', $deps = array('jquery'), '', true );
	wp_enqueue_script( 'fitwids', get_template_directory_uri() . '/js/jquery.fitvids.js', $deps = array('jquery'), '', true );
	wp_enqueue_script( 'owl-carousel', get_template_directory_uri() . '/js/owl.carousel.min.js', $deps = array('jquery'), '', true );
	wp_enqueue_script( 'retina', get_template_directory_uri() . '/js/retina.js', $deps = array('jquery'), '', true );
	wp_enqueue_script( 'appear', get_template_directory_uri() . '/js/jquery.appear.js', $deps = array('jquery'), '', true );
	wp_enqueue_script( 'flexslider', get_template_directory_uri() . '/js/jquery.flexslider.js', $deps = array('jquery'), '', true );
	wp_enqueue_script( 'YTPlayer', get_template_directory_uri() . '/js/jquery.mb.YTPlayer.js', $deps = array('jquery'), '', true );
	wp_enqueue_script( 'nav', get_template_directory_uri() . '/js/jquery.nav.js', $deps = array('jquery'), '', true );
	wp_enqueue_script( 'parallax', get_template_directory_uri() . '/js/jquery.parallax-1.1.3.js', $deps = array('jquery'), '', true );
	wp_enqueue_script( 'prettyphoto', get_template_directory_uri() . '/js/jquery.prettyPhoto.js', $deps = array('jquery'), '', true );
	wp_enqueue_script( 'scrollto', get_template_directory_uri() . '/js/jquery.scrollTo.js', $deps = array('jquery'), '', true );
	wp_enqueue_script( 'sticky', get_template_directory_uri() . '/js/jquery.sticky.js', $deps = array('jquery'), '', true );

	
	wp_enqueue_script( 'functions', get_template_directory_uri() . '/js/functions.js', array('jquery'), '', true );
	
	/*
	 * Loads our special font CSS file.
	 *
	 * The use of Open Sans by default is localized. For languages that use
	 * characters not supported by the font, the font can be disabled.
	 *
	 * To disable in a child theme, use wp_dequeue_style()
	 * function mytheme_dequeue_fonts() {
	 *     wp_dequeue_style( 'vow-fonts' );
	 * }
	 * add_action( 'wp_enqueue_scripts', 'mytheme_dequeue_fonts', 11 );
	 */

	/* translators: If there are characters in your language that are not supported
	   by Open Sans, translate this to 'off'. Do not translate into your own language. */
	if ( 'off' !== _x( 'on', 'Open Sans font: on or off', 'vow' ) ) {
		$subsets = 'latin,latin-ext';

		/* translators: To add an additional Open Sans character subset specific to your language, translate
		   this to 'greek', 'cyrillic' or 'vietnamese'. Do not translate into your own language. */
		$subset = _x( 'no-subset', 'Open Sans font: add new subset (greek, cyrillic, vietnamese)', 'vow' );

		if ( 'cyrillic' == $subset )
			$subsets .= ',cyrillic,cyrillic-ext';
		elseif ( 'greek' == $subset )
			$subsets .= ',greek,greek-ext';
		elseif ( 'vietnamese' == $subset )
			$subsets .= ',vietnamese';

		$protocol = is_ssl() ? 'https' : 'http';
		$query_args = array(
			'family' => 'Open+Sans:400,700,400italic,700italic',
			'subset' => $subsets,
		);
		wp_enqueue_style( 'vow-fonts', add_query_arg( $query_args, "$protocol://fonts.googleapis.com/css" ), array(), null );
	}

	/*
	 * Loads our main stylesheet.
	 */
	wp_enqueue_style( 'bootstrap', get_template_directory_uri().'/css/bootstrap.min.css' );
	wp_enqueue_style( 'flexslider', get_template_directory_uri().'/css/flexslider.css' );
	wp_enqueue_style( 'owl-carousel', get_template_directory_uri().'/css/owl.carousel.css' );
	
	wp_enqueue_style( 'animate', get_template_directory_uri().'/css/animate.css' );
	wp_enqueue_style( 'prettyphoto', get_template_directory_uri().'/css/prettyPhoto.css' );
	wp_enqueue_style( 'ytplayer', get_template_directory_uri().'/css/YTPlayer.css' );
	wp_enqueue_style( 'font-awesome', get_template_directory_uri().'/css/font-awesome.min.css' );
	wp_enqueue_style( 'wpb_reset', get_template_directory_uri().'/css/wpb_reset.css' );
	wp_enqueue_style( 'components', get_template_directory_uri().'/css/components.css' );

	wp_enqueue_style( 'vow-style', get_stylesheet_uri() );

	wp_enqueue_style( 'vow-color', get_template_directory_uri().'/css/color/'.$entiri_opt['layout-color'].'.css' );
	
	wp_enqueue_style( 'bootstrap-override', get_template_directory_uri().'/css/bootstrap.override.css', $deps = array('vow-style') );
	

	/*
	 * Loads the Internet Explorer specific stylesheet.
	 */
	wp_enqueue_style( 'vow-ie', get_template_directory_uri() . '/css/ie.css', array( 'vow-style' ), '20121010' );
	$wp_styles->add_data( 'vow-ie', 'conditional', 'lt IE 9' );
	/*
	* Scripts
	*/
	

}
add_action( 'wp_enqueue_scripts', 'vow_scripts_styles' );


/*
add_action('admin_head', 'my_add_tinymce');

function my_add_tinymce() {
	// global $typenow;
	// if(!in_array($typenow,array('post','page')))
	// 	return ;
	add_filter('mce_external_plugins', 'my_add_tinymce_plugin');
	add_filter('mce_buttons', 'my_add_tinymce_button');
}
 
function my_add_tinymce_plugin($plugin_array) {
	$plugin_array['shortcode'] =	get_template_directory_uri().'/js/shortcode-generator.js';
 
	return $plugin_array;
}
 
function my_add_tinymce_button($buttons) {
	array_push($buttons, 'shortcode');
	return $buttons;
}
*/
function vow_wp_title( $title, $sep ) {
	global $paged, $page;

	if ( is_feed() )
		return $title;

	// Add the site name.
	$title .= get_bloginfo( 'name' );

	// Add the site description for the home/front page.
	$site_description = get_bloginfo( 'description', 'display' );
	if ( $site_description && ( is_home() || is_front_page() ) )
		$title = "$title $sep $site_description";

	// Add a page number if necessary.
	if ( $paged >= 2 || $page >= 2 )
		$title = "$title $sep " . sprintf( __( 'Page %s', 'vow' ), max( $paged, $page ) );

	return $title;
}
add_filter( 'wp_title', 'vow_wp_title', 10, 2 );

/**
 * Makes our wp_nav_menu() fallback -- wp_page_menu() -- show a home link.
*/ 
function vow_page_menu_args( $args ) {
	if ( ! isset( $args['show_home'] ) )
		$args['show_home'] = true;
	return $args;
}
add_filter( 'wp_page_menu_args', 'vow_page_menu_args' );

/**
 * Registers our main widget area and the front page widget areas.
 */
function vow_widgets_init() {
	register_sidebar( array(
		'name' => __( 'Main Sidebar', 'vow' ),
		'id' => 'sidebar-1',
		'description' => __( 'Appears on posts and pages except the optional Front Page template, which has its own widgets', 'vow' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => '</aside>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );

}
add_action( 'widgets_init', 'vow_widgets_init' );

if ( ! function_exists( 'vow_content_nav' ) ) :
/**
 * Displays navigation to next/previous pages when applicable.
 */
function vow_content_nav( $html_id ) {
	global $wp_query;

	$html_id = esc_attr( $html_id );

	if ( $wp_query->max_num_pages > 1 ) { ?>
		<div class="row">
	      <div class="span12 center">
	        <div class="pagination">
	          <ul>
	          	<li><?php next_posts_link( __( '<span class="meta-nav">&larr;</span> Older posts', 'vow' ) ); ?></li>
	          	<li><?php previous_posts_link( __( 'Newer posts <span class="meta-nav">&rarr;</span>', 'vow' ) ); ?></li>
	          </ul>
	        </div>
	      </div>
	    </div>
	<?php } else { ?>
		<div class="row spacer50"></div>
	<?php
	}
}
endif;


remove_shortcode('gallery');

function vow_gallery_shortcode($atts) {
	$temp = $atts['ids'];
	if (!isset($temp)) return '';
	$ids = explode(',', $temp);
	$html = '<div class="center-nav-content-slider">
		            <ul class="slides"> ';
	foreach ($ids as $id) {
		$html .= '<li>';
		$html .= wp_get_attachment_image( $id, 'gallery-big' );
		$html .= '</li>';
	}
	$html .= '</ul>
		     </div>';
	return $html;
}
add_shortcode('gallery', 'vow_gallery_shortcode');


function vow_show_category_links($id_post) {
	$post_categories = wp_get_post_categories( $id_post );	
    $categories = '';
    $i = 0;
	foreach($post_categories as $c){
		$i++;
		$cat = get_category( $c );
		$url = get_category_link( $c );
		if($i != count($post_categories)) {
			$categories .= '<a href="'.$url.'">'.$cat->name.'</a> / ';
		}
		else {
			$categories .= '<a href="'.$url.'">'.$cat->name.'</a>';
		}
	}
	return $categories;
}

if ( ! function_exists( 'vow_list_gallery_categories' ) ) :

function vow_list_gallery_categories() {

	$categories = get_categories( array('hide_empty' => false) );
	foreach ($categories as $category) { ?>
		<option value="<?php echo $category->term_id; ?>" <?php if($current==$category->term_id) echo 'selected="selected"'; ?>>
        	<?php echo $category->name; ?>
        </option>	
		<?php
	}
		
}

endif;



function header_social_icons_display() { 
	global $entiri_opt;
	ob_start(); 
	if (isset($entiri_opt['social-networks'])) {
		foreach ($entiri_opt['social-networks'] as $key => $value) {
			if($value!='') {
			?>
				<a href="<?php echo $value; ?>" target="_blank"><i class="fa <?php echo $key; ?>"></i></a>
				<span class="social-header-divider">&nbsp;|&nbsp;</span>
			<?php
			}
		}
	}
	$output_string = ob_get_contents();
	ob_end_clean();
	return $output_string;
	
}

function vow_social_icons_display() { 
	global $entiri_opt;
	ob_start(); 
	if (isset($entiri_opt['social-networks'])) {
		foreach ($entiri_opt['social-networks'] as $key => $value) {
			if($value!='') {
			?>
				<a href="<?php echo $value; ?>" class="social-icon-main"><i class="fa <?php echo $key; ?>"></i></a>
				<span class="divider-social"></span>
			<?php
			}
		}
	}
	$output_string = ob_get_contents();
	ob_end_clean();
	return $output_string;
	
}

add_shortcode('vow_social_icons', 'vow_social_icons_display');


if ( ! function_exists( 'get_attachment_id_from_src' ) ) :

function get_attachment_id_from_src ($image_src) {

	global $wpdb;
	$query = "SELECT ID FROM {$wpdb->posts} WHERE guid='$image_src'";
	$id = $wpdb->get_var($query);
	return $id; 
	    
}

endif;


function vow_video() {
	global $post;
	$link = get_post_meta($post->ID, 'vow_vimeo_link', true);
	$id = explode('/', $link);

	return '<iframe class="video-content" src="http://player.vimeo.com/video/'.$id[3].'?title=0&amp;byline=0&amp;portrait=0" ></iframe>';
}



if ( ! function_exists( 'vow_comment' ) ) :
/**
 * Template for comments and pingbacks.
 *
 * To override this walker in a child theme without modifying the comments template
 * simply create your own vow_comment(), and that function will be used instead.
 *
 * Used as a callback by wp_list_comments() for displaying the comments.
 */
function vow_comment( $comment, $args, $depth ) {
	$GLOBALS['comment'] = $comment;
	switch ( $comment->comment_type ) :
		case 'pingback' :
		case 'trackback' :
		// Display trackbacks differently than normal comments.
	?>
	<div class="blog-comment" id="comment-<?php comment_ID(); ?>">
		<p><?php _e( 'Pingback:', 'vow' ); ?> <?php comment_author_link(); ?> <?php edit_comment_link( __( '(Edit)', 'vow' ), '<span class="edit-link">', '</span>' ); ?></p>
	<?php
			break;
		default :
		// Proceed with normal comments.
		global $post;
	?>
	
		<div class="blog-comment" id="comment-<?php comment_ID(); ?>">
			<div class="blog-comment-icon">
				<i class="fa fa-user"></i>
			</div>

			<div class="blog-comment-heading-text">
				<h6>
					<?php echo get_comment_author_link(); ?>
					<?php 
					printf( '<a href="%1$s"><time datetime="%2$s">%3$s</time></a>',
						esc_url( get_comment_link( $comment->comment_ID ) ),
						get_comment_time( 'c' ),
						/* translators: 1: date, 2: time */
						sprintf( __( '%1$s at %2$s', 'vow' ), get_comment_date(), get_comment_time() )
					);
					?> | 
					<?php comment_reply_link( array_merge( $args, array( 'reply_text' => 'Reply', 'after' => '', 'depth' => $depth, 'max_depth' => $args['max_depth'] ) ) ); ?>
				</h6>
			</div>
			<div class="blog-comment-text">
				<?php comment_text(); ?>
			</div>
			<?php edit_comment_link( __( 'Edit', 'vow' ), '<p class="edit-link">', '</p>' ); ?>
	        
		
	<?php
		break;
	endswitch; // end comment_type check
}
endif;

if ( ! function_exists( 'vow_entry_meta' ) ) :
/**
 * Prints HTML with meta information for current post: categories, tags, permalink, author, and date.
 *
 * Create your own vow_entry_meta() to override in a child theme.
 */
function vow_entry_meta() {
	// Translators: used between list items, there is a space after the comma.
	$categories_list = get_the_category_list( __( ', ', 'vow' ) );

	// Translators: used between list items, there is a space after the comma.
	$tag_list = get_the_tag_list( '', __( ', ', 'vow' ) );

	$date = sprintf( '<a href="%1$s" title="%2$s" rel="bookmark"><time class="entry-date" datetime="%3$s">%4$s</time></a>',
		esc_url( get_permalink() ),
		esc_attr( get_the_time() ),
		esc_attr( get_the_date( 'c' ) ),
		esc_html( get_the_date() )
	);

	$author = sprintf( '<span class="author vcard"><a class="url fn n" href="%1$s" title="%2$s" rel="author">%3$s</a></span>',
		esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ),
		esc_attr( sprintf( __( 'View all posts by %s', 'vow' ), get_the_author() ) ),
		get_the_author()
	);

	// Translators: 1 is category, 2 is tag, 3 is the date and 4 is the author's name.
	if ( $tag_list ) {
		$utility_text = __( 'This entry was posted in %1$s and tagged %2$s on %3$s<span class="by-author"> by %4$s</span>.', 'vow' );
	} elseif ( $categories_list ) {
		$utility_text = __( 'This entry was posted in %1$s on %3$s<span class="by-author"> by %4$s</span>.', 'vow' );
	} else {
		$utility_text = __( 'This entry was posted on %3$s<span class="by-author"> by %4$s</span>.', 'vow' );
	}

	printf(
		$utility_text,
		$categories_list,
		$tag_list,
		$date,
		$author
	);
}
endif;

/**
 * Extends the default WordPress body class to denote:
 * 1. Using a full-width layout, when no active widgets in the sidebar
 *    or full-width template.
 * 2. Front Page template: thumbnail in use and number of sidebars for
 *    widget areas.
 * 3. White or empty background color to change the layout and spacing.
 * 4. Custom fonts enabled.
 * 5. Single or multiple authors.
 */
function vow_body_class( $classes ) {
	global $entiri_opt;
	$background_color = get_background_color();

	if ( ! is_active_sidebar( 'sidebar-1' ) || is_page_template( 'page-templates/full-width.php' ) )
		$classes[] = 'full-width';

	if ( is_page_template( 'page-templates/front-page.php' ) ) {
		$classes[] = 'template-front-page';
		if ( has_post_thumbnail() )
			$classes[] = 'has-post-thumbnail';
		if ( is_active_sidebar( 'sidebar-2' ) && is_active_sidebar( 'sidebar-3' ) )
			$classes[] = 'two-sidebars';
	}

	if ( empty( $background_color ) )
		$classes[] = 'custom-background-empty';
	elseif ( in_array( $background_color, array( 'fff', 'ffffff' ) ) )
		$classes[] = 'custom-background-white';

	// Enable custom font class only if the font CSS is queued to load.
	if ( wp_style_is( 'reno-fonts', 'queue' ) )
		$classes[] = 'custom-font-enabled';

	if ( ! is_multi_author() )
		$classes[] = 'single-author';



	return $classes;
}

add_filter( 'body_class', 'vow_body_class' );

/**
 * Adjusts content_width value for full-width and single image attachment
 * templates, and when there are no active widgets in the sidebar.
 */
function vow_content_width() {
	if ( is_page_template( 'page-templates/full-width.php' ) || is_attachment() || ! is_active_sidebar( 'sidebar-1' ) ) {
		global $content_width;
		$content_width = 960;
	}
}
add_action( 'template_redirect', 'vow_content_width' );

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 */
function vow_customize_register( $wp_customize ) {
	$wp_customize->get_setting( 'blogname' )->transport = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport = 'postMessage';
}
add_action( 'customize_register', 'vow_customize_register' );

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function vow_customize_preview_js() {
	wp_enqueue_script( 'vow-customizer', get_template_directory_uri() . '/js/theme-customizer.js', array( 'customize-preview' ), '20120827', true );
}
add_action( 'customize_preview_init', 'vow_customize_preview_js' );

function vow_meta_boxes() {
	add_meta_box('box-meta-video', __('Video', 'vow'), 'video_box_function', 'post', 'normal', 'high');
	add_meta_box('box-meta-gallery', __('Gallery', 'vow'), 'gallery_box_function', 'post', 'normal', 'high');
}

function video_box_function($post) { ?>
	<div class="video-properties">
		<table class="form-table">
			<tbody>
				<tr>
					<th><?php printf('Vimeo link', 'vow'); ?></th>
					<td>
						<input type="text" name="vow_vimeo_link" value="<?php echo get_post_meta($post->ID, 'vow_vimeo_link', true); ?>">
					</td>
				</tr>
			</tbody>
		</table>
	</div>
<?php
}

function gallery_box_function($post) { ?>
	<div id="poststuff">
		<?php wp_editor(get_post_meta($post->ID, 'vow_post_gallery', true), "vow_post_gallery"); ?>
	</div>
<?php
}

function vow_save_meta($post) {

	
    if (isset($_POST['member_job'])) {
    	update_post_meta($post, 'member_job', $_POST['member_job']);
    }
    if (isset($_POST['member_adn'])) {
    	update_post_meta($post, 'member_adn', $_POST['member_adn']);
    }
    if (isset($_POST['member_android'])) {
    	update_post_meta($post, 'member_android', $_POST['member_android']);
    }
    if (isset($_POST['member_apple'])) {
    	update_post_meta($post, 'member_apple', $_POST['member_apple']);
    }
    if (isset($_POST['member_bitbucket'])) {
    	update_post_meta($post, 'member_bitbucket', $_POST['member_bitbucket']);
    }
    if (isset($_POST['member_css3'])) {
    	update_post_meta($post, 'member_css3', $_POST['member_css3']);
    }
    if (isset($_POST['member_dribbble'])) {
    	update_post_meta($post, 'member_dribbble', $_POST['member_dribbble']);
    }
    if (isset($_POST['member_dropbox'])) {
    	update_post_meta($post, 'member_dropbox', $_POST['member_dropbox']);
    }
    if (isset($_POST['member_foursquare'])) {
    	update_post_meta($post, 'member_foursquare', $_POST['member_foursquare']);
    }
    if (isset($_POST['member_github'])) {
    	update_post_meta($post, 'member_github', $_POST['member_github']);
    }
    if (isset($_POST['member_html5'])) {
    	update_post_meta($post, 'member_html5', $_POST['member_html5']);
    }
    if (isset($_POST['member_instagram'])) {
    	update_post_meta($post, 'member_instagram', $_POST['member_instagram']);
    }
    if (isset($_POST['member_tumblr'])) {
    	update_post_meta($post, 'member_tumblr', $_POST['member_tumblr']);
    }
    if (isset($_POST['member_facebook'])) {
    	update_post_meta($post, 'member_facebook', $_POST['member_facebook']);
    }
    if (isset($_POST['member_google'])) {
    	update_post_meta($post, 'member_google', $_POST['member_google']);
    }
    if (isset($_POST['member_twitter'])) {
    	update_post_meta($post, 'member_twitter', $_POST['member_twitter']);
    }
    if (isset($_POST['member_skype'])) {
    	update_post_meta($post, 'member_skype', $_POST['member_skype']);
    }
    if (isset($_POST['member_flickr'])) {
    	update_post_meta($post, 'member_flickr', $_POST['member_flickr']);
    }
    if (isset($_POST['member_linkedin'])) {
    	update_post_meta($post, 'member_linkedin', $_POST['member_linkedin']);
    }
    if (isset($_POST['member_pinterest'])) {
    	update_post_meta($post, 'member_pinterest', $_POST['member_pinterest']);
    }
    if (isset($_POST['member_excerpt'])) {
    	update_post_meta($post, 'member_excerpt', $_POST['member_excerpt']);
    }
    if (isset($_POST['header_content'])) {
    	update_post_meta($post, 'header_content', $_POST['header_content']);
    }
    if (isset($_POST['vow_client_link'])) {
    	update_post_meta($post, 'vow_client_link', $_POST['vow_client_link']);
    }
    if (isset($_POST['vow_vimeo_link'])) {
    	update_post_meta($post, 'vow_vimeo_link', $_POST['vow_vimeo_link']);
    }
    if (isset($_POST['vow_portfolio_type'])) {
    	update_post_meta($post, 'vow_portfolio_type', $_POST['vow_portfolio_type']);
    }
    if (isset($_POST['vow_portfolio_excerpt'])) {
    	update_post_meta($post, 'vow_portfolio_excerpt', $_POST['vow_portfolio_excerpt']);
    }
    if (isset($_POST['vow_portfolio_gallery'])) {
    	update_post_meta($post, 'vow_portfolio_gallery', $_POST['vow_portfolio_gallery']);
    }
    if (isset($_POST['vow_portfolio_link'])) {
    	update_post_meta($post, 'vow_portfolio_link', $_POST['vow_portfolio_link']);
    }
    if (isset($_POST['slider_caption_position'])) {
    	update_post_meta($post, 'slider_caption_position', $_POST['slider_caption_position']);
    }
    if (isset($_POST['vow_portfolio_template'])) {
    	update_post_meta($post, 'vow_portfolio_template', $_POST['vow_portfolio_template']);
    }
    if (isset($_POST['vow_post_gallery'])) {
    	update_post_meta($post, 'vow_post_gallery', $_POST['vow_post_gallery']);
    }
    
    
    if (isset($_POST['show_heading'])) {
    	update_post_meta($post, 'show_heading', 'yes');
    }
    else {
    	update_post_meta($post, 'show_heading', '');
    }
    if (isset($_POST['show_breadcrumb'])) {
    	update_post_meta($post, 'show_breadcrumb', 'yes');
    }
    else {
    	update_post_meta($post, 'show_breadcrumb', '');
    }
    if (isset($_POST['vow_portfolio_info'])) {
    	update_post_meta($post, 'vow_portfolio_info', $_POST['vow_portfolio_info']);
    }
    if (isset($_POST['show_related_posts'])) {
    	update_post_meta($post, 'show_related_posts', 'yes');
    }
    else {
    	update_post_meta($post, 'show_related_posts', '');
    }
    
    
    

}


add_action('save_post', 'vow_save_meta');
add_action('add_meta_boxes', 'vow_meta_boxes');










function portfolio_pagination($post_count,$current,$posts_per_page) {

	$pages_count = ceil($post_count / $posts_per_page);
	if($post_count > $posts_per_page) {
		ob_start(); ?> 
	 		<div class="row">
		      <div class="span12 center">
		        <div class="pagination">
		          <ul>
		          	<?php if($current>1) { ?>
		            	<li><a href="?portfolio_page=<?php echo $current-1; ?>"><i class="icon-angle-left"></i> Prev</a></li>
		            <?php } ?>
		            <?php
		            for ($i=1; $i < $pages_count+1; $i++) { 
		            	if($current == $i) {
		            		echo '<li class="active"><a href="?portfolio_page='.$i.'">'.$i.'</a></li>';
		            	}
		            	else {
		            		echo '<li><a href="?portfolio_page='.$i.'">'.$i.'</a></li>';
		            	}
		            }
		            ?>
		            <?php if($current < $pages_count) { ?>
		            	<li><a href="?portfolio_page=<?php echo $current+1; ?>">Next <i class="icon-angle-right"></i></a></li>
		            <?php } ?>
		          </ul>
		        </div>
		      </div>
		    </div> 
		<?php
		$output_string = ob_get_contents();
		ob_end_clean();
		return $output_string;
	}
	else {
		return '<div class="row spacer50"></div>';
	}
}




function custom_excerpt_length( $length ) {
	return 20;
}
add_filter( 'excerpt_length', 'custom_excerpt_length', 999 );

function new_excerpt_more( $more ) {
	return '';
}
add_filter('excerpt_more', 'new_excerpt_more');


function vow_list_categories($current) {

	$categories = get_categories( array('hide_empty' => false) );
	foreach ($categories as $category) { ?>
		<option value="<?php echo $category->term_id; ?>" <?php if($current==$category->term_id) echo 'selected="selected"'; ?>>
        	<?php echo $category->name; ?>
        </option>	
		<?php
	}
		
}
function vow_list_categories_names($current) {

	$categories = get_categories( array('hide_empty' => false) );
	foreach ($categories as $category) { ?>
		<option value="<?php echo $category->slug; ?>" <?php if($current==$category->term_id) echo 'selected="selected"'; ?>>
        	<?php echo $category->name; ?>
        </option>	
		<?php
	}
		
}
function vow_send_mail() {
	if (isset($_POST['contact_name']) && isset($_POST['contact_email']) && isset($_POST['contact_message'])) {
		$message = 'From: '. $_POST['contact_name'] . '<' . $_POST['contact_email'] . '>' . "\r\n\r\n";
		$message .= $_POST['contact_message'];
		wp_mail( get_bloginfo('admin_email'), 'vow contact form', $message ); ?>
		<p><?php printf( __('Your message was sent', 'vow')); ?></p>
		<?php
	}
}
function custom_css_classes_for_vc_row_and_vc_column($class_string, $tag) {
    if($tag=='vc_row' || $tag=='vc_row_inner') {
        $class_string = str_replace('vc_row-fluid', 'row', $class_string);
    }
    if($tag=='vc_column' || $tag=='vc_column_inner') {
        $class_string = str_replace('vc_span1', 'col-md-1', $class_string);
        $class_string = str_replace('vc_span2', 'col-md-2', $class_string);
        $class_string = str_replace('vc_span3', 'col-md-3', $class_string);
        $class_string = str_replace('vc_span4', 'col-md-4', $class_string);
        $class_string = str_replace('vc_span5', 'col-md-5', $class_string);
        $class_string = str_replace('vc_span6', 'col-md-6', $class_string);
        $class_string = str_replace('vc_span7', 'col-md-7', $class_string);
        $class_string = str_replace('vc_span8', 'col-md-8', $class_string);
        $class_string = str_replace('vc_span9', 'col-md-9', $class_string);
        $class_string = str_replace('vc_span10', 'col-md-10', $class_string);
        $class_string = str_replace('vc_span11', 'col-md-11', $class_string);
        $class_string = str_replace('vc_span12', 'col-md-12', $class_string);
    }
    return $class_string;
}
// Filter to Replace default css class for vc_row shortcode and vc_column
add_filter('vc_shortcodes_css_class', 'custom_css_classes_for_vc_row_and_vc_column', 10, 2);

function testCompiler() {
	echo "Compiler hook!";
}
add_action('redux-compiler-entiri_opt-sample-file', 'testCompiler');
