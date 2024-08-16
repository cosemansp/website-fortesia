<?php
/**
 * The template for displaying Comments.
 */
?>

<?php
	if (!empty($_SERVER['SCRIPT_FILENAME']) && 'comments.php' == basename($_SERVER['SCRIPT_FILENAME']))
		die ('Please do not load this page directly. Thanks!'); 
?>

<?php if ( post_password_required() ) : ?>
	
    <p><?php _e( 'This post is password protected. Enter the password to view any comments.', 'pp' ); ?></p>		

<?php
		/* Stop the rest of comments.php from being processed,
		 * but don't kill the script entirely -- we still have
		 * to fully load the template.
		 */
		return;
	endif;
?>

<?php if ( have_comments() ) : ?>

	<h2><?php _e('Comments', 'pp'); ?></h2>
    <div class="separator"></div>
    
    <ul class="commentlist">
    	<?php wp_list_comments('type=comment&callback=mytheme_comment'); ?>
    </ul>
        
    <nav>
    	<ul class="pages">
            <li class="left">
                <?php previous_comments_link(); ?>
            </li>
            
            <li class="right">
                <?php next_comments_link(); ?>
            </li>
        </ul>
    </nav>  
        
    <?php if  (pings_open()) : ?> 
                    
        <h2><?php _e('Trackbacks and Pingbacks', 'pp'); ?></h2>
    	<div class="separator"></div>
        
        <br class="clear"/>
        <ul class="commentlist">
            <?php wp_list_comments('type=pings&callback=mytheme_comment'); ?>
        </ul>
    
    <?php endif;  endif;  ?>
        
<?php if ($post->comment_status == 'open') : ?>
        
	<?php if ( get_option('comment_registration') && !$user_ID ) : ?>
    
		<p>
			<?php _e('You must be', 'pp'); ?>
            <a href="<?php echo home_url(); ?>/wp-login.php?redirect_to=<?php the_permalink(); ?>">
				<?php _e('logged in', 'pp'); ?>
            </a> 
			<?php _e('to post a comment.', 'pp'); ?>
        </p>
        
	<?php else : ?>
                                       
	<?php comment_form(array('comment_notes_before' => '<br class="clear" />', 'comment_notes_after' => '', 'title_reply' => __('Reply', 'pp'), 'label_submit' => __('Post Reply', 'pp'),'cancel_reply_link' => "<i class='icon-remove'></i>", 'comment_notes_before' => "<div class='separator'></div>")); ?> 
                          
<?php endif; endif; ?>