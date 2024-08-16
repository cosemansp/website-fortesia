<?php
/**
 * The template for displaying Search Results pages.
 */
get_header(); ?>

<section class="page">
	<div class="container">

         <!--BLOG POSTS SECTION START-->
         <section id="blog_content" class="two-thirds column">
         
         	<header>
                <h1><?php _e('Results for', 'pp'); ?> '<?php echo($s); ?>'.</h1>
                <div class="separator"></div> 
            </header>
                     
            <?php if(have_posts()) : while(have_posts()) : the_post(); ?>
                <article <?php post_class('search_results'); ?>>
					<?php get_template_part( 'metadata-blog' ); // get blog metadata ?>
                    <div class="blog_text">	
                        <?php the_excerpt(); ?>
                    </div>
                </article> 
			<?php endwhile; else : ?>
                <h2><?php _e('Not found', 'pp'); ?></h2>
                <p><?php _e("Sorry, we can't find that.", 'pp'); ?></p>  
            <?php endif; ?>           
                            
 			<?php get_template_part( 'paged-nav' ) // load numbered page navigation ?>
                   
        </section>
        <!--BLOG ENDS HERE-->               
            
    	<?php get_sidebar(); ?>
    </div>
</section> 
        
<?php get_footer(); ?>