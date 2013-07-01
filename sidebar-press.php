<?php
/**
 * Include template used for displaying the sidebar navigation
 *
 * @package WordPress
 * @subpackage Samasource
 */
?>

<div class="sidebar left">
    <ul class="menu oswald uppercase shadow">
        <?php
        $seg4 = uri_segments(4);
        $terms = get_terms('ss_press_taxonomy', array(hide_empty => true));
        $permalink = get_permalink(186);

        foreach ($terms as $term) {
            echo '<li'.($seg4 == $term->slug ? ' class=current_page_item' : '').'><a href="'.$permalink.$term->slug.'">'.$term->name.'</a></li>';
        }
        ?>
    </ul>
    <?php get_template_part( 'block', 'button' ); ?>
    <?php get_template_part( 'block', 'share' ); ?>
    <?php get_template_part( 'block', 'blog' ); ?>
</div>