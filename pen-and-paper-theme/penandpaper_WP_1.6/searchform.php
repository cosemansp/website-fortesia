<?php
/**
 * The template for displaying search form
 */
global $s; ?>

<form class="search" method="get" id="searchform" action="<?php echo home_url(); ?>">
    <input type="text" value="<?php echo esc_html($s, 1); ?>" name="s" id="s" size="15" />
    <div class="magn_glass">
        <i class="icon-search"></i>
    </div>
</form>