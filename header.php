<?php
/**
 * The Header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="main">
 *
 * @package WordPress
 * @subpackage Twenty_Eleven
 * @since Twenty Eleven 1.0
 */
 $template_dir = get_bloginfo('template_directory');

?><!DOCTYPE html>
<!--[if IE 8]>
<html id="ie8" <?php language_attributes(); ?>>
<![endif]-->
<!--[if !(IE 8) ]><!-->
<html <?php language_attributes(); ?>>
<!--<![endif]-->
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>" />
<!--<meta name="viewport" content="width=device-width" />-->
<title>
	<?php
	/*
	 * Print the <title> tag based on what is being viewed.
	 */
	global $page, $paged;

	wp_title( '-', true, 'right' );

	// Add the blog name.
	//bloginfo( 'name' );

	// Add the blog description for the home/front page.
	$site_description = get_bloginfo( 'description', 'display' );
	if ( $site_description && ( is_home() || is_front_page() ) )
		echo " - $site_description";

	// Add a page number if necessary:
	if ( $paged >= 2 || $page >= 2 )
		echo ' - ' . sprintf( __( 'Page %s', 'twentyeleven' ), max( $paged, $page ) );

	?>
</title>

<link rel="profile" href="http://gmpg.org/xfn/11" />
    <link href='http://fonts.googleapis.com/css?family=Oswald:400,300,700' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Ubuntu:400,400italic' rel='stylesheet' type='text/css'>
<!--<link href='http://fonts.googleapis.com/css?family=Maven+Pro:400,500,700' rel='stylesheet' type='text/css'>-->
<link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo( 'stylesheet_url' ); ?>" />
<!--<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />-->

<?php
	wp_head();
?>

<!--[if lt IE 9]>
<!--<script src="<?php echo get_template_directory_uri(); ?>/js/html5.js" type="text/javascript"></script>-->
<![endif]-->
<?php
//$xml = get_xml_feed_object( 'WHI Solutions' );
//echo "Desc: " . $xml->get_description();

//print_r( $xml->get_exit_info() );

//print_r( $xml->get_stage_companies( 'Consumer', 'Early' ) );
?>
</head>

<?php //get_template_part( 'page', 'navigation' ); ?>
<body>
    <div id="lightbox_bg" style=""></div>
    <div id="lightbox">
        <div id="lightbox_wrapper">
            <div id="lightbox_container">
                <a href="javascript:void(0);" id="lb_close"></a>
                <div class="lb_videos">
                    <div class="headline uppercase oswald"></div>
                    <div class="video_container"></div>
                    <div class="clear"></div>
                    <div class="color_darker_grey sub_headline"></div>
                    <p class="margin_bottom0"></p>
                </div>
            </div>
        </div>
    </div>
    <div id="global_header">
        <div class="left uppercase oswald shadow">
            <?php wp_nav_menu( array(menu => 'Global Header Menu', container => false) ); ?>
        </div>
        <div class="right">
            <a href="<?php echo get_option('youtube_url'); ?>" target="_blank" class="icon youtube"><span></span></a>
            <a href="<?php echo get_option('google_plus_url'); ?>" target="_blank" class="icon google_plus"><span></span></a>
            <a href="<?php echo get_option('linkedin_url'); ?>" target="_blank" class="icon linkedin"><span></span></a>
            <a href="<?php echo get_option('facebook_url'); ?>" target="_blank" class="icon facebook"><span></span></a>
            <a href="https://twitter.com/Samasource" class="twitter-follow-button" data-show-count="true" data-show-screen-name="false" data-lang="en">Follow</a>
            <div class="clear"></div>
        </div>
        <div class="clear"></div>
    </div>
