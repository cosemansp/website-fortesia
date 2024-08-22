<?php
/**
Template Name: Page with sidebar
 */
get_header();

$page_title = get_post_meta($post->ID, 'page_title_meta', true); 
$page_subtitle = get_post_meta($post->ID, 'page_subtitle_meta', true); 
?>
    
<!-- MAIN PAGE CONTENT START -->   
<section class="page">
    <div class="container"> 
        
        <section class="two-thirds column">
        
            <?php if(have_posts()) : while(have_posts()) : the_post(); ?>
        
                <?php if ( $page_title != '' || $page_subtitle != '' ) { ?> 
                    <hgroup>
                        <?php if ( $page_title != '' ) { ?>
                            <h1><?php echo $page_title; ?></h1>
                        <?php } ?>
                        <?php if ( $page_subtitle != '' ) { ?>
                            <h2 class="curly_brackets"><span><?php echo $page_subtitle; ?></span></h2>
                        <?php } ?>
                    </hgroup>
                <?php } ?>    
                     
                <?php the_content(); ?>
                <?php wp_link_pages('before=<p class="aligncenter link_pages">&after=</p>&pagelink=Page %'); ?>
                                    
            <?php endwhile; else : ?>
            
                <hgroup>
                    <h1><?php _e('Not found', 'pp'); ?></h1>
                    <h2 class="curly_brackets"><span><?php _e("Sorry, we can't find that.", 'pp'); ?></span></h2> 
                </hgroup>
                    
            <?php endif; ?>
            
        </section>
        
        <?php get_sidebar(); ?>  
    </div>    
</section> 
<!-- MAIN PAGE CONTENT END -->   
        
<?php get_footer(); ?>