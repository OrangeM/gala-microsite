<?php
/**
 * Template Name: Company - News Listing Page
 * News listing page template.
 *
 * @package Samasource
 */

get_header();

$template_dir = get_bloginfo('template_directory');

$body_class_str = get_body_class_str();
?>


<div id="wrapper" class="<?php echo $body_class_str; ?>">
    <div id="sub_wrapper">
        <div id="body_container">
            <?php get_template_part( 'nav', 'company-top' ); ?>
            <?php get_template_part( 'block', 'promo' ); ?>
            <div id="sub_body" class="<?php echo $body_class_str; ?>">
                <?php get_sidebar('news'); ?>

                <div class="sub_content content left">
                    <?php while ( have_posts() ) : the_post(); ?>
                    <?php the_content(); ?>
                    <?php endwhile; ?>

                    <?php
                    $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
                    $wp_query = new WP_Query( array(
                        'post_type' => 'ss_news_article',
                        'posts_per_page' => 4,
                        'orderby' => 'date',
                        'order' => 'DESC',
                        'paged'=>$paged
                    ) );
                    ?>
                    <div class="blog_listing">
                        <?php while ($wp_query->have_posts()) : $wp_query->the_post();?>
                        <div class="blog_summary news_summary">
                            <?php $thumbnail = get_field('thumbnail_image'); ?>
                            <?php if (is_array($thumbnail) && $thumbnail['url'] != '') : ?>
                                <img src="<?php echo $thumbnail['url']; ?>" class="left padding_right40" width="200" height="100"/>
                                <div class="left width_469">
                            <?php else: ?>
                                <div class="left">
                            <?php endif;?>
                                    <span class="block date"><?php echo date('F j, Y', strtotime($post->post_date));?></span>
                                    <a class="uppercase oswald shadow bold size_18 black" href="<?php the_field('external_url'); ?>" target="_blank"><?php the_title(); ?></a><br/>
                                    <span class="content"><?php the_content(); ?></span>
                                </div>
                            <div class="clear"></div>
                        </div>
                        <?php endwhile; ?>
                    </div>
                    <?php
                    $big = 999999999; // need an unlikely integer

                    echo paginate_links( array(
                        'base' => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
                        'format' => '?paged=%#%',
                        'current' => max( 1, get_query_var('paged') ),
                        'total' => $wp_query->max_num_pages
                    ) );
                    ?>

                </div>
                <div class="clear"></div>
            </div>
            <div id="sub_bottom">
                <?php get_template_part( 'block', 'quote' ); ?>
                <?php get_template_part( 'nav', 'company-bottom' ); ?>
            </div>
        </div>
    </div>
</div>

<?php
get_footer();