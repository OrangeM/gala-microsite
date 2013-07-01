<?php
/**
 * Include template used for displaying the quote block
 *
 * @package WordPress
 * @subpackage Samasource
 */
?>


<?php while ( have_posts() ) : the_post(); ?>
    <?php while (has_sub_field('quote_block')) : ?>
        <div class="testimonial">
            <div class="quote_wrapper left">
                <div class="quote">
                    <div class="quote_left icon"><span></span></div>
                        <?php the_sub_field('quote'); ?>
                    <div class="quote_right icon"><span></span></div>
                </div>
                <span class="credit">
                    <?php the_sub_field('quote_credit'); ?>
                </span>
            </div>
            <div class="right">
                <span class="header shadow oswald light size_18 uppercase"><?php the_sub_field('headline'); ?></span>
                <a class="testimonial_btn quote_btn" href="<?php the_sub_field('button_link'); ?>">
                    <span class="btn_left"></span>
                    <span class="btn_center oswald uppercase">
                        <span class="size_30 bold block"><?php the_sub_field('button_headline'); ?></span>
                        <span class="size_18"><?php the_sub_field('button_sub_headline'); ?> <span class="carret size_18">&raquo;</span></span>
                    </span>
                    <span class="btn_right"></span>
                    <span class="clear"></span>
                </a>
            </div>
            <div class="clear"></div>
        </div>
    <?php endwhile; ?>
<?php endwhile; ?>