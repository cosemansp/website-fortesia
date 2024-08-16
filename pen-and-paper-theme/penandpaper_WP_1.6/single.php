<?php
/**
 * The Template for displaying all single posts inside blog.
 */
get_header(); ?>
       
<section class="page">
    <div class="container">

       <!--BLOG POSTS SECTION START-->
       <section id="blog_content" class="two-thirds column">

          <article <?php post_class('single_post'); ?>>
              <?php if(have_posts()) : while(have_posts()) : the_post(); ?>
              
                  <?php get_template_part( 'metadata-blog' ); // get blog metadata ?>
                  <?php the_content(); ?>
                  <?php wp_link_pages('before=<p class="aligncenter link_pages">&after=</p>&pagelink=Page %'); ?>
                  <div class="post_tags aligncenter">
                    <?php the_tags('<i class="icon-tags"></i>'); ?>
                  </div>
                  
               <?php endwhile; else : ?>
                  
                    <hgroup class="sixteen columns">		
                        <h1><?php _e('Not found', 'pp'); ?></h1>
                        <h2 class="curly_brackets"><span><?php _e("Sorry, we can't find that.", 'pp'); ?></span></h2> 
                    </hgroup>		                             
                      
               <?php endif; ?>
                                                                
                  <div id="comments">
                      <?php comments_template(); ?>   
                  </div>
               </article>
                                      
               <nav>
                  <ul class="pages">
                      <li class="prev_post" title="<?php _e('Previous post', 'pp') ?>">
                          <?php previous_post_link('%link', __('&larr; Previous post', 'pp'), ''); ?>
                      </li>  
                      
                      <li class="next_post" title="<?php _e('Next post', 'pp') ?>">
                          <?php next_post_link('%link', __('Next post &rarr;', 'pp'), ''); ?>
                      </li>
                  </ul> 
               </nav> 
          
         </section>
         
        <?php get_sidebar(); ?>
        <!--BLOG ENDS HERE-->             
    </div>
</section>
        
<?php get_footer(); ?>