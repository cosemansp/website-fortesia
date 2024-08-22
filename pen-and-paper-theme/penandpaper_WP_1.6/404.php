<?php
/**
 * The template for displaying 404 pages (Not Found).
 */
get_header(); ?>
    
<section class="page">
	<div class="container">

			<hgroup>
                <h1><?php _e('404 - Page not found', 'pp'); ?></h1>
                <h2 class="curly_brackets">
					<span><?php _e("Sorry, the page you're looking for has gotten lost!", 'pp'); ?></span>
                </h2>
			</hgroup>
            
            <div class="separator"></div>
                                    
            <div class="eight columns offset-by-four">
            	<?php get_search_form(); ?>
            </div>

    </div>
</section> 
          
<?php get_footer(); ?>