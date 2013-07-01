<?php
/**
 * Template Name: Services - Home
 * Top-level template for home.
 *
 * @package Battery
 */

get_header();

$template_dir = get_bloginfo('template_directory');
?>

<?php while ( have_posts() ) : the_post(); ?>
    <?php while( has_sub_field('feature') ): ?>
        <?php
            $image = get_sub_field('image');
            $logo = get_sub_field('logo');
        ?>
        <div id="feature_image" style="background-image: url('<?php echo $image['url'];?>')">
            <div class="bot"></div>
        </div>
        <div id="top_wrapper">
            <?php get_template_part( 'nav', 'services-top' ); ?>
        </div>
        <div id="home_wrapper1">
            <div id="home_container1">
                <div id="feature">
                    <div class="caption">
                        <span class="size_24 block"><?php the_sub_field('headline'); ?></span>
                        <span class="size_18 block"><?php the_sub_field('sub_headline'); ?></span>
                        <div class="divider"></div>
                        <span class="block line_height21"><?php the_sub_field('quote'); ?></span>
                        <div class="spacer_15"></div>
                        <span class="italic block line_height21 left<?php if ($logo['url'] != '') : ?> width_138<?php endif; ?>"><?php the_sub_field('quote_caption'); ?></span>
                        <?php if ($logo['url'] != '') : ?>
                            <img src="<?php echo $logo['url']; ?>" class="feature_logo left" alt="<?php echo $logo['alt']; ?>" title="<?php echo $logo['title']; ?>"/>
                        <?php endif; ?>
                        <?php while( has_sub_field('button') ): ?>
                            <a class="right promo_btn oswald size_24 bold" href="<?php the_sub_field('link'); ?>">
                                <span class="btn_left"></span>
                                <span class="btn_center"><?php the_sub_field('text'); ?> <span class="carret">&raquo;</span></span>
                                <span class="btn_right"></span>
                                <span class="clear"></span>
                            </a>
                        <?php endwhile; ?>
                        <div class="clear"></div>
                    </div>
    <?php endwhile; ?>
                    <div class="feature_nav">
                        <div class="feature_nav_inner">
                            <span class="feature_left header left"><?php the_field('feature_nav_headline'); ?></span>
                            <ul class="feature_right left">
                                <?php $nav_query = new WP_Query(array(post_parent => '143', post_type => 'page', orderby => 'menu_order', order => 'ASC', nopaging => true)); ?>
                                <?php while ( $nav_query->have_posts() ) : $nav_query->the_post(); ?>
                                    <li class="<?php echo $post->post_name;?>"><a href="<?php the_permalink(); ?>"><span></span><?php the_field('navigation_title'); ?></a></li>
                                <?php
                                    endwhile;

                                    // Prevent weirdness
                                    wp_reset_postdata();
                                ?>
                            </ul>
                            <div class="clear"></div>
                        </div>
                        <div class="feature_nav_bot"></div>
                    </div>
                </div>
    <?php while(has_sub_field('video_block')): ?>
            <?php
                $video_url = get_sub_field('video_url');
                $image = get_sub_field('image');
            ?>
            <div class="home_block_1">
                <h1 class="center"><?php the_sub_field('headline'); ?></h1>
                <a class="video_link left"<?php if ($video_url != '') : ?> href="<?php echo $video_url; ?>" data-type="youtube"<?php endif;?>>
                    <img src="<?php echo $image['url']?>" alt="<?php echo $image['alt']?>" title="<?php echo $image['title']?>" width="456" height="254"/>
                    <?php if ($video_url != '') : ?>
                        <span></span>
                    <?php endif; ?>
                </a>
                <?php if ($video_url != '') : ?>
                    <div class="lb_content_hidden">
                        <div class="longtitle"><?php the_sub_field('lightbox_headline'); ?></div>
                        <div class="headline"><?php the_sub_field('lightbox_sub_headline'); ?></div>
                        <div class="longdesc"><?php the_sub_field('lightbox_content'); ?></div>
                    </div>
                <?php endif; ?>
                <div class="video_content size_18 left">
                    <?php the_sub_field('content'); ?>
                    <?php while(has_sub_field('button')): ?>
                        <a class="video_btn" href="<?php the_sub_field('link'); ?>">
                            <?php the_sub_field('text'); ?> <span class="white carret">&raquo;</span>
                        </a>
                    <?php endwhile; ?>
                </div>
                <div class="clear"></div>
            </div>
    <?php endwhile; ?>
        </div>
    </div>
    <div id="home_wrapper2">
        <div id="home_container2">
                <div class="home_block_2">
                    <?php while(has_sub_field('logo_block')): ?>
                        <div class="content">
                            <span class="block header shadow oswald light size_30 uppercase pad_bot6"><?php the_sub_field('headline'); ?></strong></span>
                            <span class="size_15 grey_444"><?php the_sub_field('sub_headline'); ?></span>

                        </div>
                        <?php while(has_sub_field('button')): ?>
                            <a class="testimonial_btn" href="<?php the_sub_field('link'); ?>">
                                <span class="btn_left"></span>
                                    <span class="btn_center oswald uppercase">
                                        <span class="size_30 bold block"><?php the_sub_field('headline'); ?></span>
                                        <span class="size_18"><?php the_sub_field('sub_headline'); ?> <span class="carret size_18">&raquo;</span></span>
                                    </span>
                                <span class="btn_right"></span>
                                <span class="clear"></span>
                            </a>
                        <?php endwhile; ?>
                        <div class="company_logos">
                            <?php while(has_sub_field('logos')): ?>
                                <?php $logo = get_sub_field('logo'); ?>
                                <img src="<?php echo $logo['url']?>" alt="<?php echo $logo['alt']?>" title="<?php echo $logo['title']?>"/>
                            <?php endwhile; ?>
                            <div class="clear"></div>
                        </div>
                    <?php endwhile; ?>
                </div>
        </div>
        <div class="block_divider"></div>
    </div>
<?php endwhile; //end posts loop ?>
<div id="home_wrapper3">
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
<div id="home_wrapper4">
    <div id="home_container4">
        <?php get_template_part( 'nav', 'services-bottom' ); ?>
    </div>
</div>

<?php get_footer(); ?>