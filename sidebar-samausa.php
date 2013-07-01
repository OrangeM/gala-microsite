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

    <span class="header uppercase oswald">Spread the word</span>
    <div class="social">
        <span class='st_facebook_large icon facebook_sidebar' st_title='<?php the_title(); ?>' st_url='<?php the_permalink(); ?>' displayText='facebook'></span>
        <span class='st_twitter_large icon twitter_sidebar' st_via="samasource" st_title='<?php the_title(); ?>' st_url='<?php the_permalink(); ?>' displayText='twitter'></span>
        <span class='st_linkedin_large icon linkedin_sidebar' st_title='<?php the_title(); ?>' st_url='<?php the_permalink(); ?>' displayText='linkedin'></span>
        <span class='st_plusone_large icon google_plus_sidebar' st_title='<?php the_title(); ?>' st_url='<?php the_permalink(); ?>' displayText='plusone'></span>
        <span class='st_sharethis_large icon sharethis_sidebar' st_title='<?php the_title(); ?>' st_url='<?php the_permalink(); ?>' displayText='sharethis'></span>
        <div class="clear"></div>
    </div>


    <?php get_template_part( 'block', 'blog' ); ?>
    <br /><br /><br />
    <?php get_template_part( 'block', 'button' ); ?>

</div>