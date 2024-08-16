<?php
/**
 * The template for displaying the footer.
 * Contains <footer> section, some scripts, and the closing body and html tags
 */
?>
<!-- FOOOTER START -->
<footer>
    <div class="container">

        <div class="seven columns">
            <p id="copyright_info"><?php echo ot_get_option( 'pp_copyright' ); ?></p>
        </div>
        
        <div class="nine columns">
            <ul id="social_icons">
            
                <?php if( ot_get_option( 'pp_twitter' ) !='') { ?>
                    <li><a href="<?php echo ot_get_option( 'pp_twitter' ) ; ?>" title="<?php _e('Twitter', 'pp'); ?>"><i class="icon-twitter"></i></a></li>
                <?php } 
                
                if( ot_get_option( 'pp_facebook' ) !='') { ?>
                    <li><a href="<?php echo ot_get_option( 'pp_facebook' ) ; ?>" title="<?php _e('Facebook', 'pp'); ?>"><i class="icon-facebook-sign"></i></a></li>
                <?php } 

                if( ot_get_option( 'pp_linkedin' ) !='') { ?>
                    <li><a href="<?php echo ot_get_option( 'pp_linkedin' ) ; ?>" title="<?php _e('LinkedIn', 'pp'); ?>"><i class="icon-linkedin-sign"></i></a></li>
                <?php }

                if( ot_get_option( 'pp_google_plus' ) !='') { ?>
                    <li><a href="<?php echo ot_get_option( 'pp_google_plus' ) ; ?>" title="<?php _e('Google +', 'pp'); ?>"><i class="icon-google-plus-sign"></i></a></li>
                <?php }

                if( ot_get_option( 'pp_pinterest' ) !='') { ?>
                    <li><a href="<?php echo ot_get_option( 'pp_pinterest' ) ; ?>" title="<?php _e('Pinterest', 'pp'); ?>"><i class="icon-pinterest-sign"></i></a></li>
                <?php }
				
                if( ot_get_option( 'pp_dribbble' ) !='') { ?>
                    <li><a href="<?php echo ot_get_option( 'pp_dribbble' ) ; ?>" title="<?php _e('Dribbble', 'pp'); ?>"><i class="icon-dribbble"></i></a></li>
                <?php }	
				
                if( ot_get_option( 'pp_instagram' ) !='') { ?>
                    <li><a href="<?php echo ot_get_option( 'pp_instagram' ) ; ?>" title="<?php _e('Instagram', 'pp'); ?>"><i class="icon-instagram"></i></a></li>
                <?php }	
				
                if( ot_get_option( 'pp_flickr' ) !='') { ?>
                    <li><a href="<?php echo ot_get_option( 'pp_flickr' ) ; ?>" title="<?php _e('Flickr', 'pp'); ?>"><i class="icon-flickr"></i></a></li>
                <?php }
				
                if( ot_get_option( 'pp_tumblr' ) !='') { ?>
                    <li><a href="<?php echo ot_get_option( 'pp_tumblr' ) ; ?>" title="<?php _e('Tumblr', 'pp'); ?>"><i class="icon-tumblr-sign"></i></a></li>
                <?php }	
				
                if( ot_get_option( 'pp_github' ) !='') { ?>
                    <li><a href="<?php echo ot_get_option( 'pp_github' ) ; ?>" title="<?php _e('GitHub', 'pp'); ?>"><i class="icon-github-sign"></i></a></li>
                <?php }																

                if(ot_get_option('pp_rss_feed', '', false, true, 0 )) { ?>
                    <li><a href="<?php bloginfo('rss2_url'); ?>" title="<?php _e('RSS Feed', 'pp'); ?>"><i class="icon-rss"></i></a></li>  
                <?php } ?>
                

             </ul>  
        </div>
    
    </div>
</footer>
<!-- FOOTER END -->

<!-- custom nav start -->    
<?php if ( !is_page_template('homepage.php')) { ?>
    <script>
        jQuery(document).ready(function($) {
            $('ul.navigation>li.menu-item-type-custom>a').each( function() {
                var url = $(this).attr('href');
                $(this).attr('href', '<?php echo home_url(); ?>' + '/' + url);
            });
        })
    </script>
<?php } ?> 
<!-- custom nav end -->    

<!-- parallax loading start -->    
<?php if ( is_page_template('homepage.php') && ot_get_option('pp_parallax', '', false, true, 0 )) { ?>
  <script>
      jQuery(document).ready(function($) {
            $(window).stellar();
      })	
  </script>				
<?php } ?>
<!-- parallax loading end -->  

<?php wp_footer(); ?> 
</body>
</html>