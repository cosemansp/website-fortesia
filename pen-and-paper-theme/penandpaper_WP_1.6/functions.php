<?php
/**
 * Theme functions and definitions
 */
 
 // ==============================================
// 			THEME OPTIONS PAGE (OPTIONTREE)
// ============================================== 
 

// Optional: set 'ot_show_pages' filter to false. 
// This will hide the settings & documentation pages.
add_filter( 'ot_show_pages', '__return_false' );

// Optional: set 'ot_show_new_layout' filter to false. 
// This will hide the "New Layout" section on the Theme Options page.
add_filter( 'ot_show_new_layout', '__return_false' );


// Required: set 'ot_theme_mode' filter to true.
add_filter( 'ot_theme_mode', '__return_true' );


// Required: include OptionTree.
include_once( 'option-tree/ot-loader.php' );


// Theme Options
include_once( 'lib/theme-options.php' );
 
// ==============================================
// 			CONTENT WIDTH
// ==============================================  

if ( ! isset( $content_width ) ) $content_width = 930;

	
// ==============================================
// 			DEFINE THEME DIRECTORY
// ============================================== 

define('PP_THEME_DIR', get_template_directory_uri());


// ==============================================
// 			ENQUEUE SCRIPTS & STYLES
// ============================================== 
  
function pp_scripts() {
	if ( !is_admin() ) {
		// enqueue jQuery first
		wp_enqueue_script( 'jquery' );
		
		// register and enqueue other scripts
		wp_register_script('pp_tools', PP_THEME_DIR . '/lib/js/jquery.tools.min.js', array('jquery'));
		wp_register_script('pp_galleriffic', PP_THEME_DIR . '/lib/js/jquery.galleriffic.js', array('jquery'));
		wp_register_script('pp_flexslider', PP_THEME_DIR . '/lib/js/jquery.flexslider-min.js', array('jquery'));
		wp_register_script('pp_flexslider_script', PP_THEME_DIR . '/lib/js/flexslider_script.js', array('jquery'));	
		wp_register_script('pp_quicksand', PP_THEME_DIR . '/lib/js/jquery.quicksand.js', array('jquery'));
		wp_register_script('pp_easing', PP_THEME_DIR . '/lib/js/jquery.easing.1.3.js', array('jquery'));		
		wp_register_script('pp_map', 'http://maps.google.com/maps/api/js?sensor=false');
		wp_register_script('pp_map_script', PP_THEME_DIR . '/lib/js/map_script.js', array('jquery'));
		wp_register_script('pp_waypoints', PP_THEME_DIR . '/lib/js/waypoints.min.js', array('jquery'));
		wp_register_script('pp_stellar', PP_THEME_DIR . '/lib/js/jquery.stellar.min.js', array('jquery'));
		wp_register_script('pp_custom', PP_THEME_DIR . '/lib/js/custom.js', array('jquery'));		
		wp_register_script('pp_custom_home', PP_THEME_DIR . '/lib/js/custom_homepage.js', array('jquery'));
		wp_register_script('pp_portfolio_script', PP_THEME_DIR . '/lib/js/portfolio_script.js', array('jquery'));	
		
		wp_enqueue_script( 'pp_tools' );	 
		wp_enqueue_script( 'pp_custom' );
		wp_enqueue_script( 'pp_easing' );
				
		// register and enqueue styles
		wp_register_style('pp_skeleton', PP_THEME_DIR . '/lib/css/skeleton.css' );
		wp_register_style('pp_font_awesome', PP_THEME_DIR . '/lib/css/font-awesome.min.css' );
		
		wp_enqueue_style( 'pp_skeleton' );
		wp_enqueue_style( 'pp_font_awesome' );
				
		// enqueue only when on homepage
		if ( is_page_template('homepage.php') ) {
			wp_enqueue_script( 'pp_waypoints' ); 
			wp_enqueue_script( 'pp_custom_home' ); 			
		}
		
		// enqueue only when on homepage and parallax option is turned on		
		if ( is_page_template('homepage.php') && ot_get_option('pp_parallax', '', false, true, 0 )) {
			wp_enqueue_script( 'pp_stellar' ); 
		}
		
		// enqueue singular pages for custom post types	
		if ( is_singular( 'slider_type' ) ) { 
			wp_enqueue_script( 'pp_flexslider' );
			wp_enqueue_script( 'pp_flexslider_script' ); 
			
			wp_localize_script('pp_flexslider_script', 'slider_vars', array(
				'controlNav' => ot_get_option('pp_controlnav', '', false, true, 0 ),
				'directionNav' => ot_get_option('pp_directionalnav', '', false, true, 0 ),			
				'animation' => ot_get_option('pp_slider_animation'),	
				'direction' => ot_get_option('pp_slider_direction')
			));		
		}
		
		if ( is_singular( 'portfolio_type' ) || is_tax( 'filter' )  ) { 
			wp_enqueue_script( 'pp_galleriffic' );
			wp_enqueue_script( 'pp_portfolio_script' );
		}		
		
		// enqueue when on single blog post
		if ( is_single() ) wp_enqueue_script( "comment-reply" ); }}
		
add_action('template_redirect', 'pp_scripts');


// ==============================================
// 			 ADDING THEME SUPORT
// ==============================================

// wp3 menu
add_theme_support( 'menus' );

// RSS feed
add_theme_support( 'automatic-feed-links' );
		
// thumbnails
add_theme_support( 'post-thumbnails' );


// ==============================================
// 			THUMBNAILS
// ==============================================

// regular thumbnail size
set_post_thumbnail_size( 140, 140, true );

//authors (about) images
add_image_size('author-thumbnail', 432, 427, true);	

//flexslider images
add_image_size('slider-thumbnail', 672, 282, true);

// thumbnail size inside the portfolio	
add_image_size('portfolio-thumbnail', 272, 170, true);	

// full size image inside the portfolio	
add_image_size('portfolio-large', 912, 570, true);
	
// featured blog image
add_image_size('blog-thumbnail', 592, 249, true);

		
// ==============================================
// 			INCLUDING PHP FILES
// ==============================================

// blog comments
include 'lib/blog-comments.php';

// custom post types for: homepage, flexslider, authors and portfolio
include 'lib/post-types.php';

// shortcodes
include 'lib/shortcodes.php';

// meta boxes
include 'lib/meta-boxes.php';

// OptionTree settings filters
include 'lib/theme-options-filters.php';

// Font options
include 'lib/fonts.php';

// TinyMCE buttons
include 'lib/TinyMCE.php';

// theme localisation
include 'lib/localisation.php';

 
// ==============================================
// 			 REGISTERING
// ==============================================

// sidebar
if(function_exists('register_sidebar')) {
	register_sidebar(array('name' => __( 'Blog Sidebar', 'pp' )));
}

// navigation menu
if(function_exists('register_nav_menu')):
	register_nav_menu( 'primary_nav', __( 'Primary Navigation', 'pp' ));
endif;

?>