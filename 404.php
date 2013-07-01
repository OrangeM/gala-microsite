<?php
/**
 * Template Name: 404 Page
 * 404 page template.
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

<div id="wrapper" class="<?php echo $body_class_str; ?>">
    <div id="sub_wrapper">
        <div id="body_container">
            <?php get_template_part( 'nav', 'company-top' ); ?>
            <?php if (is_array($sub_banner_img)) : ?>
             <div id="sub_feature"></div>
            <?php endif; ?>
            <?php get_template_part( 'block', 'promo' ); ?>
            <div id="sub_body" class="<?php echo $body_class_str; ?>">
                <div class="sub_content content left" style="padding: 50px 0;">
                    <h1>Page <strong>Not Found</strong></h1>
                    <p>
                      We're sorry, but we couldn't find the page you requested.<br />
                      Please explore the site to learn more about our <a href="http://samasource.org/company/">company</a>, <a href="http://samasource.org/mission/">non-profit mission</a>, and <a href="http://samasource.org/services/">digital services</a>.
                    </p>
                </div>
                <div class="clear"></div>


                <?php // Ported home content ?>
                <div id="home_container3">
                    <div class="home_block_3">
                        <div class="left news_block">
                            <h2>LATEST <strong>NEWS</strong></h2>
                            <?php
                                $news_query = new WP_Query( array(
                                    'post_type' => 'ss_news_article',
                                    'posts_per_page' => 1,
                                    'orderby' => 'date',
                                    'order' => 'DESC'
                                ));
                            ?>
                            <a class="right uppercase blue size_18 oswald full_blog_link" href="<?php echo site_url('/company/news/'); ?>">view all news &raquo;</a>
                            <div class="clear"></div>
                            <?php while ($news_query->have_posts()) : $news_query->the_post();?>
                                <?php $news_img = get_field('image'); ?>
                                <a class="news_img" target="_blank" href="<?php the_field('external_url');?>">
                                    <img src="<?php echo $news_img['url']; ?>" width="607" height="271" alt="<?php echo $news_img['alt']; ?>" title="<?php echo $news_img['title']; ?>"/>
                                    <span class="block white oswald news_caption">
                                        <span class="light block line_height21 uppercase"><?php echo date('F j, Y', strtotime($post->post_date));?></span>
                                        <strong class="line_height21 uppercase title_text"><?php the_title(); ?></strong>
                                    </span>
                                </a>
                            <?php
                                endwhile;

                                // Prevent weirdness
                                wp_reset_postdata();
                            ?>
                        </div>
                        <div class="left blog_block">
                            <h2>RECENT <strong>BLOG POSTS</strong></h2>
                            <?php
                                $blog_query = new WP_Query( array(
                                    'post_type' => 'ss_blog_post',
                                    'posts_per_page' => 2,
                                    'orderby' => 'date',
                                    'order' => 'DESC'
                                ));
                            ?>

                            <?php while ($blog_query->have_posts()) : $blog_query->the_post();?>
                                <div class="blog_post">
                                    <span class="date block"><?php echo date('F j, Y', strtotime($post->post_date));?></span>
                                    <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                                </div>
                            <?php
                                endwhile;

                                // Prevent weirdness
                                wp_reset_postdata();
                            ?>
                            <a class="uppercase blue size_18 oswald full_blog_link" href="<?php echo site_url('company/the-blog/'); ?>">view full blog &raquo;</a>
                        </div>
                        <div class="clear"></div>
                    </div>
                </div>




            </div>
            <div id="sub_bottom">
                <?php //get_template_part( 'block', 'quote' ); ?>
                <?php get_template_part( 'nav', 'company-bottom' ); ?>
            </div>
        </div>
    </div>
</div>

<?php
    get_footer();