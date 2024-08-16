<?php
/**
 * The single post template for displaying authors about section (used for preview only!)
 */
get_header(); ?>

<!-- MAIN PAGE CONTENT START -->   
<section class="page">
    <div class="container"> 

        <!-- author's name  -->
        <hgroup>
            <h2 class="curly_brackets"><span><?php the_title(); ?></span></h2>
        </hgroup>   
        <!-- /author's name --> 
        
        <div class="separator"></div>
        
        <!-- panes start -->
        <div class="panes">
        
            <?php	
                if (have_posts()) : while (have_posts()) : the_post(); 	
                $author_caption = get_post_meta($post->ID, 'authors_caption_meta', true); 
            ?>
              
            <!-- author pane start -->
            <div>
                <figure class="eight columns">
                    <?php if ( has_post_thumbnail() ) { ?>
                        <div class="styled">
                          <?php the_post_thumbnail('author-thumbnail'); ?>
                        </div>
                    <?php } else { ?>
                          <div class="styled">
                              <?php echo '<img src=" ' . get_template_directory_uri() . '/lib/images/photos/author.png" alt="' . get_the_title() . '" />'; ?>
                          </div>
                    <?php } ?>
                    
                    <?php if ( $author_caption !='' ) { ?>
                          <figcaption><?php echo $author_caption; ?></figcaption>
                    <?php } ?>
                </figure>
                
                <div class="eight columns">
                    <h3><?php the_title(); ?></h3>
                    <?php the_content(); ?>
                </div>  
            </div>
            <!-- author pane end --> 
            
            <?php endwhile; endif; ?>  
            
        </div>   
        <!-- panes end -->

    </div>    
</section> 
<!-- MAIN PAGE CONTENT END --> 

<?php get_footer(); ?>