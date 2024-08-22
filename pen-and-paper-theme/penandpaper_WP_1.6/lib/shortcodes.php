<?php
/**
 * All shortcodes that can be used with theme
 */

// ==============================================
// 			 LAYOUT (COLUMNS)
// ==============================================

//one fourth
function pp_one_fourth( $atts, $content = null ) {
   return '<div class="four columns">' . do_shortcode($content) . '</div>';
}
add_shortcode('one_fourth', 'pp_one_fourth');

//one third
function pp_one_third( $atts, $content = null ) {
   return '<div class="one-third column">' . do_shortcode($content) . '</div>';
}
add_shortcode('one_third', 'pp_one_third');

//two thirds
function pp_two_thirds( $atts, $content = null ) {
   return '<div class="two-thirds column">' . do_shortcode($content) . '</div>';
}
add_shortcode('two_thirds', 'pp_two_thirds');

//three fourths
function pp_three_fourths( $atts, $content = null ) {
   return '<div class="twelve columns">' . do_shortcode($content) . '</div>';
}
add_shortcode('three_fourths', 'pp_three_fourths');

//one half
function pp_one_half( $atts, $content = null ) {
   return '<div class="eight columns">' . do_shortcode($content) . '</div>';
}
add_shortcode('one_half', 'pp_one_half');


//one
function pp_one( $atts, $content = null ) {
   return '<div class="sixteen columns">' . do_shortcode($content) . '</div>';
}
add_shortcode('one', 'pp_one');

// ==============================================
// 			 FLEXSLIDER
// ==============================================

function pp_slider($atts) {	
	global $category;
	extract( shortcode_atts( array(
		'category' => '',
    ), $atts ) );
	
	wp_enqueue_script( 'pp_flexslider' );
	wp_enqueue_script( 'pp_flexslider_script' );
	
	// enqueue singular pages for custom post types (for preview use)		
	if ( is_singular( 'slider_type' ) ) { 
			wp_enqueue_script( 'pp_flexslider' );
			wp_enqueue_script( 'pp_flexslider_script' ); 
	}	
		
	wp_localize_script('pp_flexslider_script', 'slider_vars', array(
			'controlNav' => ot_get_option('pp_controlnav', '', false, true, 0 ),
			'directionNav' => ot_get_option('pp_directionalnav', '', false, true, 0 ),			
			'animation' => ot_get_option('pp_slider_animation'),	
			'direction' => ot_get_option('pp_slider_direction')
		)
	);	
	
	ob_start();
	get_template_part('flexslider');
	global $pp_slider;	
	$pp_slider = ob_get_clean();	
    return $pp_slider;
}
	
add_shortcode('flexslider', 'pp_slider');

// ==============================================
// 			 AUTHORS (ABOUT)
// ==============================================

function pp_authors($atts) {
	global $category;
	extract( shortcode_atts( array(
		'category' => '',
    ), $atts ) );
		
	ob_start();
	get_template_part('authors');
	global $content;	
	$content = ob_get_clean();	
    return $content;
}
add_shortcode('authors', 'pp_authors');


// ==============================================
// 			 PORTFOLIO
// ==============================================


function pp_portfolio($atts) {
	global $category;
	extract( shortcode_atts( array(
		'category' =>  '',
    ), $atts ) );	
	
	wp_enqueue_script( 'pp_galleriffic' );	
	if ( ot_get_option('pp_filtering', '', false, true, 0 )) {	
		wp_enqueue_script( 'pp_quicksand' );
	}	
	wp_enqueue_script( 'pp_portfolio_script' );	 		
	ob_start();
	get_template_part('portfolio');
	global $content;	
	$content = ob_get_clean();	
    return $content;
}
add_shortcode('portfolio', 'pp_portfolio');


// ==============================================
// 			 GOOGLE MAP
// ==============================================


function pp_map($atts) {
			
	wp_enqueue_script( 'pp_map' );
	wp_enqueue_script( 'pp_map_script' );
				
	wp_localize_script('pp_map_script', 'map_vars', array(
			'lat' => ot_get_option( 'pp_latitude'),
			'lng' => ot_get_option( 'pp_longitude'),
			'zoom' => ot_get_option( 'pp_zoom'),
			'saturation' => ot_get_option( 'pp_saturation'),
			'marker' => get_template_directory_uri() . '/lib/images/marker.png',
		)
	);	
	
	ob_start();	
	echo '<div id="google_map" class="sixteen columns clearfix">
			<div id="map_canvas_container" class="styled clearfix">
				<div id="map_canvas"></div>
			</div> 
		</div>';
	$content = ob_get_clean();
    return $content;
}
add_shortcode('map', 'pp_map');

// ==============================================
// 			 BUTTONS, SEPARATORS...
// ==============================================

//regular button
function pp_button( $atts, $content = null ) {
    extract(shortcode_atts(array(
    'link'	=> '#',
    'target'	=> '',
    'align'	=> '',
    ), $atts));

	$align = ($align) ? ' align'.$align : '';
	$target = ($target) ? ' target='.$target : '';

	$out = '<a' .$target. ' class="button '.$align.' " href="' .$link. '">' .do_shortcode($content). '</a>';

    return $out;
}
add_shortcode('button', 'pp_button');

// line separator
function pp_separator() {
   return '<div class="separator"></div>';
}
add_shortcode('separator', 'pp_separator');

// clear
function pp_clear() {
   return '<br class="clear"/>';
}
add_shortcode('clear', 'pp_clear');

// space
function pp_space() {
   return '<div class="space"></div>';
}
add_shortcode('space', 'pp_space');

// ==============================================
// 			 ICONS (FONT AWESOME)
// ==============================================

function pp_icon($atts, $content = null) {
    extract( shortcode_atts( array(
	'name' => '',
    ), $atts ) );	
        $output = "<i class='$name'></i>";
        return $output;

}
add_shortcode('icon','pp_icon');

?>