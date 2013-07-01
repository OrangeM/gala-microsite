<?php
/**
 * Include template used for share block in sidebar.
 *
 * @package WordPress
 * @subpackage Samasource
 */
?>


<span class="header uppercase oswald">share with <b>a colleague</b></span>
<div class="social">
    <span class='st_facebook_large icon facebook_sidebar' st_title='<?php the_title(); ?>' st_url='<?php the_permalink(); ?>' displayText='facebook'></span>
    <span class='st_twitter_large icon twitter_sidebar' st_via="samasource" st_title='<?php the_title(); ?>' st_url='<?php the_permalink(); ?>' displayText='twitter'></span>
    <span class='st_linkedin_large icon linkedin_sidebar' st_title='<?php the_title(); ?>' st_url='<?php the_permalink(); ?>' displayText='linkedin'></span>
    <span class='st_plusone_large icon google_plus_sidebar' st_title='<?php the_title(); ?>' st_url='<?php the_permalink(); ?>' displayText='plusone'></span>
    <span class='st_sharethis_large icon sharethis_sidebar' st_title='<?php the_title(); ?>' st_url='<?php the_permalink(); ?>' displayText='sharethis'></span>
    <!--
    <a href="<?php echo get_option('facebook_url'); ?>" target="_blank" class="icon facebook_sidebar"><span></span></a>
    <a href="<?php echo get_option('twitter_url'); ?>" target="_blank" class="icon twitter_sidebar"><span></span></a>
    <a href="<?php echo get_option('linkedin_url'); ?>" target="_blank" class="icon linkedin_sidebar"><span></span></a>
    <a href="<?php echo get_option('google_plus_url'); ?>" target="_blank" class="icon google_plus_sidebar"><span></span></a>
    <a href="#" class="icon sharethis_sidebar"><span></span></a>
    -->
    <div class="clear"></div>
</div>
