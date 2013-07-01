
<?php
/**
 * Include template used for displaying the promo block
 *
 * @package WordPress
 * @subpackage Samasource
 */
?>

<?php while ( have_posts() ) : the_post(); ?>
    <?php while (has_sub_field('promotion')) : ?>
        <div id="promo_box" class="content">
            <div class="top"></div>
            <div class="center">
                <?php
                    $form = get_sub_field('form');
                    $external_url = get_sub_field('external_url');
                    $page_link = get_sub_field('page_link');
                ?>
                <div class="left">
                    <span class="header oswald uppercase block light"><?php the_sub_field('headline'); ?></span>
                    <span class="headline"><?php the_sub_field('sub_headline'); ?></span>
                </div>
                <?php if ($page_link != '') { ?>
                     <a class="right promo_btn oswald size_24 bold" href="<?php echo $page_link; ?>">
                <?php } elseif ($external_url != '') { ?>
                     <a class="right promo_btn oswald size_24 bold" target="_blank" href="<?php echo $external_url; ?>">
                <?php } else { ?>
                    <a class="right promo_btn oswald size_24 bold" href="javascript:void(0);">
                <?php } ?>
                    <div class="btn_left"></div>
                    <div class="btn_center"><?php the_sub_field('button_text'); ?> <span class="carret">&raquo;</span></div>
                    <div class="btn_right"></div>
                    <div class="clear"></div>
                </a>
                <?php if ($form) : ?>
                    <div class="promo_form">
                        <span class="form_headline"><?php the_sub_field('form_headline'); ?></span>
                        <?php
                            gravity_form_enqueue_scripts($form->id, true);
                            gravity_form($form->id, true, true, false, '', true, 1);
                        ?>
                        <div class="step_one_wrapper">
                            <a href="javascript:void(0);" class="submit_step_one">CONTINUE</a>
                        </div>
                    </div>
                <?php endif; ?>
                <div class="clear"></div>
            </div>
            <div class="bottom"></div>
        </div>
    <?php endwhile; ?>
<?php endwhile; ?>