<?php
/**
 * Meta data for blog headings
 */
?>
    
<?php if ( !is_single()  && !is_search() ) { ?>
   <hgroup>
		<h1>
			<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
				<?php the_title(); ?>
			</a>
		</h1>
		<h2 class="curly_brackets"><span><?php _e('Posted by', 'pp'); ?> <?php the_author_posts_link(); ?> <?php _e('on', 'pp'); ?> <?php the_time('M d Y'); ?></span></h2>
	</hgroup>
	
	<?php if (has_post_thumbnail() ) { ?>
    	<div class="feat_img styled">	
            <a href="<?php the_permalink(); ?>">
                <?php the_post_thumbnail('blog-thumbnail'); ?>
            </a>   
    	</div>
	<?php } ?> 
        
<?php } elseif ( is_search() ) { ?>

	<hgroup>
		<h2>
			<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
				<?php the_title(); ?>
			</a>
		</h2>
    </hgroup>
            	   
<?php } else { ?>

	<hgroup>
		<h1><?php the_title(); ?></h1>
		<h2 class="curly_brackets"><span><?php _e('Posted by', 'pp'); ?> <?php the_author_posts_link(); ?> <?php _e('on', 'pp'); ?> <?php the_time('M d Y'); ?>, <?php _e('in', 'pp'); ?> <?php the_category(', '); ?></span></h2>
	</hgroup>
    
 	<?php if (has_post_thumbnail() ) { ?>
    	<div class="feat_img styled">	
        	<?php the_post_thumbnail('blog-thumbnail'); ?>
    	</div>
	<?php } ?>
	        
<?php } ?> 

<?php if ( !is_search() && !has_post_thumbnail() ) { ?>
	<div class="separator"></div> 
<?php } ?>