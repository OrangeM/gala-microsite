<?php
/**
 * Template Name: Company - Gala Save-the-Date
 * Template for Gala teaser page.
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
            <?php get_template_part( 'nav', 'company-top' ); ?>
            <?php if (is_array($sub_banner_img)) : ?>
            <div id="sub_feature"></div>
            <?php endif; ?>
            <div id="sub_body" class="<?php echo $body_class_str; ?>">
                <div class="content left">

                  <h1><?php the_field('gala_title'); ?></h1>
                  <div class="gala_teaser_thin left">
                    <?php while ( have_posts() ) : the_post(); ?>
                    <?php the_content(); ?>
                    <?php endwhile; ?>
                  </div>
                  <div class="gala_teaser_rsvp right">
                    <h2><?php the_field('rsvp_headline'); ?></h2>
                    <?php while( has_sub_field('rsvp_actions') ): ?>
                      <a href="<?php echo get_sub_field('link_url'); ?>" class="promo_btn oswald size_18" target="_blank">
                        <span class="btn_left"></span>
                        <span class="btn_center">
                          <?php the_sub_field('link_text'); ?>
                          <span class="carret">&raquo;</span>
                        </span>
                        <span class="btn_right"></span>
                        <span class="clear"></span>
                      </a>
                      <div class="clear"></div>
                    <?php endwhile; ?>
                    <br />
                    <?php the_field('rsvp_details'); ?>
                  </div>
                  <div class="clear"></div>

                  <div class="gala_teaser_photos">
                    <?php while( has_sub_field('gala_photos') ): ?>
                      <img src="<?php the_sub_field('photo'); ?>" width="170" height="113" />
                    <?php endwhile; ?>
                  </div>

                  <div class="gala_teaser_sponsorship">
                    <div class="left gala_teaser_thin">
                      <?php the_field('lower_text'); ?>
                    </div>
                    <a href="<?php the_field('lower_button_link'); ?>" class="promo_btn oswald size_18" target="_blank">
                      <span class="btn_left"></span>
                      <span class="btn_center">
                        <?php the_field('lower_button_text'); ?>
                        <span class="carret">&raquo;</span>
                      </span>
                      <span class="btn_right"></span>
                      <span class="clear"></span>
                    </a>
                    <div class="clear"></div>
                  </div>
                  <div class="clear"></div>

                </div>
            </div>
            <div id="sub_bottom">
                <?php get_template_part( 'nav', 'company-bottom' ); ?>
            </div>
        </div>
    </div>
</div>

<?php
    get_footer();