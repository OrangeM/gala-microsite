<?php
/**
 * Include template used for displaying the bottom navigation
 *
 * @package WordPress
 * @subpackage Samasource
 */
$template_dir = get_bloginfo('template_directory');
?>

<div class="bottom_nav">
    <div class="left left_col">
        <a href="<?php echo home_url() . '/company/'; ?>" class="logo"><img src="<?php echo $template_dir; ?>/images/footer_logo.png" alt="Samasource"/></a>
        <div class="left social">
            <a href="<?php echo get_option('twitter_url'); ?>" class="icon twitter"><span></span></a>
            <a href="<?php echo get_option('facebook_url'); ?>" class="icon facebook"><span></span></a>
            <a href="<?php echo get_option('linkedin_url'); ?>" class="icon linkedin"><span></span></a>
            <a href="<?php echo get_option('google_plus_url'); ?>" class="icon google_plus"><span></span></a>
            <a href="<?php echo get_option('youtube_url'); ?>" class="icon youtube"><span></span></a>
            <div class="clear"></div>
        </div>
        <div class="clear"></div>
    </div>
    <div class="left right_col">
        <ul class="menu uppercase oswald shadow">
          <?php wp_list_pages( array('include' => '1810', 'child_of' => '1810', title_li  => '') ); ?>
          <?php wp_list_pages( array('child_of' => '1810', 'depth' => '1', 'exclude' => '', title_li  => '') ); ?>
        </ul>
        <div class="terms">
            &copy; Samasource 2012-2013
            <a href="<?php echo get_permalink(217); ?>">Terms of Service</a>
        </div>
    </div>
    <div class="clear"></div>
</div>