<?php
/**
 * The Header for our theme. Displays <head> and <header> sections
 */
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta http-equiv="Content-Type" content="<?php bloginfo('html_type') ?>; charset=<?php bloginfo('charset'); ?>" />
<meta name="generator" content="WordPress <?php bloginfo('version'); ?>" />
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title><?php 
	if(is_home()) {
		echo bloginfo('name');
	} else
		bloginfo('name'); wp_title('-', true, '');
?></title>

<link rel="stylesheet" href="<?php echo get_stylesheet_uri(); ?>" media="screen" /> 
<link rel="alternate" type="application/rss+xml" title="RSS 2.0" href="<?php bloginfo('rss2_url'); ?>" />
<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
<?php if ( ot_get_option( 'pp_favicon' ) !='' ) { ?>
	<link rel="shortcut icon" href="<?php echo ot_get_option( 'pp_favicon' ) ; ?>" />
<?php } ?>

<!--[if lt IE 9]>
    <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    
 	<style>
	.curly_brackets span:before, .curly_brackets li:first-child:before  { content:""; }
	.curly_brackets span { padding-left:0; padding-right:0; }
	ul.curly_brackets li:first-child { padding-left:0;  }
    .feat_img img, .gallery-icon img { width:auto; }
    .sub-menu { display:none; }
    .navigation li:hover > .sub-menu { display: block; position:absolute;  }
	</style>   
<![endif]--> 

<!-- load custom css code start -->
<style type="text/css">
	<?php if ( ot_get_option( 'pp_background' ) !='' ) { ?>
		body { background: url(<?php echo ot_get_option( 'pp_background' ) ?>) fixed; }
	<?php } else { ?>
		body { background: url(<?php echo get_template_directory_uri(); ?>/lib/images/<?php echo ot_get_option( 'pp_background_set' ) ?>.png) fixed; }
	<?php } ?>
	<?php echo ot_get_option( 'pp_css' ) ; ?>
</style>
<!-- load custom css code end -->

<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

	<!-- HEADER START -->
    <header>
    	<div class="container">
            
            <!-- logo start -->
            <?php if( ot_get_option( 'pp_logo_img' ) =='') { ?>
            	<h1 class="five columns" id="logo"><?php echo get_bloginfo('name'); ?></h1>
             <?php } else { ?>
                <div class="five columns">
                    <img id="logo_img" src="<?php echo ot_get_option( 'pp_logo_img' ) ?>" alt="<?php echo get_bloginfo('name'); ?>"/>
                    <br />
                </div>           
            <?php } ?>
            <!-- logo end -->
            
            <!-- navigation start -->            
			<?php if(function_exists('wp_nav_menu')):
				wp_nav_menu(
					array(
					'theme_location' => 'primary_nav',
					'menu_class' => 'navigation',						
					'container' =>'nav',
					'container_class' => 'eleven columns' )
				);
            endif; ?>     
            <!--navigation end -->           
                                                     
    	</div>  
    </header>
    <!-- HEADER END -->