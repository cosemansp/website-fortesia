<?php
/**
 * The main template - used for displaying Blog index page.
 */
get_header(); ?>

<section class="page">
	<div class="container">

         <!--BLOG POSTS SECTION START-->
         <section id="blog_content" class="two-thirds column">
    
            <?php if(have_posts()) : while(have_posts()) : the_post(); ?>
                <article <?php post_class('index'); ?>>
                    <?php get_template_part( 'metadata-blog' ); // get blog metadata ?>
                    <div class="blog_text">	
                         <?php the_content(__('Continue reading...', 'pp')); ?>
                    </div> <!--/blog_text-->
                </article> <!--/article-->  
            <?php endwhile; else : ?>
                <h1><?php _e('No posts yet!', 'pp'); ?></h1>
                <div class="separator"></div>
            <?php endif; ?>
            
            <?php get_template_part( 'paged-nav' ) // load numbered page navigation ?>
            
        </section>
        <!--BLOG ENDS HERE-->               
            
        <?php get_sidebar(); ?>
    </div>
</section> 
      
<?php get_footer(); ?>