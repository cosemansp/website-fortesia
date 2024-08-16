<?php
/**
 * POST TYPES
 */

// ==============================================
// 			HOMEPAGE SECTIONS
// ==============================================

add_action('init', 'home_type');  

function home_type()  {  
  $labels = array(  
    'name' => _x('Homepage', 'post type general name', 'pp'),  
    'singular_name' => _x('Homepage', 'post type singular name', 'pp'),  
    'add_new' => _x('Add New Section', 'Section', 'pp'),  
    'add_new_item' => __('Add New Section', 'pp'),  
    'edit_item' => __('Edit section', 'pp'),  
    'new_item' => __('New section', 'pp'),  
    'view_item' => __('View section', 'pp'),  
    'search_items' => __('Search sections', 'pp'),  
    'not_found' =>  __('No sections found', 'pp'),  
    'not_found_in_trash' => __('No sections found in Trash', 'pp'),  
    'parent_item_colon' => ''  
  );  
  
  $args = array(  
    'labels' => $labels,  
    'public' => true,  
    'publicly_queryable' => true,  
    'show_ui' => true,  
    'query_var' => true,  
    'rewrite' => true,  
    'capability_type' => 'post', 
	'menu_icon' => PP_THEME_DIR . '/lib/images/home.png',	 
    'hierarchical' => false, 
	'exclude_from_search' => true,	 
    'menu_position' => 5,  
    'supports' => array('title','editor')  
  );  
  register_post_type('sections',$args);  
}  

// Adding ID field to the homepage posts (sections) listing
function postsColumnsHeader($columns) {
	if ( 'sections' == get_post_type() )
		$columns['postID'] = __('Custom link URL', 'pp');
		return $columns;
}

add_filter( 'manage_posts_columns', 'postsColumnsHeader' );

function the_slug() {
	global $post;
	$post_data = get_post($post->ID, ARRAY_A);
	$slug = $post_data['post_name'];
	echo "#$slug"; 
}

function postsColumnsRow($columnTitle, $postID){
	if($columnTitle == 'postID'){
		echo the_slug();
	}
}

add_filter( 'manage_posts_custom_column', 'postsColumnsRow', 10, 2 );


// ==============================================
// 			FLEXSLIDER
// ==============================================

add_action('init', 'slider_type');  

function slider_type()  {  
  $labels = array(  
    'name' => _x('Flexslider', 'post type general name', 'pp'),  
    'singular_name' => _x('Flexslider', 'post type singular name', 'pp'),  
    'add_new' => _x('Add New Slide', 'Slide', 'pp'),  
    'add_new_item' => __('Add New Slide', 'pp'),  
    'edit_item' => __('Edit slide', 'pp'),  
    'new_item' => __('New slide', 'pp'),  
    'view_item' => __('View slide', 'pp'),  
    'search_items' => __('Search slides', 'pp'),  
    'not_found' =>  __('No slides found', 'pp'),  
    'not_found_in_trash' => __('No slides found in Trash', 'pp'),  
    'parent_item_colon' => ''  
  );  
  
  $args = array(  
    'labels' => $labels,  
    'public' => true,  
    'publicly_queryable' => true,  
    'show_ui' => true,  
    'query_var' => true,  
    'rewrite' => true,  
    'capability_type' => 'post', 
	'menu_icon' => PP_THEME_DIR . '/lib/images/slider.png',	 
    'hierarchical' => false, 
	'exclude_from_search' => true,	 
    'menu_position' => 5,  
    'supports' => array('title', 'thumbnail')  
  );  
  register_post_type('slider_type',$args);  
}  

// flexslider taxonomy
function slider_categories() {
	register_taxonomy("flexslider", 
	array("slider_type"), 
	array(
		"hierarchical" => true, 
		"label" => __( "Categories", 'pp' ), 
		"singular_label" => __( "Category", 'pp' ), 
		'show_ui'           => true,
		'show_admin_column' => true, 
		"rewrite" => array('hierarchical' => true)
		)
	); 
}

