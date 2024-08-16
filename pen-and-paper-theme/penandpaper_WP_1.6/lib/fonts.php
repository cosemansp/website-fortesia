<?php
// 
// Based on Tutorial
// by Fouad Matin
// 
// http://wp.tutsplus.com/tutorials/changing-the-fonts-of-your-wordpress-site-part-2-theme-integration/
// 

add_action( 'admin_menu', 'my_fonts' );
function my_fonts() {
    add_theme_page( 'Fonts', 'Fonts Options', 'edit_theme_options', 'fonts', 'fonts' );
}
function fonts() {
?>
    <div class="wrap">
        <div><br></div>
        <h2>Fonts</h2>

        <form method="post" action="options.php">
            <?php wp_nonce_field( 'update-fonts' ); ?>
            <?php settings_fields( 'fonts' ); ?>
            <?php do_settings_sections( 'fonts' ); ?>
            <?php submit_button(); ?>
            </form>
        <img style="float:right; border:0;" src="http://i.imgur.com/1qqJG.png" />
    </div>
<?php
}

add_action( 'admin_init', 'my_register_admin_settings' );
function my_register_admin_settings() {
    register_setting( 'fonts', 'fonts' );
    add_settings_section( 'font_section', __('Font Options', 'pp'), 'font_description', 'fonts' );
    add_settings_field( 'body-font', __('Body Font','pp'), 'body_font_field', 'fonts', 'font_section' );
    add_settings_field( 'h-font', __('Headings Font', 'pp'), 'h_font_field', 'fonts', 'font_section' );
	add_settings_field( 'links-font', __('Links, subtitles, captions, and buttons Font', 'pp'), 'links_font_field', 'fonts', 'font_section' );
}
function font_description() {
    echo _e('Use the form below to change fonts of your theme.', 'pp');
}
function get_fonts() {
    $fonts = array(
        'arial' => array(
            'name' => 'Arial',
            'font' => '',
            'css' => "font-family: Arial, sans-serif;"
        ), 
		'bigelowrules' => array(
            'name' => 'Bigelow Rules',
            'font' => '@import url(http://fonts.googleapis.com/css?family=Bigelow+Rules);',
            'css' => "font-family: 'Bigelow Rules', sans-serif;"
        ),
		'clickerscript' => array(
            'name' => 'Clicker Script',
            'font' => '@import url(http://fonts.googleapis.com/css?family=Clicker+Script);',
            'css' => "font-family: 'Clicker Script', sans-serif;"
        ),	
		'cookie' => array(
            'name' => 'Cookie',
            'font' => '@import url(http://fonts.googleapis.com/css?family=Cookie);',
            'css' => "font-family: 'Cookie', serif;"
        ),							      
		'grandhotel' => array(
            'name' => 'Grand Hotel',
            'font' => '@import url(http://fonts.googleapis.com/css?family=Grand+Hotel);',
            'css' => "font-family: 'Grand Hotel', sans-serif;"
        ),
		'karla' => array(
            'name' => 'Karla',
            'font' => '@import url(http://fonts.googleapis.com/css?family=Karla);',
            'css' => "font-family: 'Karla', sans-serif;"
        ),
		'lustria' => array(
            'name' => 'Lustria',
            'font' => '@import url(http://fonts.googleapis.com/css?family=Lustria);',
            'css' => "font-family: 'Lustria', sans-serif;"
        ),
		'oranienbaum' => array(
            'name' => 'Oranienbaum',
            'font' => '@import url(http://fonts.googleapis.com/css?family=Oranienbaum);',
            'css' => "font-family: 'Oranienbaum', serif;"
        ),			
		'playfairdisplay' => array(
            'name' => 'Playfair Display',
            'font' => '@import url(http://fonts.googleapis.com/css?family=Playfair+Display:400,400italic);',
            'css' => "font-family: 'Playfair Display', serif; font-style:normal; "
        ),
		'playfairdisplayitalic' => array(
            'name' => 'Playfair Display Italic',
            'font' => '',
            'css' => "font-family: 'Playfair Display', serif; font-style: italic;"
        ),
		'sevillana' => array(
            'name' => 'Sevillana',
            'font' => '@import url(http://fonts.googleapis.com/css?family=Sevillana);',
            'css' => "font-family: 'Sevillana', serif;"
        ),							       
		'textmeone' => array(
            'name' => 'Text Me One',
            'font' => '@import url(http://fonts.googleapis.com/css?family=Text+Me+One);',
            'css' => "font-family: 'Text Me One', sans-serif;"
        )				
    );



    return apply_filters( 'get_fonts', $fonts );
}
function body_font_field() {
    $options = (array) get_option( 'fonts' );
    $fonts = get_fonts();
    $current = 'playfairdisplay';

    if ( isset( $options['body-font'] ) )
        $current = $options['body-font'];
    ?>
        <select name="fonts[body-font]">
        <?php foreach( $fonts as $key => $font ): ?>
            <option <?php if($key == $current) echo "SELECTED"; ?> value="<?php echo $key; ?>"><?php echo $font['name']; ?></option>
        <?php endforeach; ?>
        </select>
    <?php
}
function h_font_field() {
    $options = (array) get_option( 'fonts' );
    $fonts = get_fonts();
    $current = 'oranienbaum';

    if ( isset( $options['h-font'] ) )
        $current = $options['h-font'];

    ?>
        <select name="fonts[h-font]">
        <?php foreach( $fonts as $key => $font ): ?>
            <option <?php if($key == $current) echo "SELECTED"; ?> value="<?php echo $key; ?>"><?php echo $font['name']; ?></option>
        <?php endforeach; ?>
        </select>
    <?php
}
function links_font_field() {
    $options = (array) get_option( 'fonts' );
    $fonts = get_fonts();
    $current = 'playfairdisplayitalic';

    if ( isset( $options['links-font'] ) )
        $current = $options['links-font'];
    ?>
        <select name="fonts[links-font]">
        <?php foreach( $fonts as $key => $font ): ?>
            <option <?php if($key == $current) echo "SELECTED"; ?> value="<?php echo $key; ?>"><?php echo $font['name']; ?></option>
        <?php endforeach; ?>
        </select>
    <?php
}

