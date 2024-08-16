<?php
/**
 * The template for displaying Archive pages.
 */
get_header(); ?>
   
<section class="page">
	<div class="container">
    
         <!--BLOG POSTS SECTION START-->
         <section id="blog_content" class="two-thirds column">
			<article <?php post_class(); ?>>
                 
                <hgroup>            
                    <h1><?php _e('Archive', 'pp'); ?></h1>
                    <h2 class="curly_brackets"><span><?php wp_title(' ', true, ' '); ?></span></h2>
                </hgroup>
                
                <div class="separator"></div> 

                <ul>
                    <?php if(have_posts()) : while(have_posts()) : the_post(); ?>
                        <li>
                            <i class="icon-ok"></i>
                            <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
                                <?php the_title(); ?>
                            </a>
                        </li>
                    <?php endwhile; ?>
                </ul>
                                                                   
				<?php else : ?>
                    <h1><?php _e('Not found', 'pp'); ?></h1>
                    <p><?php _e("Sorry, we can't find that.", 'pp'); ?></p> 
                <?php endif; ?>
                
                <br class="clear"/>
  				<?php get_template_part( 'paged-nav' ) // load numbered page navigation ?>
                    
			</article>
        </section>
        <!--BLOG ENDS HERE-->
        
        <?php get_sidebar(); ?>
                   
    </div>
</section> 
        
<?php get_footer(); ?>