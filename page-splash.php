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
			 <?php wp_nav_menu( array(menu => 'secondary_top_menu', container => false) ); ?>
		</div>
        <div class="clear"></div>
    </div>

    <div id="sub_wrapper">
		<div class="envelope" id="sub_feature_img" style="height: 583px; background-image: url('<?php echo $sub_banner_img['url']; ?>')" >
		<!-- Our code starts-->
		
			<?php if( get_field('envelope_details') ): ?>
                <div class="hostedby">
				 	<?php while(has_sub_field('envelope_details')): ?>
					<span class="hostedby-text"><?php the_sub_field('hosted_by'); ?></span>
					<span class="venue-text"><?php the_sub_field('venue'); ?></span>
					<span class="envelope-text"  style="color:#fff"><?php the_sub_field('envelope_text'); ?></span>
					<?php endwhile; ?>
					<a href="https://www.facebook.com/events/570479509652842/" target="_blank"><img class="purchase-image" src="<?php echo get_template_directory_uri(); ?>/images/new/purchase-ticket.png" /></a>
					<a href="https://www.facebook.com/events/570479509652842/" target="_blank"><img class="facebook-image" src="<?php echo get_template_directory_uri(); ?>/images/new/facebook-img.png" /></a>
					<div class="clear"></div>
				</div>
            <?php endif; ?>
		  <!-- Our code ends-->	
			
			
			
		</div>
        <div id="body_container" class="" style="min-height: 333px;">
            <div id="sub_body" class="<?php echo $body_class_str; ?>" style="margin-top:1%; margin-bottom: 0;">
                <div class="content">
			     <!-- Our code starts-->
					<div class="space" style="margin:3% 0%;">
						<?php if( get_field('highlights_section') ): ?>
							<div class="highlight">
								<?php while(has_sub_field('highlights_section')): ?>
								<p class="title"><?php the_sub_field('highlight_title'); ?></p>
								<span class="highlight-text"><?php the_sub_field('hightlight_text_area'); ?></span>
								<span class="highlight-image left"><img src="<?php the_sub_field('highlight_image'); ?>" alt="" /></span>
								<?php endwhile; ?>
							</div>
						<?php endif; ?>
					</div>
				</div><div class="clear"></div>
            </div>

        </div> 
		<!--body_container ends -->
		<div class="home_wrapper5" style="margin-top: -0.8%;">
			<div class="space">
				<?php if( get_field('marthas_story') ): ?>
					<div class="marthas_story">
				  
						<?php while(has_sub_field('marthas_story')): ?>
						<p class="title"><?php the_sub_field('story_title'); ?></p>
						<div class="marthas-video center"><iframe width="560" height="315" src="//www.youtube.com/embed/s9nVNrV5jS8" frameborder="0" allowfullscreen></iframe></div>
						<div>
						<p class="marthas-image center"><?php the_sub_field('story_text'); ?></p><div class="clear"></div>
						<p class="center"><a href="https://www.facebook.com/events/570479509652842/"><img src="<?php echo $template_dir; ?>/images/new/purchase-ticket.png" alt="Samasource"/></a></p>
						</div><div class="clear"></div>
						<?php endwhile; ?>
					
					</div><div class="clear"></div>
				<?php endif; ?>
				
			</div>
			<div class="clear"></div>
		</div>
		<!--home_wrapper5 ends -->
		<div class="home_container6">
			<div class="space">
				<p class="title"><?php the_field('coverage_title'); ?></p>
					<?php if( get_field('coverage_section') ): ?>
						<div style="display:block;">
                        <ul>
						<?php while(has_sub_field('coverage_section')): ?>
							<li class="coverage left">
								<p class="coverage-text"><?php the_sub_field('coverage_text'); ?></p>
								<p class="coverage-logo"><img src="<?php the_sub_field('upload_coverage_logo'); ?>" alt="" /></p>
							</li>
						<?php endwhile; ?>
                        </ul>
                        </div>
					<?php endif; ?>
				 <div class="clear"></div>
			</div><div class="clear"></div>
		</div>
		<!--home_container6 ends -->
		<!--slider starts-->
		<div>
				<?php do_action('slideshow_deploy', '2603'); ?>
		</div>
		<div class="clear"></div>
		<!--slider ends-->
		<div class="home_container6">
			<div class="space">
				<div class="left" style="width:45%">
					<?php if( get_field('partner') ): ?>
						<?php while(has_sub_field('partner')): ?>
							<p class="title"><?php the_sub_field('partner_title'); ?></p>
							<span class="partner-text"><?php the_sub_field('partner_text_area'); ?></span>
						<?php endwhile; ?>
					<?php endif; ?>
				</div>
				<div class="partner-logo right">
					
					<p class="title"><?php the_field('enter_year_and_sponsor'); ?></p>
					<p class="sponsor-logo center"><img src="<?php the_field('uplaod_sponsor_image'); ?>" alt="" /></p>
						
					
				</div>
				<div class="clear"></div>
			</div><div class="clear"></div>
		</div>
		<!--home_container6 ends -->
		<div class="home_wrapper5">
			<div class="home_container7">
			<div class="space">
				<div class="left" style="width:45%">
					<p class="title"><?php the_field('host_title'); ?></p>
					<?php if( get_field('host_committe_section') ): ?>
						<?php while(has_sub_field('host_committe_section')): ?>
							<div class="host-names left" style="color:#fff;"><?php the_sub_field('names_on_left'); ?></div>
							<div class="host-names right" style="color:#fff;"><?php the_sub_field('names_on_right'); ?></div>
						<?php endwhile; ?>
					<?php endif; ?>
				</div>
				
				<div class="right" style="width:45%">
					<p class="title"><?php the_field('steering_committee_title'); ?></p>
					<?php if( get_field('steering_committee_section') ): ?>
						<?php while(has_sub_field('steering_committee_section')): ?>
							<div class="steering-names left" style="color:#fff;"><?php the_sub_field('names_on_left'); ?></div>
							<div class="steering-names right" style="color:#fff;"><?php the_sub_field('names_on_right'); ?></div>
						<?php endwhile; ?>
					<?php endif; ?>
				</div>
				
				<div class="clear"></div>
				<p class="purchase center"><a href="https://www.facebook.com/events/570479509652842/"><img src="<?php echo $template_dir; ?>/images/new/purchase-ticket.png" alt="Samasource"/></a></p>
			</div></div>
			<div class="clear"></div>
		</div>
		<!--home_wrapper5 ends -->
		<div class="home_container6">
			<div class="space">
				<p class="title"><?php the_field('footer_sponsor_heading'); ?></p>
					<?php if( get_field('footer_sponsors') ): ?>
					
						<div class="our-sponsors">
							<ul>
                            <?php while(has_sub_field('footer_sponsors')): ?>
							<li class="footer-sponsor-logo left"><img src="<?php the_sub_field('sponsor_image'); ?>" alt="" /></li>
							<?php endwhile; ?>
                            </ul>
						</div>
				
					<?php endif; ?>
				 <div class="clear"></div>
			</div><div class="clear"></div>
		</div>
		<!--home_container6 ends -->
		
		
		
		
		<div class="clear"></div>
		<div class="footer-image"> </div>
		<div class="clear"></div>
	</div>
	<!--sub wrapper ends -->
	<div class="footer1">
		<div class="footer-above">
			<div class="footer-top-white">
				<div id="sub_bottom">
					<?php get_template_part( 'nav', 'company-bottom' ); ?>
				</div>
			</div>
		</div>
	</div><div class="clear"></div>
	
</div>
<!--wrapper ends -->
<?php
    get_footer();
?>