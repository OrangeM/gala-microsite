<?php
/**
 * Template Name: Services - Comparison Table Page
 * Comparison page template.
 *
 * @package Samasource
 */

    get_header();

    /*$template_dir = get_bloginfo('template_directory');*/

    $body_class_str = get_body_class_str();
?>

<div id="wrapper" class="<?php echo $body_class_str; ?>">
    <div id="sub_wrapper">
        <div id="body_container">
            <?php get_template_part( 'nav', 'services-top' ); ?>
            <?php get_template_part( 'block', 'promo' ); ?>
            <div id="sub_body" class="<?php echo $body_class_str; ?>">
                <?php get_sidebar(); ?>
                <div class="sub_content content left">
                    <?php while ( have_posts() ) : the_post(); ?>
                        <?php the_content(); ?>

                        <div class="compare_box">
                            <h2><?php the_field('box_headline'); ?></h2>
                            <?php if( get_field('list_items') ): ?>
                                <div class="large_numbered_list">
                                <?php $count = 1; ?>
                                <?php while( has_sub_field('list_items') ): ?>
                                    <div class="item"><span class="number"><?php echo $count; ?></span><span class="headline"><?php the_sub_field('content'); ?></span></div>
                                    <?php $count++; ?>
                                <?php endwhile; ?>
                                </div>
                            <?php endif; ?>
                            <div class="compare_table">
                                <div class="yellow_top"></div>
                                <div class="row head_row oswald shadow uppercase">
                                    <div class="col1"></div>
                                    <div class="col2"><?php the_field('column_1_header')?></div>
                                    <div class="col3"><?php the_field('column_2_header')?></div>
                                    <div class="clear"></div>
                                </div>
                                <?php if( get_field('table_fields') ): ?>
                                    <?php while( has_sub_field('table_fields') ): ?>
                                        <div class="row">
                                            <div class="col1"><?php the_sub_field('headline'); ?></div>
                                            <div class="col2">
                                                <?php $val = get_sub_field('column_1_checked'); ?>
                                                <?php if (is_array($val) && implode('', $val) == 'Yes'): ?>
                                                    <span class="check"></span>
                                                <?php endif; ?>
                                            </div>
                                            <div class="col3">
                                                <?php $val = get_sub_field('column_2_checked'); ?>
                                                <?php if (is_array($val) && implode('', $val) == 'Yes'): ?>
                                                <span class="check"></span>
                                                <?php endif; ?>
                                            </div>
                                            <div class="clear"></div>
                                        </div>
                                    <?php endwhile; ?>
                                <?php endif; ?>
                                <div class="yellow_bot"></div>
                            </div>
                        </div>
                        <div class="compare_box_bot"></div>
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