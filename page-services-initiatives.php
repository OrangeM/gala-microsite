<?php
/**
 * Template Name: Services - Initiatives Page
 * Initiatives page template.
 *
 * @package Samasource
 */

get_header();

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
            <?php get_template_part( 'nav', 'services-top' ); ?>
            <?php if (is_array($sub_banner_img)) : ?>
                <div id="sub_feature"></div>
            <?php endif; ?>
            <?php get_template_part( 'block', 'promo' ); ?>
            <div id="sub_body" class="<?php echo $body_class_str; ?>">
                <?php get_sidebar(); ?>
                <div class="sub_content content left">
                    <?php while ( have_posts() ) : the_post(); ?>

                        <div class="why_sama_top">
                            <div class="col1 left">
                                <?php the_content(); ?>
                            </div>
                            <div class="col2 left">
                                <?php the_field('right_column_content'); ?>
                            </div>
                            <div class="clear"></div>
                        </div>
                        <div class="why_partner_box">
                            <h2 class="margin_left40"><?php the_field('box_headline'); ?></h2>
                            <p class="margin_left40"><?php the_field('box_sub_headline'); ?></p>

                            <div class="box_container">
                                <?php if( get_field('initiative_blocks') ): ?>
                                    <?php $count = 0; ?>
                                    <?php while( has_sub_field('initiative_blocks') ): ?>
                                        <div class="<?php if ($count%2==0): ?>col1<?php else: ?>col2<?php endif; ?> left">
                                            <?php $image = get_sub_field('logo'); ?>
                                            <?php if ($image) : ?>
                                                <img src="<?php echo $image['url']; ?>" class="partner_logo" alt="<?php echo $image['url']; ?>" title="<?php echo $image['title']; ?>"/>
                                            <?php endif; ?>

                                            <div class="content">
                                                <span class="block oswald uppercase bold"><?php the_sub_field('headline'); ?></span>
                                                <?php the_sub_field('content'); ?>
                                            </div>
                                        </div>
                                        <?php $count++; ?>
                                    <?php endwhile;?>
                                <?php endif; ?>
                                <div class="clear"></div>
                            </div>
                        </div>
                        <div class="why_partner_box_bot">
                            <?php the_field('bottom_content'); ?>
                        </div>
                    <?php endwhile; ?>
                </div>
                <div class="clear"></div>
            </div>
            <div id="sub_bottom">
                <?php get_template_part( 'block', 'quote' ); ?>
                <?php get_template_part( 'nav', 'services-bottom' ); ?>
            </div>
        </div>
    </div>
</div>

<?php
get_footer();