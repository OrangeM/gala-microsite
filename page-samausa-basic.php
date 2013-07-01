<?php
/**
 * Template Name: SamaUSA - Basic Page
 * Template with SamaUSA nav.
 *
 * @package Samasource
 */

get_header();

$template_dir = get_bloginfo('template_directory');

$sub_banner_img = '';
while (have_posts()) {
    the_post();
    $sub_banner_img = get_field('header_image');
}

$body_class_str = get_body_class_str();
?>

<?php if (is_array($sub_banner_img)) : ?>
    <div id="sub_feature_img" style="background-image: url('<?php echo $sub_banner_img['url']; ?>')">
        <div class="bot"></div>
    </div>
<?php endif; ?>
<div id="wrapper" class="<?php echo $body_class_str; ?>">
    <div id="sub_wrapper">
        <div id="body_container">
            <?php get_template_part( 'nav', 'samausa-top' ); ?>
            <?php if (is_array($sub_banner_img)) : ?>
              <div id="sub_feature">
                <?php if( get_field('header_caption') ): ?>
                  <div class="caption">
                    <span class="quote"><?php the_field('header_caption'); ?></span>
                  </div>
                <?php endif; ?>
              </div>
            <?php endif; ?>
            <?php get_template_part( 'block', 'promo' ); ?>
            <div id="sub_body" class="<?php echo $body_class_str; ?>">
                <?php get_sidebar('samausa'); ?>
                <div class="sub_content content left">
                    <?php while ( have_posts() ) : the_post(); ?>
                    <?php the_content(); ?>
                    <?php endwhile; ?>
                </div>
                <div class="clear"></div>
            </div>
            <div id="sub_bottom">
                <?php get_template_part( 'nav', 'samausa-bottom' ); ?>
            </div>
        </div>
    </div>
</div>

<?php
    get_footer();