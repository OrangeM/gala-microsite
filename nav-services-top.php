<?php
/**
 * Include template used for displaying the top navigation
 *
 * @package WordPress
 * @subpackage Samasource
 */
$template_dir = get_bloginfo('template_directory');
?>

<div id="top">
    <a href="<?php echo home_url() . '/services'; ?>" class="logo left"><img src="<?php echo $template_dir; ?>/images/logo.png" alt="Samasource"/></a>
    <ul class="topnav uppercase oswald shadow right">
        <?php wp_list_pages( array(depth => '2', child_of => '6', exclude => '187', title_li  => '') ); ?>
    </ul>
    <div class="clear"></div>
</div>