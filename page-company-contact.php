<?php
/**
 * Template Name: Company - Contact Page
 * Contact page template.
 *
 * @package Samasource
 */

get_header();

$template_dir = get_bloginfo('template_directory');

?>

<div id="wrapper" class="no_quote">
    <div id="sub_wrapper">
        <div id="body_container">
            <?php get_template_part( 'nav', 'company-top' ); ?>
            <div id="sub_body" class="no_quote">
                <div class="content left">
                  <div class="contact_map">
                    <img src="<?php echo $template_dir; ?>/images/contact-map-web.jpg" alt=""/>
                    <div class="map_box left">
                      <h3><?php the_field('left_map_title'); ?></h3>
                      <div>
                        <?php the_field('left_map_content'); ?>
                      </div>
                    </div>
                    <div class="map_box right">
                      <h3><?php the_field('right_map_title'); ?></h3>
                      <div>
                        <?php the_field('right_map_content'); ?>
                      </div>
                    </div>

                  </div>

                  <div class="sub_content">
                    <?php while ( have_posts() ) : the_post(); ?>
                        <?php the_content(); ?>
                    <?php endwhile; ?>
                  </div>

                  <ul class="contact_list block">
                      <?php if( get_field('list_items') ): ?>
                        <?php $count = 1; ?>
                        <?php while( has_sub_field('list_items') ): ?>
                          <li>
                            <div class="contact_info left">
                              <h2 class="size_18"><?php the_sub_field('category'); ?></h2>
                              <?php if ( get_sub_field('person') ): ?>
                                <p>
                                  <?php the_sub_field('person'); ?><br />
                                  <em><?php the_sub_field('person_title'); ?></em>
                                </p>
                              <?php endif; ?>
                              <p>
                                <?php if ( get_sub_field('phone_number') ): ?>
                                  <p><?php the_sub_field('phone_number'); ?></p>
                                 <?php endif; ?>
                                <?php $email = get_sub_field('email'); ?>
                                <a href="mailto:<?php echo $email; ?>"><?php echo $email; ?></a>
                              </p>
                            </div>
                            <div class="contact_action right">
                              <?php if ( $count == 1 ): ?>
                                <div class="social">
                                  <a href="<?php echo get_option('twitter_url'); ?>" target="_blank" class="icon twitter"><span></span></a>
                                  <a href="<?php echo get_option('facebook_url'); ?>" target="_blank" class="icon facebook"><span></span></a>
                                  <a href="<?php echo get_option('linkedin_url'); ?>" target="_blank" class="icon linkedin"><span></span></a>
                                  <a href="<?php echo get_option('google_plus_url'); ?>" target="_blank" class="icon google_plus"><span></span></a>
                                  <a href="<?php echo get_option('youtube_url'); ?>" target="_blank" class="icon youtube"><span></span></a>
                                  <div class="clear"></div>
                                </div>
                              <?php endif; ?>
                              <?php if ( get_sub_field('action_link') ): ?>
                                <a href="<?php the_sub_field('action_link'); ?>" class="video_btn">
                                  <span class="white carret">&raquo;</span>
                                  <?php the_sub_field('action_text'); ?>
                                </a>
                              <?php endif; ?>
                            </div>
                            <div class="clear"></div>
                          </li>
                          <?php $count++; ?>
                        <?php endwhile; ?>
                      <?php endif; ?>
                  </ul>


                <div class="clear"></div>
                <div class="bottom"></div>
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