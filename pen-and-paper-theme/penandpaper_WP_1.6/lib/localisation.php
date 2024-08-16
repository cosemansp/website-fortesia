<?php
/**
 * THEME LOCALISATION
 */

define('PP_THEME_PATH', get_template_directory());

load_theme_textdomain( 'pp', PP_THEME_PATH . '/lang' );

$locale = get_locale();

$locale_file = PP_THEME_PATH . "/lang/$locale.php";

if ( is_readable( $locale_file ) ) require_once( $locale_file );

?>