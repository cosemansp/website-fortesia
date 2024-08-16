<?php
/**
 * OptionTree settings filters
 */
  
function filter_ot_recognized_font_families( $array, $field_id ) {
  
  /* only run the filter when the field ID is my_google_fonts_headings */
  if ( $field_id == 'pp_body_font' ) {
    $array = array(
      'sans-serif'    => 'sans-serif',
      'open-sans'     => '"Open Sans", sans-serif',
      'droid-sans'    => '"Droid Sans", sans-serif'
    );
  }
  
  return $array;
  
}
add_filter( 'ot_recognized_font_families', 'filter_ot_recognized_font_families', 10, 2 ); 


/* display custom backgrounds set */
function filter_radio_images( $array, $field_id ) {
  
  if ( $field_id == 'pp_background_set' || $field_id == 'home_bg_set_meta' ) {
    $array = array(
      array(
        'value'   => 'debut_light',
        'label'   => __( 'Debut light', 'pp' ),
        'src'     => PP_THEME_DIR . '/lib/images/bg_preview/debut_light.png'
      ),
      array(
        'value'   => 'diamond_upholstery',
        'label'   => __( 'Diamond upholstery', 'pp' ),
        'src'     => PP_THEME_DIR . '/lib/images/bg_preview/diamond_upholstery.png'
      ),
      array(
        'value'   => 'extra_clean_paper',
        'label'   => __( 'Extra clean paper', 'pp' ),
        'src'     => PP_THEME_DIR . '/lib/images/bg_preview/extra_clean_paper.png'
      ),
      array(
        'value'   => 'furley_bg',
        'label'   => __( 'Furley', 'pp' ),
        'src'     => PP_THEME_DIR . '/lib/images/bg_preview/furley_bg.png'
      ),
      array(
        'value'   => 'gray_jean',
        'label'   => __( 'Gray jean', 'pp' ),
        'src'     => PP_THEME_DIR . '/lib/images/bg_preview/gray_jean.png'
      ),
      array(
        'value'   => 'grey',
        'label'   => __( 'Grey', 'pp' ),
        'src'     => PP_THEME_DIR . '/lib/images/bg_preview/grey.png'
      ),
      array(
        'value'   => 'linedpaper',
        'label'   => __( 'Line paper', 'pp' ),
        'src'     => PP_THEME_DIR . '/lib/images/bg_preview/linedpaper.png'
      ),
      array(
        'value'   => 'noisy_grid',
        'label'   => __( 'Noisy grid', 'pp' ),
        'src'     => PP_THEME_DIR . '/lib/images/bg_preview/noisy_grid.png'
      ),
      array(
        'value'   => 'subtle_dots',
        'label'   => __( 'Subtle dots', 'pp' ),
        'src'     => PP_THEME_DIR . '/lib/images/bg_preview/subtle_dots.png'
      ),
      array(
        'value'   => 'tiny_grid',
        'label'   => __( 'Tiny grid', 'pp' ),
        'src'     => PP_THEME_DIR . '/lib/images/bg_preview/tiny_grid.png'
      ),
      array(
        'value'   => '',
        'label'   => __( 'None', 'pp' ),
        'src'     => PP_THEME_DIR . '/lib/images/bg_preview/none.png'
      )
    );
  }
  
  return $array;
  
}
add_filter( 'ot_radio_images', 'filter_radio_images', 10, 2 );

?>