add_action('init', 'slider_type');
add_action( 'init', 'slider_categories', 0 );

// ==============================================
// 			AUTHORS
// ==============================================

add_action('init', 'author_type');  

function author_type()  {  
  $labels = array(  
    'name' => _x('Authors', 'post type general name', 'pp'),  
    'singular_name' => _x('Author', 'post type singular name', 'pp'),  
    'add_new' => _x('Add New Author', 'Slide', 'pp'),  
    'add_new_item' => __('Add New Author', 'pp'),  
    'edit_item' => __('Edit author', 'pp'),  
    'new_item' => __('New author', 'pp'),  
    'view_item' => __('View author', 'pp'),  
    'search_items' => __('Search authors', 'pp'),  
    'not_found' =>  __('No authors found', 'pp'),  
    'not_found_in_trash' => __('No authors found in Trash', 'pp'),  
    'parent_item_colon' => ''  
  );  
  
  $args = array(  
    'labels' => $labels,  
    'public' => true,  
    'publicly_queryable' => true,
    'show_ui' => true,  
    'query_var' => true,  
    'rewrite' => true,  
    'capability_type' => 'post', 
	'menu_icon' => PP_THEME_DIR . '/lib/images/authors.png',	 
    'hierarchical' => false, 
	'exclude_from_search' => true,	 
    'menu_position' => 5,  
    'supports' => array('title', 'editor', 'thumbnail')  
  );  
  register_post_type('author_type',$args);  
}  

// authors taxonomy
function authors_categories() {
	register_taxonomy("authors", 
	array("author_type"), 
	array(
		"hierarchical" => true, 
		"label" => __( "Categories", 'pp' ), 
		"singular_label" => __( "Category", 'pp' ),
		'show_ui'           => true,
		'show_admin_column' => true, 
		"rewrite" => array('hierarchical' => true)
		)
	); 
}

add_action('init', 'author_type');
add_action( 'init', 'authors_categories', 0 );

// ==============================================
// 			PORTFOLIO
// ==============================================

function portfolio_type() {
	$labels = array(
		'name' => _x( 'Portfolio', 'post type general name', 'pp'), 
		'singular_name' => _x('Portfolio', 'post type singular name', 'pp'),
		'add_new' => _x('Add New Item', 'portfolio', 'pp'), 
		'edit_item' => __('Edit Portfolio Item', 'pp'),
		'new_item' => __('New Portfolio Item', 'pp'), 
		'view_item' => __('View Portfolio', 'pp'),
		'search_items' => __('Search Portfolio', 'pp'), 
		'not_found' =>  __('No Portfolio Items Found', 'pp'),
		'not_found_in_trash' => __('No Portfolio Items Found In Trash', 'pp'),
		'parent_item_colon' => '' 
	);
	
	$args = array(
		'labels' => $labels, 
		'public' => true, 
		'publicly_queryable' => true, 
		'show_ui' => true, 
		'query_var' => true, 
		'rewrite' => true, 
		'capability_type' => 'post', 
		'hierarchical' => false, 
   		'menu_position' => 5,  
		'exclude_from_search' => true,
		'supports' => array('title','thumbnail'),
		'menu_icon' => PP_THEME_DIR . '/lib/images/portfolio.png',	 
	);
	
	register_post_type('portfolio_type',$args);	
} 

// portfolio taxonomy
function portfolio_filter() {
	register_taxonomy("filter", 
	array("portfolio_type"), 
	array(
		"hierarchical" => true, 
		"label" => __( "Categories", 'pp' ), 
		"singular_label" => __( "Category", 'pp' ), 
		'show_ui'           => true,
		'show_admin_column' => true,
		"rewrite" => array( 'slug' => 'filter', 'hierarchical' => true),
		)
	); 
}

add_action('init', 'portfolio_type');
add_action( 'init', 'portfolio_filter', 0 );

?>