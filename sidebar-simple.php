<?php
/**
 * Include template used for displaying the sidebar navigation
 *
 * @package WordPress
 * @subpackage Samasource
 */
$template_dir = get_bloginfo('template_directory');
?>

<div class="sidebar left">
    <?php get_template_part( 'block', 'button' ); ?>
    <?php get_template_part( 'block', 'share' ); ?>
    <?php get_template_part( 'block', 'blog' ); ?>
</div>