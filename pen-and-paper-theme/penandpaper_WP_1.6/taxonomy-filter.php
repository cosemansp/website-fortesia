<?php
/**
 * The template for displaying a portfolio category
 */
get_header(); ?>

<!-- MAIN PAGE CONTENT START -->   
<section class="page">
    <div class="container">
 
		<?php $portfolio_query = new WP_Query(array( 'post_type' => 'portfolio_type', 'filter' => get_queried_object()->slug, 'posts_per_page' =>'-1') ); ?>
    
        <hgroup>
            <h1><?php echo get_queried_object()->name; ?></h1>
        </hgroup> 
        
        <div class="portfolio_container">
        
            <div class="separator"></div> 
                
            <?php if ( $portfolio_query->have_posts() ) : ?>
                <!-- portfolio preview start // fullsize images, captions and controls will be rendered here -->
                <div class="portfolio_preview clearfix">
                    <div class="contols_container clearfix"> 
                        <div class="controls"></div>
                    </div>
                    <div class="slideshow_container sixteen columns clearfix"> 
                        <div class="loading"></div>
                        <div class="slideshow styled"></div>
                        <div class="caption eleven columns clearfix"></div>
                    </div>
                </div> 
                <!-- portfolio preview end -->  
            <?php endif; ?>  
                    
            <!-- portfolio thumbnails start -->                       
            <div class="thumbs_container"> 
                <ul class="thumbs clearfix">
                                
                    <?php if ($portfolio_query->have_posts()) : while ($portfolio_query->have_posts()) : $portfolio_query->the_post();
                    
                            global $post;			
                            $terms = get_the_terms( get_the_ID(), 'filter' ); // Get The Taxonomy 'Filter' Categories
                            $large_image =  wp_get_attachment_image_src( get_post_thumbnail_id(get_the_ID()), 'portfolio-large', false, '' ); 
                            $large_image = $large_image[0];
                            $portfolio_meta_box = get_post_meta($post->ID, 'portfolio_caption_meta', true);
                        ?>
                
                        <li class="one-third column">
                            <?php if ( has_post_thumbnail() ) { ?>
                                <a class="thumb styled colorbox-off" href="<?php echo $large_image ?>" title="<?php the_title(); ?>">
                                    <?php the_post_thumbnail('portfolio-thumbnail', array('title' => '')); ?>
                                </a>
                            <?php } else { ?>
                                <a class="thumb styled colorbox-off" href="<?php echo get_template_directory_uri() . '/lib/images/photos/portfolio_full.png' ?>" title="<?php the_title(); ?>">
                                    <?php echo '<img src=" ' . get_template_directory_uri() . '/lib/images/photos/portfolio_thumb.png" alt="' . get_the_title() . '" />'; ?>
                                </a>               
                            <?php } ?>	
                            <div class="caption">
                                <h3><?php the_title(); ?></h3>
                                <?php if($portfolio_meta_box != '') { ?>
                                    <p><?php echo do_shortcode($portfolio_meta_box); ?></p>
                                <?php } ?>
                            </div>
                        </li>
                
                    <?php endwhile; endif; // END the Wordpress Loop ?>
                            
                </ul>
            </div>
            <!-- portfolio thumbnails end -->
                
        </div>
    </div>    
</section> 
<!-- MAIN PAGE CONTENT END -->  
<?php get_footer(); ?>