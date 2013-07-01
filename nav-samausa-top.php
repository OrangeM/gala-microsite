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
    <a href="<?php echo home_url() . '/samausa'; ?>" class="logo left"><img src="<?php echo $template_dir; ?>/images/samausa_logo.png" alt="SamaUSA"/></a>
    <ul class="topnav uppercase oswald shadow right">
        <?php wp_list_pages( array('include' => '1810', 'child_of' => '1810', title_li  => '') ); ?>
        <?php wp_list_pages( array('child_of' => '1810', 'exclude' => '1810', title_li  => '') ); ?>
    </ul>
    <div class="clear"></div>
</div>