<?php
/**
 * The template for displaying portfolio items.
 * It can be loaded by placing [portfolio category=""] shortcode inside your page.
 * If the category is not specified, all posts will be shown.
 */

global $category;
$portfolio_query = new WP_Query(array( 'post_type' => 'portfolio_type', 'filter' => $category, 'posts_per_page' =>'-1') ); ?>

<?php if ( $portfolio_query->have_posts() && (term_exists(sanitize_title($category), 'filter') || $category =='')) : ?>
	<div class="portfolio_container">

        <!-- portfolio filters start --> 
        <?php if ( ot_get_option('pp_filtering', '', false, true, 0 ) && $category =='') { ?>
            <ul class="filter portfolio_toggle curly_brackets">
                <li class="active"><a href="javascript:void(0)" class="all">All</a></li>
                
                <?php
                    global $terms, $args, $post;
                    $terms = get_terms('filter', $args); // Get the taxonomy
                    $count = count($terms);  // set a count to the amount of categories in our taxonomy
                    $i=0; // set a count value to 0
                    
                    if ($count > 0) { // test if the count has any categories
                        foreach ($terms as $term) { // break each of the categories into individual elements
                            
                            $i++; // increase the count by 1
                            
                            // rewrite the output for each category
                            if (!isset($term_list)) $term_list = '';
                            $term_list .= '<li><a href="javascript:void(0)" class="'. $term->slug .'">' . $term->name . '</a></li>';
                            
                            // if count is equal to i then output blank
                            if ($count != $i) {
                                $term_list .= '';
                            } else {
                                $term_list .= '';
                            }
                        }
                        
                        echo $term_list; // print out each of the categories in our new format
                    }
                ?>
            </ul>
        <?php } ?>
        <!-- portfolio filters end --> 
        
        <div class="separator"></div> 
    
        <!-- portfolio preview start // fullsize images, captions and controls will be rendered here -->
        <div class="portfolio_preview clearfix">
            <div class="contols_container clearfix"> 
                <div class="controls"></div>
            </div>
            <div class="slideshow_container sixteen columns clearfix"> 
                <div class="loading"></div>
                <div id="slideshow" class="slideshow styled"></div>
                <div class="caption eleven columns clearfix"></div>
            </div>
        </div> 
        <!-- portfolio preview end -->   
    
        <!-- portfolio thumbnails start -->           
        <div class="thumbs_container"> 
            <ul class="thumbs clearfix">
                
                <?php if ($portfolio_query->have_posts()) : while ($portfolio_query->have_posts()) : $portfolio_query->the_post();
                    
						global $count, $post;			
						$terms = get_the_terms( get_the_ID(), 'filter' ); // Get The Taxonomy 'Filter' Categories
						$large_image =  wp_get_attachment_image_src( get_post_thumbnail_id(get_the_ID()), 'portfolio-large', false, '' ); 
						$large_image = $large_image[0];
						$portfolio_meta_box = get_post_meta($post->ID, 'portfolio_caption_meta', true);
					?>
            
                    <li class="one-third column" data-id="id-<?php echo $count; ?>" data-type="<?php if ($terms != '') foreach ($terms as $term) { echo strtolower(preg_replace('/\s+/', '-', $term->slug)). ' '; } ?>">
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
            
                <?php $count++; // Increase the count by 1 ?>		
                <?php endwhile; endif; // END the Wordpress Loop ?>
                        
            </ul>
        </div>
        <!-- portfolio thumbnails end -->
	</div>
<?php endif; ?>