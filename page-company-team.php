<?php
/**
 * Template Name: Company - Team Page
 * Team page template.
 *
 * @package Samasource
 */

get_header();

$template_dir = get_bloginfo('template_directory');
?>

<div id="wrapper" class="no_quote no_promo">
    <div id="sub_wrapper">
        <div id="body_container">
            <?php get_template_part( 'nav', 'company-top' ); ?>
            <div id="sub_body" class="no_quote no_promo">
                <div class="content left">
                  <div class="sub_content">
                    <?php while ( have_posts() ) : the_post(); ?>
                        <?php the_content(); ?>
                    <?php endwhile; ?>
                  </div>



<style type="text/css">

.content ul li { padding-left: 0; background: none; }

.meet-the-team { position: relative; margin: 50px 0; }
.meet-the-team .hiring-sticker { margin: -33px 32px 0 0; }
.meet-the-team .nav { height: 37px; list-style: none outside none; padding-left: 3px; }
.meet-the-team .nav li { float: left; display: inline; height: 37px; border-right: 3px solid #fff; padding-right: 11px; margin-right: 11px; }
.meet-the-team .nav li a { float: left; display: inline; line-height: 37px; font-size: 17px; text-transform: uppercase; font-family: 'Oswald', arial, serif; }
.meet-the-team .nav li a:hover,
.meet-the-team .nav li.current_page_item a { color: #000; text-decoration: none; }
.meet-the-team .nav li.last { border: 0; }
.meet-the-team .slider { background: #fff; border: 1px solid #efefef; margin: 15px auto 0; padding: 20px 45px 0; clear: both; }
.meet-the-team .slider ul { diplay: block; clear: both; position: relative; margin: 0; list-style: none outside none; }
.meet-the-team .slider .jcarousel-clip { width: 843px; height: 426px; position: relative; }
.meet-the-team .slider ul .hld { position: relative; margin: 0; }
.meet-the-team .slider ul li ul { position: relative; margin-right: -21px; }
.meet-the-team .team-member { height: 127px; padding: 5px; }
.meet-the-team .team-member .bio { position: absolute; display: none; width: 250px; margin: 130px -5px 0 -5px; padding: 15px; font-size: 0.85em; line-height: 1.3em; background-color: black; background-color: rgba(0,0,0,0.9); z-index: 500; }
.meet-the-team .team-member .bio p { color: white; }
.meet-the-team .team-member:hover { background-color: #eee; }
.meet-the-team .team-member:hover .bio { display: block; }
.meet-the-team .slider ul li li { float: left; display: inline; width: 270px; margin: 0 15px 15px 0; }
.meet-the-team .slider ul li li .image { width: 115px; height: 127px; /* background: #ebebeb; */ }
.meet-the-team .slider ul li li .image img { display: block; }
.meet-the-team .slider ul li li .info { width: 145px; padding: 5px 0 0 10px; }
.meet-the-team .slider ul li li .info p { font-size: 14px; font-weight: 300; }
.meet-the-team .slider ul li li .info .title { display: block; line-height: 1.2em; color: #868686; padding-bottom: 4px; }
.meet-the-team .slider ul li li .info h5 { margin-bottom: 10px; font-size: 17px; font-family: Ubuntu; text-transform: none; }
.meet-the-team .slider ul li li .info h5 a { color: #333; }
.meet-the-team .slider .jcarousel-prev { background: url(images/carousel-prev-01.png) no-repeat 0 0; position: absolute; top: 183px; left: -36px; width: 23px; height: 46px; cursor: pointer; }
.meet-the-team .slider .jcarousel-prev:hover { background-image: url(images/carousel-prev-01-hover.png); }
.meet-the-team .slider .jcarousel-next { background: url(images/carousel-next-01.png) no-repeat 0 0; position: absolute; top: 183px; right: -36px; width: 23px; height: 46px; cursor: pointer; }
.meet-the-team .slider .jcarousel-next:hover { background-image: url(images/carousel-next-01-hover.png); }

.meet-the-team .team-member-hidden-info { display: none; }

.team-member-popup  .i { height: 534px; }
.team-member-popup .picture { width: 370px; background: #ebebeb; margin: 20px 20px 0; height: 494px; position: relative; overflow: hidden; }
.team-member-popup .picture .caption {  display: block; height: 73px; background: url(images/bg-trans-82.png) repeat 0 0; position: absolute; bottom: 0; left: 0; width: 350px; color: #fff; font-family: 'Oswald', arial, serif; padding: 12px 0 0 20px; }
.team-member-popup .picture .caption strong { font-size: 28px; }
.team-member-popup .picture .caption .job { display: block; font-size: 17px; color: #7c7c7c; }
.team-member-popup .info { width: 500px; margin: 20px 30px 0 0; padding-top: 20px; }
.team-member-popup .info p { padding-bottom: 15px; }
.team-member-popup .info .quote { font-family: 'Oswald', arial, serif; font-size: 17px; padding-bottom: 20px; }

</style>


				<!-- meet the team -->
    				<div class="meet-the-team">

    								<!-- slider -->
    								<div class="slider">
    								<h2>OUR <b>TEAM</b></h2>
    									<ul>
    										<li class="hld">

    										<ul style="padding-bottom: 190px;">
    										  <?php while( has_sub_field('team_members') ): ?>
    										    <li class="team-member">
    										      <div class="bio"><?php the_sub_field('member_biography'); ?></div>
    										      <div class="image left">
    										        <?php $image = get_sub_field('member_photo'); ?>
    										        <img width="115" height="127" src="<?php echo $image['url']; ?>" class="attachment-team-member wp-post-image" alt="<?php echo $image['title']; ?>" />
    										      </div>
    										      <div class="info left">
    										        <h5><?php the_sub_field('member_name'); ?></h5>
    										        <p class="title"><?php the_sub_field('member_title'); ?></p>
    										      </div>
    										      <div class="cl">&nbsp;</div>
    										    </li>
    										  <?php endwhile; ?>
    										</ul>

    										<h2 style="clear: both;"><br /><br />OUR <b>BOARD OF DIRECTORS</b></h2>
    										<ul style="padding-bottom: 460px;">
    										  <?php while( has_sub_field('board_members') ): ?>
    										    <li class="team-member">
    										      <div class="bio"><?php the_sub_field('member_biography'); ?></div>
    										      <div class="image left">
    										        <?php $image = get_sub_field('member_photo'); ?>
    										        <img width="115" height="127" src="<?php echo $image['url']; ?>" class="attachment-team-member wp-post-image" alt="<?php echo $image['title']; ?>" />
    										      </div>
    										      <div class="info left">
    										        <h5><?php the_sub_field('member_name'); ?></h5>
    										        <p class="title"><?php the_sub_field('member_title'); ?></p>
    										      </div>
    										      <div class="cl">&nbsp;</div>
    										    </li>
    										  <?php endwhile; ?>
    										</ul>

    									</li>
    								</ul>
    							</div>
        				</div>

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