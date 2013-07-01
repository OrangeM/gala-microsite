<?php
/**
 * Template Name: Company - About Page
 * Company page template.
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
    <div class="sub_wrapper overflow_hidden">
        <div id="body_container">
            <?php get_template_part( 'nav', 'company-top' ); ?>
            <?php if (is_array($sub_banner_img)) : ?>
              <div id="sub_feature">
                <?php if( get_field('header_caption') ): ?>
                  <div class="caption">
                    <span class="quote">&ldquo;<?php the_field('header_caption'); ?>&rdquo;</span>
                    <?php if( get_field('header_attribution') ): ?>
                      <br />
                      <span class="attribution">&ndash; <?php the_field('header_attribution'); ?></span>
                    <?php endif; ?>
                  </div>
                <?php endif; ?>
              </div>
            <?php endif; ?>
            <div id="sub_body" class="<?php echo $body_class_str; ?>">
              <div class="content">
                <div class="about_wide"><?php the_field('lead_content'); ?></div>
                <div class="about_thin left">
                  <?php the_field('side_content'); ?>
                  <?php if( get_field('video_caption') ): ?>
                    <div class="about_video_arrow">
                      <?php the_field('video_caption'); ?>
                    </div>
                  <?php endif; ?>
                </div>
                <?php if( get_field('video_embed_link') ): ?>
                  <div class="about_frame right">
                    <iframe width="400" height="225" src="<?php the_field('video_embed_link'); ?>" frameborder="0" allowfullscreen></iframe>
                  </div>
                <?php endif; ?>
                <div class="clear"></div>
                <div class="about_links">
                  <h3 class="left"><?php the_field('link_bar_title'); ?></h3>
                  <?php while( has_sub_field('link_bar_items') ): ?>
                    <a href="<?php echo get_sub_field('link_url'); ?>" class="uppercase oswald">
                      <?php the_sub_field('link_text'); ?>
                      &gt;&gt;
                    </a>
                  <?php endwhile; ?>
                  <div class="clear"></div>
                </div>
              </div>
              <div class="clear"></div>
              <div class="content foreground-box about_band">
                <div class="about_wide">
                  <?php the_field('band_content'); ?>
                  <br />
                  <p>
                    <strong>
                      <span class="quote">&ldquo;</span>
                      <span class="quote_body"><?php the_field('quote_text'); ?></span>
                      <span class="quote">&rdquo;</span>
                    </strong><br />
                    &ndash; &nbsp; <?php the_field('quote_attribution'); ?>
                    <br />
                    <?php $image = get_field('quote_image'); ?>
                    <?php if ($image) : ?>
                      <a href="<?php the_field('quote_link'); ?>" target="_blank">
                        <img src="<?php echo $image['url']; ?>" class="quote_image" height="24" alt="<?php echo $image['title']; ?>"/>
                      </a>
                    <?php endif; ?>
                  </p>
                </div>
                <?php if ( get_field('left_feature_title') ): ?>
                  <div class="about_house left">
                    <?php the_field('left_feature_title'); ?>
                    <div class="icon_row">
                      <?php while( has_sub_field('left_feature_icons') ): ?>
                        <?php $image = get_sub_field('left_icon'); ?>
                        <img src="<?php echo $image['url']; ?>" alt="" />
                      <?php endwhile; ?>
                    </div>
                    <?php the_field('left_feature_text'); ?>
                    <a href="<?php the_field('left_action_link'); ?>" class="promo_btn bold">
                      <span class="btn_left"></span>
                      <span class="btn_center">
                        <?php the_field('left_action_text'); ?>
                        <span class="carret">&raquo;</span>
                      </span>
                      <span class="btn_right"></span>
                      <span class="clear"></span>
                    </a>
                  </div>
                <?php endif; ?>
                <?php if ( get_field('right_feature_title') ): ?>
                  <div class="about_house right">
                    <?php the_field('right_feature_title'); ?>
                    <div class="icon_row">
                      <?php while( has_sub_field('right_feature_icons') ): ?>
                        <?php $image = get_sub_field('right_icon'); ?>
                        <img src="<?php echo $image['url']; ?>" alt="" />
                      <?php endwhile; ?>
                    </div>
                    <?php the_field('right_feature_text'); ?>
                    <a href="<?php the_field('right_action_link'); ?>" class="promo_btn bold">
                      <span class="btn_left"></span>
                      <span class="btn_center">
                        <?php the_field('right_action_text'); ?>
                        <span class="carret">&raquo;</span>
                      </span>
                      <span class="btn_right"></span>
                      <span class="clear"></span>
                    </a>
                  </div>
                <?php endif; ?>
                <div class="clear"></div>
              </div>
              <div class="about_careers">
                <div class="left">
                  <?php the_field('careers_content'); ?>
                </div>
                <div class="about_frame right">
                  <?php $image = get_field('careers_image'); ?>
                  <a href="<?php the_field('careers_link'); ?>"><img src="<?php echo $image['url']; ?>" width="450" alt="" /></a>
                </div>
                <div class="clear"></div>
              </div>
              <div class="clear"></div>
            </div>
            <div id="sub_bottom">
              <?php get_template_part( 'nav', 'company-bottom' ); ?>
            </div>
        </div>
    </div>
</div>

<?php
get_footer();