<?php
/**
 * Template Name: Splash Page
 * Root splash page template.
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


<div id="wrapper" class="splash_wrapper <?php echo $body_class_str; ?>">
    <div id="top">
                <a href="<?php echo home_url(); ?>" class="logo left"><img src="<?php echo $template_dir; ?>/images/logo.png" alt="Samasource"/></a>
				<div class="secondary_menu right">
				 <?php wp_nav_menu( array(menu => 'secondary_top_menu', container => false) ); ?></div>
                <div class="clear"></div>
            </div>

    <div id="sub_wrapper">
		<div class="envelope">
			<?php if (is_array($sub_banner_img)) : ?>
				<a id="sub_feature_img" class="splash_image" href="<?php the_field('header_cta_link'); ?>">
				<img class="envelope_home" src="<?php echo $sub_banner_img['url']; ?>" />
				</a>
			<?php endif; ?>
		</div>
        <div id="body_container" class="">
            
            <?php if (is_array($sub_banner_img)) : ?>
              <a id="sub_feature" href="<?php the_field('header_cta_link'); ?>">
			  <!-- Our code starts-->
			  <?php if( get_field('envelope_details') ): ?>
                  <div class="hostedby">
				  
					<?php while(has_sub_field('envelope_details')): ?>
					<span class="hostedby-text"><?php the_sub_field('hosted_by'); ?></span>
					<span class="venue-text"><?php the_sub_field('venue'); ?></span>
					<span class="envelope-text"  style="color:#fff"><?php the_sub_field('envelope_text'); ?></span>
					<?php endwhile; ?>
					
                  </div>
              <?php endif; ?>
			 
			  <!-- Our code ends-->
			  
                <?php /*if( get_field('header_caption') ): ?>
                  <div class="caption">
                    <span class="quote"><?php the_field('header_caption'); ?></span>
                  </div>
                <?php endif; */?>

                <?php if( get_field('header_cta_text') ): ?>
                  <div class="left promo_btn oswald size_20 bold">
                      <span class="btn_left"></span>
                      <span class="btn_center"><?php the_field('header_cta_text'); ?> <span class="carret">&raquo;</span></span>
                      <span class="btn_right"></span>
                      <span class="clear"></span>
                  </div>
                <?php endif; ?>

              </a>
            <?php endif; ?>

            <div id="sub_body" class="<?php echo $body_class_str; ?>">
                <div class="content">
			<!-- Our code starts-->
			<div class="space" style="margin:3% 0%;">
				<?php if( get_field('highlights_section') ): ?>
					<div class="highlight">
				  
						<?php while(has_sub_field('highlights_section')): ?>
						<p class="highlight-title" style="text-align:center"><?php the_sub_field('highlight_title'); ?></p>
						<p class="highlight-text" style="width:37%; float:left; padding: 4% 3% 0 0;"><?php the_sub_field('hightlight_text_area'); ?></p>
						<span class="highlight-image" style="width:60%; float:left;"><img src="<?php the_sub_field('highlight_image'); ?>" alt="" /></span>
						<?php endwhile; ?>
					
					</div>
				<?php endif; ?>
			</div>
			<div class="space" style="margin:3% 0%;">
				<?php if( get_field('marthas_story') ): ?>
					<div class="marthas_story">
				  
						<?php while(has_sub_field('marthas_story')): ?>
						<p class="marthas-title" style="text-align:center;"><?php the_sub_field('story_title'); ?></p>
						<div class="marthas-video" style="text-align:center"><iframe width="560" height="315" src="//www.youtube.com/embed/s9nVNrV5jS8" frameborder="0" allowfullscreen></iframe></div>
						<p class="marthas-image" style="padding:2% 6%; text-align:center;"><?php the_sub_field('story_text'); ?></p>
						<p style="text-align:center;"><img src="<?php echo $template_dir; ?>/images/new/purchase-ticket.png" alt="Samasource"/></p>
						<?php endwhile; ?>
					
					</div>
				<?php endif; ?>
				<div class="clear"></div>
			</div>
				
			  
			<div class="space" style="margin:3% 0%;">
				<p class="coverage-title" style="text-align:center;"><?php the_field('coverage_title'); ?></p>
					<?php if( get_field('coverage_section') ): ?>
						<?php while(has_sub_field('coverage_section')): ?>
							<div class="coverage" style="float:left; width:30%;">
								<p class="coverage-text" style="text-align:left;"><?php the_sub_field('coverage_text'); ?></p>
								<p class="coverage-logo" style="text-align:left;"><img src="<?php the_sub_field('upload_coverage_logo'); ?>" alt="" /></p>
							</div>
						<?php endwhile; ?>
					<?php endif; ?>
				 <div class="clear"></div>
			</div>
			<div class="space" style="margin:3% 0%;">
				<div class="left" style="width:45%">
					<?php if( get_field('partner') ): ?>
						<?php while(has_sub_field('partner')): ?>
							<p class="partner-title" style="text-align:center;"><?php the_sub_field('partner_title'); ?></p>
							<p class="partner-title" style="text-align:center;"><?php the_sub_field('partner_text_area'); ?></p>
						<?php endwhile; ?>
					<?php endif; ?>
				</div>
				<div class="right" style="width:45%">
					
					<p class="sponsor-title" style="text-align:center;"><?php the_field('enter_year_and_sponsor'); ?></p>
					<p class="sponsor-logo" style="text-align:center; margin:2% 0 0 0;"><img src="<?php the_field('uplaod_sponsor_image'); ?>" alt="" /></p>
						
					
				</div>
				<div class="clear"></div>
			</div>
			
			
			<div class="space" style="margin:3% 0%;">
				<div class="left" style="width:45%">
					<p class="host-title" style="text-align:center;"><?php the_field('host_title'); ?></p>
					<?php if( get_field('host_committe_section') ): ?>
						<?php while(has_sub_field('host_committe_section')): ?>
							<div class="host-names left" style="color:#fff;"><?php the_sub_field('names_on_left'); ?></div>
							<div class="host-names right" style="color:#fff;"><?php the_sub_field('names_on_right'); ?></div>
						<?php endwhile; ?>
					<?php endif; ?>
				</div>
				
				<div class="right" style="width:45%">
					<p class="steering-title" style="text-align:center;"><?php the_field('steering_committee_title'); ?></p>
					<?php if( get_field('steering_committee_section') ): ?>
						<?php while(has_sub_field('steering_committee_section')): ?>
							<div class="steering-names left" style="color:#fff;"><?php the_sub_field('names_on_left'); ?></div>
							<div class="steering-names right" style="color:#fff;"><?php the_sub_field('names_on_right'); ?></div>
						<?php endwhile; ?>
					<?php endif; ?>
				</div>
				
				<div class="clear"></div>
				<p style="text-align:center;"><img src="<?php echo $template_dir; ?>/images/new/purchase-ticket.png" alt="Samasource"/></p>
			</div>
			<div class="space" style="margin:3% 0%;">
				<p class="footer-sponsor-title" style="text-align:center;"><?php the_field('footer_sponsor_heading'); ?></p>
					<?php if( get_field('footer_sponsors') ): ?>
						<?php while(has_sub_field('footer_sponsors')): ?>
						<div style="width:50%; margin-left:20%; text-align:center; ">
							<ul>
							<li class="footer-sponsor-logo left" style="list-style-type:none;"><img src="<?php the_sub_field('sponsor_image'); ?>" alt="" /></li>
							</ul>
						</div>
						<?php endwhile; ?>
					<?php endif; ?>
				 <div class="clear"></div>
			</div>
			
			   <!-- Our code ends-->
				
                  <?php while( has_sub_field('left_funnel') ): ?>
                    <a class="splash_option left" href="<?php the_sub_field('button_link'); ?>">
                      <h1><?php the_sub_field('title'); ?></h1>
                      <p class="size_16"><?php the_sub_field('description'); ?></p>
                      <div class="promo_btn oswald size_24 bold">
                        <span class="btn_left"></span>
                        <span class="btn_center"><?php the_sub_field('button_text'); ?> <span class="carret">&raquo;</span></span>
                        <span class="btn_right"></span>
                        <span class="clear"></span>
                      </div>
                    </a>
                  <?php endwhile; ?>

                  <div class="splash_separator left">&nbsp;</div>

                  <?php while( has_sub_field('right_funnel') ): ?>
                    <a class="splash_option right" href="<?php the_sub_field('button_link'); ?>">
                      <h1><?php the_sub_field('title'); ?></h1>
                      <p class="size_16"><?php the_sub_field('description'); ?></p>
                      <div class="promo_btn oswald size_24 bold">
                        <span class="btn_left"></span>
                        <span class="btn_center"><?php the_sub_field('button_text'); ?> <span class="carret">&raquo;</span></span>
                        <span class="btn_right"></span>
                        <span class="clear"></span>
                      </div>
                    </a>
                  <?php endwhile; ?>

                </div>
                <div class="clear"></div>
            </div>

        </div>
    </div>
</div>

<?php
    get_footer();