add_action( 'wp_head', 'font_head' );
function font_head() {
    $options = (array) get_option( 'fonts' );
    $fonts = get_fonts();
	
    $h_key = 'oranienbaum';

    if ( isset( $options['h-font'] ) )
        $h_key = $options['h-font'];

    if ( isset( $fonts[ $h_key ] ) ) {
        $h_key = $fonts[ $h_key ];

        echo '<style>';
        echo $h_key['font'];
        echo 'h1, h2, h3, h4, h5, h6, th, table caption, h1 > a, h2 > a, h3 > a, h4 > a, h5 > a, h6 > a  { ' . $h_key['css'] . ' } ';

        echo '</style>';
    }
	
 	$links_key = 'playfairdisplayitalic';

    if ( isset( $options['links-font'] ) )
        $links_key = $options['links-font'];

    if ( isset( $fonts[ $links_key ] ) ) {
        $links_key = $fonts[ $links_key ];

        echo '<style>';
        echo $links_key['font'];
        echo 'a, input[type=submit], input[type=button], button, .button, figcaption, blockquote, .flex-caption, .caption p, div.tooltip, .wp-caption-text, .logged-in-as, hgroup > h2, .wpcf7-not-valid-tip, .wpcf7-response-output, .curly_brackets span  { ' . $links_key['css'] . ' } ';

        echo '</style>';
    }	
	
    $body_key = 'playfairdisplay';

    if ( isset( $options['body-font'] ) )
        $body_key = $options['body-font'];

    if ( isset( $fonts[ $body_key ] ) ) {
        $body_font = $fonts[ $body_key ];

        echo '<style>';
        echo $body_font['font'];
        echo 'body, hgroup > h2, #cancel-comment-reply-link, .curly_brackets span:before, .curly_brackets span:after, .navigation li a  { ' . $body_font['css'] . ' } ';
        echo '</style>';
    }

	
}
?>