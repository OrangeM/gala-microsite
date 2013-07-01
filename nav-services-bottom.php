<?php
/**
 * Include template used for displaying the bottom navigation
 *
 * @package WordPress
 * @subpackage Samasource
 */
$template_dir = get_bloginfo('template_directory');
?>

<div class="bottom_nav">
    <div class="left left_col">
        <a href="<?php echo home_url(); ?>" class="logo"><img src="<?php echo $template_dir; ?>/images/footer_logo.png" alt="Samasource"/></a>
        <div class="left social">
            <a href="<?php echo get_option('twitter_url'); ?>" class="icon twitter"><span></span></a>
            <a href="<?php echo get_option('facebook_url'); ?>" class="icon facebook"><span></span></a>
            <a href="<?php echo get_option('linkedin_url'); ?>" class="icon linkedin"><span></span></a>
            <a href="<?php echo get_option('google_plus_url'); ?>" class="icon google_plus"><span></span></a>
            <a href="<?php echo get_option('youtube_url'); ?>" class="icon youtube"><span></span></a>
            <div class="clear"></div>
        </div>
        <div class="clear"></div>
    </div>
    <div class="left right_col">
        <ul class="menu uppercase oswald shadow">
            <?php //wp_list_pages( array(depth => '1', exclude => '6,171', title_li  => '') ); ?>
            <li><a href="<?php echo site_url('why-samasource/why-samasource-for-digital-projects/');?>">why samasource</a></li>
            <li><a href="<?php echo site_url('what-we-offer/content-moderation-services/');?>">what we offer</a></li>
            <li><a href="<?php echo site_url('industry-solutions/content-management-services-for-consumer-internet-companies/');?>">industry solutions</a></li>
            <li class="last"><a href="<?php echo site_url('customers/our-customers/');?>">customers</a></li>
        </ul>
        <div class="terms">
            &copy; Samasource 2012-2013
            <a href="<?php echo get_permalink(217); ?>">Terms of Service</a>
        </div>
    </div>
    <div class="clear"></div>
</div>