<?php
/**
 * Initialize the options before anything else.
 */
add_action( 'admin_init', 'custom_theme_options', 1 );

/**
 * Build the custom settings & update OptionTree.
 */
function custom_theme_options() {
  /**
   * Get a copy of the saved settings array. 
   */
  $saved_settings = get_option( 'option_tree_settings', array() );
  
  /**
   * Custom settings array that will eventually be 
   * passes to the OptionTree Settings API Class.
   */
  $custom_settings = array( 
    'contextual_help' => array( 
      'sidebar'       => ''
    ),
    'sections'        => array( 
      array(
        'id'          => 'pp_logo_section',
        'title'       => __(' Logo and Favicon', 'pp')
      ),
      array(
        'id'          => 'pp_homepage_section',
        'title'       => __('Homepage Settings', 'pp')
      ),
      array(
        'id'          => 'pp_flexslider_section',
        'title'       => __('Flexslider', 'pp')
      ),
      array(
        'id'          => 'pp_portfolio_section',
        'title'       => __('Portfolio', 'pp')
      ),
      array(
        'id'          => 'pp_map_section',
        'title'       => __('Google Map', 'pp')
      ),
      array(
        'id'          => 'pp_copyright_section',
        'title'       => __('Copyright and RSS', 'pp')
      ),
      array(
        'id'          => 'pp_social_section',
        'title'       => __('Social Profiles', 'pp')
      ),
      array(
        'id'          => 'pp_background_section',
        'title'       => __('Background', 'pp')
      ),
      array(
        'id'          => 'pp_css_section',
        'title'       => __('Custom CSS', 'pp')
      )
    ),
    'settings'        => array( 
      array(
        'id'          => 'pp_logo_img',
        'label'       => __('Logo image', 'pp'),
        'desc'        => __('If you have an image logo, you can upload it here (maximum 55px tall). Otherwise, your logo will be your site title (you can change it inside \'Settings &gt; General\').', 'pp'),
        'std'         => '',
        'type'        => 'upload',
        'section'     => 'pp_logo_section',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),
      array(
        'id'          => 'pp_favicon',
        'label'       => __('Favicon', 'pp'),
        'desc'        => __('Upload your favicon as 16x16px icon (.ico) file.','pp'),
        'std'         => '',
        'type'        => 'upload',
        'section'     => 'pp_logo_section',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),
      array(
        'id'          => 'pp_parallax',
        'label'       => __('Parallax effect','pp'),
        'desc'        => '',
        'std'         => true,
        'type'        => 'checkbox',
        'section'     => 'pp_homepage_section',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => '',
        'choices'     => array( 
          array(
            'value'       => true,
            'label'       => __('Enable parallax background effect.','pp'),
            'src'         => ''
          )
        ),
      ),
      array(
        'id'          => 'pp_controlnav',
        'label'       => __('Control navigation','pp'),
        'desc'        => '',
        'std'         => true,
        'type'        => 'checkbox',
        'section'     => 'pp_flexslider_section',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => '',
        'choices'     => array( 
          array(
            'value'       => true,
            'label'       => __('Display control navigation (bullets).','pp'),
            'src'         => ''
          )
        ),
      ),
      array(
        'id'          => 'pp_directionalnav',
        'label'       => __('Directional navigation','pp'),
        'desc'        => '',
        'std'         => true,
        'type'        => 'checkbox',
        'section'     => 'pp_flexslider_section',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => '',
        'choices'     => array( 
          array(
            'value'       => true,
            'label'       => __('Display directional navigation (arrows).','pp'),
            'src'         => ''
          )
        ),
      ),
      array(
        'id'          => 'pp_slider_animation',
        'label'       => __('Animation','pp'),
        'desc'        => __('Select animation type (fade or slide).','pp'),
        'std'         => 'fade',
        'type'        => 'select',
        'section'     => 'pp_flexslider_section',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => '',
        'choices'     => array( 
          array(
            'value'       => 'fade',
            'label'       => __('Fade','pp'),
            'src'         => ''
          ),
          array(
            'value'       => 'slide',
            'label'       => __('Slide','pp'),
            'src'         => ''
          )
        ),
      ),
      array(
        'id'          => 'pp_slider_direction',
        'label'       => __('Sliding direction','pp'),
        'desc'        => __('Select the sliding direction (horizontal or vertical).','pp'),
        'std'         => 'horizontal',
        'type'        => 'select',
        'section'     => 'pp_flexslider_section',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => '',
        'choices'     => array( 
          array(
            'value'       => 'horizontal',
            'label'       => __('Horizontal','pp'),
            'src'         => ''
          ),
          array(
            'value'       => 'vertical',
            'label'       => __('Vertical','pp'),
            'src'         => ''
          )
        ),
      ),
      array(
        'id'          => 'pp_filtering',
        'label'       => __('Filter portfolio categories','pp'),
        'desc'        => '',
        'std'         => true,
        'type'        => 'checkbox',
        'section'     => 'pp_portfolio_section',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => '',
        'choices'     => array( 
          array(
            'value'       => true,
            'label'       => __('Enable category filtering inside portfolio (using \'Quicksand\' plugin).','pp'),
            'src'         => ''
          )
        ),
      ),
      array(
        'id'          => 'pp_latitude',
        'label'       => __('Latitude','pp'),
        'desc'        => __('Enter your location latitude (from maps.google.com). <br /> 
For example: <i>-37.812537</i>','pp'),
        'std'         => '-37.812537',
        'type'        => 'text',
        'section'     => 'pp_map_section',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),
      array(
        'id'          => 'pp_longitude',
        'label'       => __('Longitude','pp'),
        'desc'        => __('Enter your location longitude (from maps.google.com). <br /> For example: <i>144.969041</i>','pp'),
        'std'         => '144.969041',
        'type'        => 'text',
        'section'     => 'pp_map_section',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),
      array(
        'id'          => 'pp_zoom',
        'label'       => 'Zoom level',
        'desc'        => __('Enter zoom level. Default: <i>15</i>','pp'),
        'std'         => '15',
        'type'        => 'text',
        'section'     => 'pp_map_section',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),
      array(
        'id'          => 'pp_saturation',
        'label'       => __('Map style','pp'),
        'desc'        => __('Display map in color or in black and white.','pp'),
        'std'         => '-100',
        'type'        => 'select',
        'section'     => 'pp_map_section',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => '',
        'choices'     => array( 
          array(
            'value'       => '-100',
            'label'       => __('Black and white','pp'),
            'src'         => ''
          ),
          array(
            'value'       => '0.0',
            'label'       => __('Color','pp'),
            'src'         => ''
          )
        ),
      ),
      array(
        'id'          => 'pp_copyright',
        'label'       => __('Copyright information','pp'),
        'desc'        => '',
        'std'         => '&copy; 2012 <a href="#home">Your Site</a>,  All Rights Reserved.',
        'type'        => 'text',
        'section'     => 'pp_copyright_section',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),
      array(
        'id'          => 'pp_rss_feed',
        'label'       => 'RSS Feed',
        'desc'        => '',
        'std'         => true,
        'type'        => 'checkbox',
        'section'     => 'pp_copyright_section',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => '',
        'choices'     => array( 
          array(
            'value'       => true,
            'label'       => __('Display RSS Feed icon (it will appear alongside with social profiles icons)','pp'),
            'src'         => ''
          )
        ),
      ),
      array(
        'id'          => 'pp_twitter',
        'label'       => 'Twitter',
        'desc'        => __('Your Twitter profile link','pp'),
        'std'         => '',
        'type'        => 'text',
        'section'     => 'pp_social_section',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),
      array(
        'id'          => 'pp_facebook',
        'label'       => __('Facebook','pp'),
        'desc'        => __('Your Facebook profile link','pp'),
        'std'         => '',
        'type'        => 'text',
        'section'     => 'pp_social_section',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),
      array(
        'id'          => 'pp_linkedin',
        'label'       => __('LinkedIn','pp'),
        'desc'        => __('Your LinkedIn profile link','pp'),
        'std'         => '',
        'type'        => 'text',
        'section'     => 'pp_social_section',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),
      array(
        'id'          => 'pp_google_plus',
        'label'       => __('Google +','pp'),
        'desc'        => __('Your Google + profile link','pp'),
        'std'         => '',
        'type'        => 'text',
        'section'     => 'pp_social_section',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),
      array(
        'id'          => 'pp_pinterest',
        'label'       => __('Pinterest','pp'),
        'desc'        => __('Your Pinterest profile link','pp'),
        'std'         => '',
        'type'        => 'text',
        'section'     => 'pp_social_section',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),
  	array(
        'id'          => 'pp_dribbble',
        'label'       => __('Dribbble','pp'),
        'desc'        => __('Your Dribbble profile link','pp'),
        'std'         => '',
        'type'        => 'text',
        'section'     => 'pp_social_section',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),	  
      array(
        'id'          => 'pp_instagram',
        'label'       => __('Instagram','pp'),
        'desc'        => __('Your Instagram profile link','pp'),
        'std'         => '',
        'type'        => 'text',
        'section'     => 'pp_social_section',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),
 	 array(
        'id'          => 'pp_flickr',
        'label'       => __('Flickr','pp'),
        'desc'        => __('Your Flickr profile link','pp'),
        'std'         => '',
        'type'        => 'text',
        'section'     => 'pp_social_section',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),
	  array(
        'id'          => 'pp_tumblr',
        'label'       => __('Tumblr','pp'),
        'desc'        => __('Your Tumblr link','pp'),
        'std'         => '',
        'type'        => 'text',
        'section'     => 'pp_social_section',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),	  
	  array(
        'id'          => 'pp_github',
        'label'       => __('GitHub','pp'),
        'desc'        => __('Your GitHub link','pp'),
        'std'         => '',
        'type'        => 'text',
        'section'     => 'pp_social_section',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),	  	  	  	  	  	  	  
      array(
        'id'          => 'pp_background_set',
        'label'       => __('General background','pp'),
        'desc'        => '',
        'std'         => 'furley_bg',
        'type'        => 'radio-image',
        'section'     => 'pp_background_section',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),
      array(
        'id'          => 'pp_background',
        'label'       => __('Upload new image','pp'),
        'desc'        => __('Upload new tillable image (it will override the selection above).','pp'),
        'std'         => '',
        'type'        => 'upload',
        'section'     => 'pp_background_section',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),
      array(
        'id'          => 'pp_css',
        'label'       => __('Custom CSS','pp'),
        'desc'        => __('For example: <i>h1, h2, h3 { color:blue; }</i>','pp'),
        'std'         => '',
        'type'        => 'css',
        'section'     => 'pp_css_section',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      )
    )
  );
  
  /* allow settings to be filtered before saving */
  $custom_settings = apply_filters( 'option_tree_settings_args', $custom_settings );
  
  /* settings are not the same update the DB */
  if ( $saved_settings !== $custom_settings ) {
    update_option( 'option_tree_settings', $custom_settings ); 
  }
  
}