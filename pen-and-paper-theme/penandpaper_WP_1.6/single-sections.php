<?php
/* 
 Single post template used for displaying the home page section (used for preview only!)
*/
get_header(); ?>

<?php if(have_posts()) : while(have_posts()) : the_post();
	
		$section_title = get_post_meta($post->ID, 'home_title_meta', true); 
		$section_subtitle = get_post_meta($post->ID, 'home_subtitle_meta', true); 
		$stellar_ratio = get_post_meta($post->ID, 'home_bg_ratio_meta',  true);
		$section_bg_set = get_post_meta($post->ID, 'home_bg_set_meta', true);				
		$section_bg = get_post_meta($post->ID, 'home_bg_meta', true);	
		$section_bg_repeat = get_post_meta($post->ID, 'home_bg_repeat_meta', true); 
	?>

	<section id="<?php echo $post->post_name ?>" class="slide" data-stellar-background-ratio="<?php echo $stellar_ratio; ?>" <?php if ( $section_bg !='' ) { ?>style="background:url(<?php echo $section_bg; ?>) <?php echo $section_bg_repeat; ?>;"<?php } elseif ( $section_bg_set !='' ) { ?> style="background:url(<?php echo get_template_directory_uri(); ?>/lib/images/<?php echo $section_bg_set; ?>.png) <?php echo $section_bg_repeat; ?>;"<?php } ?>>
		
		<div class="container">
			<?php if ( $section_title != '' || $section_subtitle != '' ) { ?> 
				<hgroup>
					<?php if ( $section_title != '' ) { ?>
						<h1><?php echo do_shortcode($section_title); ?></h1>
					<?php } ?>
					<?php if ( $section_subtitle != '' ) { ?>
						<h2 class="curly_brackets"><span><?php echo do_shortcode($section_subtitle); ?></span></h2>
					<?php } ?>
				</hgroup> 
			<?php } ?> 
			<?php the_content(); ?>
		</div>
		
	</section>

<?php endwhile; endif; ?>
<?php get_footer(); ?>