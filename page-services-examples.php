<?php
/**
 * Template Name: Services - Examples Page
 * Examples page template.
 *
 * @package Samasource
 */

get_header();

$template_dir = get_bloginfo('template_directory');

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
                        <h1 class="content_header"><?php the_field('page_headline'); ?></h1>
                        <h3 class="content_sub_header"><?php the_field('page_sub_headline'); ?></h3>
                        <?php the_content(); ?>

                        <div class="machine_box">
                            <h2 class="center"><?php the_field('list_headline'); ?></h2>
                            <div class="number_box">
                                <?php if( get_field('list_items') ): ?>
                                    <?php $count = 1; ?>
                                    <?php while( has_sub_field('list_items') ): ?>
                                        <div class="block<?php if ($count%3==0): ?> third<?php endif;?><?php if ($count%3==1): ?> fourth<?php endif;?>">
                                            <div class="number oswald bold size_30"><span><?php echo $count; ?></span></div>
                                            <span class="headline"><?php the_sub_field('content'); ?></span>
                                        </div>
                                        <?php $count++; ?>
                                    <?php endwhile; ?>
                                <?php endif; ?>
                                <div class="clear"></div>
                            </div>
                            <div class="examples_box">
                                <div class="examples_top"></div>
                                <div class="examples_center">
                                    <h2><?php the_field('box_headline'); ?></h2>
                                    <span class="size_16 grey shadow"><?php the_field('box_sub_headline'); ?></span>
                                    <div class="example_blocks">
                                        <?php if( get_field('example_blocks') ): ?>
                                            <?php $count = 1; ?>
                                            <?php while( has_sub_field('example_blocks') ): ?>
                                                <div class="box">
                                                    <?php $image = get_sub_field('image'); ?>
                                                    <?php if ($image) : ?>
                                                        <img src="<?php echo $image['url']; ?>" class="left" width="279" height="156" alt="<?php echo $image['alt']; ?>" title="<?php echo $image['title']; ?>"/>
                                                    <?php else : ?>
                                                        <img src="<?php echo $template_dir; ?>/images/example_ph.jpg" class="left" width="279" height="156" alt="example image"/>
                                                    <?php endif; ?>

                                                    <div class="content left">
                                                        <span class="bold size_16 block"><?php the_sub_field('headline'); ?></span>
                                                        <?php the_sub_field('content'); ?>
                                                    </div>
                                                    <div class="clear"></div>
                                                </div>
                                                <?php $count++; ?>
                                            <?php endwhile; ?>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="machine_box_bot"></div>
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