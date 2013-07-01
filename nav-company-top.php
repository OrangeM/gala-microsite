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
    <a href="<?php echo home_url() . '/company'; ?>" class="logo left"><img src="<?php echo $template_dir; ?>/images/logo.png" alt="Samasource"/></a>
    <ul class="topnav uppercase oswald shadow right">
        <?php wp_list_pages( array('include' => '171', 'child_of' => '171', title_li  => '') ); ?>
        <?php wp_list_pages( array('child_of' => '171', 'exclude' => '217,187,1367', title_li  => '') ); ?>
    </ul>
    <div class="clear"></div>
</div>