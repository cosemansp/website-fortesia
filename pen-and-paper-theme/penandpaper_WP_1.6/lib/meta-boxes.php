<?php
/**
 * Meta boxes (from OptionTree). 
 */
 
add_action( 'admin_init', 'pp_meta_boxes' );

function pp_meta_boxes() {

	// metaboxes for homepage sections
	$home_meta_box = array(
	  'id'        => 'home_meta_box',
	  'title'     => __( 'Options', 'pp'),
	  'desc'      => '',
	  'pages'     => array( 'sections' ),
	  'context'   => 'normal',
	  'priority'  => 'high',
	  'fields'    => array(
	  	// section title
		array(
		  'id'          => 'home_title_meta',
		  'label'       => __( 'Title', 'pp' ),
		  'desc'        => __( 'Title of this section.', 'pp' ),
		  'std'         => '',
		  'type'        => 'text',
		  'class'       => '',
		),	  
	  	// section subtitle
		array(
		  'id'          => 'home_subtitle_meta',
		  'label'       => __( 'Subtitle', 'pp' ),
		  'desc'        => __( 'This text will appear bellow the title, and inside curly brackets.', 'pp' ),
		  'std'         => '',
		  'type'        => 'textarea',
		  'class'       => '',
		),		
		// background image set
		array(
		  'id'          => 'home_bg_set_meta',
		  'label'       => __( 'Background image', 'pp' ),
		  'desc'        => '',
		  'std'         => '',
		  'type'        => 'radio_image',
		  'class'       => '',
		),	  	
		// background image upload
		array(
		  'id'          => 'home_bg_meta',
		  'label'       => __( 'Upload new image', 'pp' ),
		  'desc'        => '',
		  'std'         => '',
		  'type'        => 'upload',
		  'class'       => '',
		),
	  	// background image repeat
		array(
		  'id'          => 'home_bg_repeat_meta',
		  'label'       => __( 'Background Repeat', 'pp'),
		  'desc'        => __( 'For small tillable image, chose "Repeat All", while for large fullscreen image, chose "No Repeat".', 'pp' ),
		  'std'         => 'repeat',
		  'type'        => 'select',
		  'class'       => '',
		  'choices'     => array( 
			  array(
				'value'       => 'no-repeat',
				'label'       => __( 'No Repeat', 'pp' ),
				'src'         => ''
			  ),			
			  array(
				'value'       => 'repeat',
				'label'       => __( 'Repeat All', 'pp' ),
				'src'         => ''
			  ),
			  array(
				'value'       => 'repeat-x',
				'label'       => __( 'Repeat Horizontally', 'pp' ),
				'src'         => ''
			  ),
			  array(
				'value'       => 'repeat-y',
				'label'       => __( 'Repeat Vertically', 'pp' ),
				'src'         => ''
			  ),			  
			)		  
		),						
	   // background ratio for stelar.js	
	   array(
		  'id'          => 'home_bg_ratio_meta',
		  'label'       => __( 'Parallax Background Ratio', 'pp' ),
		  'desc'        => __( 'Ratio of 0.5 would cause the background to scroll at half-speed, while a ratio of 1 would have no effect.', 'pp' ),
		  'std'         => '',
		  'type'        => 'select',
		  'class'       => '',
		  'choices'     => array( 
			array(
			  'value'       => '0.0',
			  'label'       => '0',
			  'src'         => ''
			),			
			array(
			  'value'       => '0.1',
			  'label'       => '0.1',
			  'src'         => ''
			),
			array(
			  'value'       => '0.2',
			  'label'       => '0.2',
			  'src'         => ''
			),
			array(
			  'value'       => '0.3',
			  'label'       => '0.3',
			  'src'         => ''
			),
			array(
			  'value'       => '0.4',
			  'label'       => '0.4',
			  'src'         => ''
			),
			array(
			  'value'       => '0.5',
			  'label'       => '0.5',
			  'src'         => ''
			),			
			array(
			  'value'       => '0.6',
			  'label'       => '0.6',
			  'src'         => ''
			),
			array(
			  'value'       => '0.7',
			  'label'       => '0.7',
			  'src'         => ''
			),
			array(
			  'value'       => '0.8',
			  'label'       => '0.8',
			  'src'         => ''
			),
			array(
			  'value'       => '0.9',
			  'label'       => '0.9',
			  'src'         => ''
			),
			array(
			  'value'       => '1',
			  'label'       => '1',
			  'src'         => ''
			)
		  )
	    )
	));
	
	ot_register_meta_box( $home_meta_box );	
	
	// metaboxes for flexslider
	$slider_meta_box = array(
	  'id'        => 'slider_meta_box',
	  'title'     => __( 'Options', 'pp' ),
	  'desc'      => '',
	  'pages'     => array( 'slider_type' ),
	  'context'   => 'normal',
	  'priority'  => 'high',
	  'fields'    => array(
	  	// caption
		array(
		  'id'          => 'slider_caption_meta',
		  'label'       => __( 'Caption', 'pp' ),
		  'desc'        => __( 'Enter a short caption.', 'pp' ),
		  'std'         => '',
		  'type'        => 'text',
		  'class'       => '',
		  'choices'     => array()
		),
	 	));	
	
	ot_register_meta_box( $slider_meta_box );
	
	// metaboxes for authors
	$authors_meta_box = array(
	  'id'        => 'authors_meta_box',
	  'title'     => 'Options',
	  'desc'      => '',
	  'pages'     => array( 'author_type' ),
	  'context'   => 'normal',
	  'priority'  => 'high',
	  'fields'    => array(
	  	// caption
		array(
		  'id'          => 'authors_caption_meta',
		  'label'       => __( 'Image Caption', 'pp' ),
		  'desc'        => __( 'Enter a short caption.', 'pp' ),
		  'std'         => '',
		  'type'        => 'text',
		  'class'       => '',
		  'choices'     => array()
		),
	 	));	
	
	ot_register_meta_box( $authors_meta_box );	
	
	// metaboxes for portfolio
	$portfolio_meta_box = array(
	  'id'        => 'portfolio_meta_box',
	  'title'     => __( 'Options', 'pp' ),
	  'desc'      => '',
	  'pages'     => array( 'portfolio_type' ),
	  'context'   => 'normal',
	  'priority'  => 'high',
	  'fields'    => array(
	  	// caption
		array(
		  'id'          => 'portfolio_caption_meta',
		  'label'       => __( 'Caption', 'pp' ),
		  'desc'        => __( 'Enter a caption.', 'pp' ),
		  'std'         => '',
		  'type'        => 'textarea',
		  'class'       => '',
		  'choices'     => array()
		),
	 	));	
	
	ot_register_meta_box( $portfolio_meta_box );
	
	// metaboxes for homepage sections
	$page_meta_box = array(
	  'id'        => 'page_meta_box',
	  'title'     => __( 'Options', 'pp' ),
	  'desc'      => '',
	  'pages'     => array( 'page' ),
	  'context'   => 'normal',
	  'priority'  => 'high',
	  'fields'    => array(
	  	// page title
		array(
		  'id'          => 'page_title_meta',
		  'label'       => __( 'Title', 'pp' ),
		  'desc'        => __( 'Title of this page.', 'pp' ),
		  'std'         => '',
		  'type'        => 'text',
		  'class'       => '',
		),	  
	  	// page subtitle
		array(
		  'id'          => 'page_subtitle_meta',
		  'label'       => __( 'Subtitle', 'pp' ),
		  'desc'        => __( 'This text will appear bellow the title, and inside curly brackets.', 'pp' ),
		  'std'         => '',
		  'type'        => 'textarea',
		  'class'       => '',
		),	  	
	));
	
	ot_register_meta_box( $page_meta_box );			
} ?>