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
    <ul class="menu oswald uppercase shadow">
        <?php
            if ($post->post_parent != 0) {
                wp_list_pages( array(child_of => $post->post_parent, title_li  => '', depth => '1') );
            }else {
                wp_list_pages(array(child_of => $post->ID, title_li  => '', depth => '1'));
            }
        ?>
    </ul>
    <?php get_template_part( 'block', 'button' ); ?>
    <?php get_template_part( 'block', 'share' ); ?>
    <?php get_template_part( 'block', 'blog' ); ?>
</div>