<?php
/**
 * Press release post detail page
 *
 * @package Battery
 */

get_header();
$body_class_str = get_body_class_str();
?>


<div id="wrapper" class="<?php echo $body_class_str; ?>">
    <div id="sub_wrapper">
        <div id="body_container">
            <?php get_template_part( 'nav', 'company-top' ); ?>
            <?php get_template_part( 'block', 'promo' ); ?>
            <div id="sub_body" class="<?php echo $body_class_str; ?>">
                <?php get_sidebar('simple'); ?>
                <div class="sub_content content left">
                    <?php while ( have_posts() ) : the_post(); ?>
                    <h1><?php the_title(); ?></h1>
                    <?php the_content(); ?>
                    <?php endwhile; ?>
                </div>
                <div class="clear"></div>
            </div>
            <div id="sub_bottom">
                <?php //get_template_part( 'block', 'quote' ); ?>
                <?php get_template_part( 'nav', 'company-bottom' ); ?>
            </div>
        </div>
    </div>
</div>

<?php
get_footer();