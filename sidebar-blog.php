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
            $seg3 = uri_segments(3);
            $terms = get_terms('ss_blog_taxonomy', array(hide_empty => true));
            $permalink = get_permalink(254);

            foreach ($terms as $term) {
                echo '<li'.($seg3 == $term->slug ? ' class=current_page_item' : '').'><a href="'.$permalink.$term->slug.'">'.$term->name.'</a></li>';
            }
        ?>
    </ul>
    <?php get_template_part( 'block', 'button' ); ?>
    <?php get_template_part( 'block', 'share' ); ?>
    <?php get_template_part( 'block', 'blog' ); ?>
</div>