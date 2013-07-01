<?php
/**
 * Template Name: Taxonomy - Blog Listing Page
 * Blog listing page template.
 *
 * @package Samasource
 */

get_header();

$template_dir = get_bloginfo('template_directory');
//$body_class_str = get_body_class_str();
?>

<div id="wrapper" class="no_quote no_promo">
    <div id="sub_wrapper">
        <div id="body_container">
            <?php get_template_part( 'nav', 'company-top' ); ?>
            <div id="sub_body" class="no_quote no_promo">
                <?php get_sidebar('blog'); ?>

                <div class="sub_content content left">
                    <?php
                    $seg3 = uri_segments(3);
                    $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
                    $wp_query = new WP_Query( array(
                        'post_type' => 'ss_blog_post',
                        'posts_per_page' => 4,
                        'orderby' => 'date',
                        'order' => 'DESC',
                        'paged'=>$paged,
                        'tax_query' => array(
                            array(
                                'taxonomy' => 'ss_blog_taxonomy',
                                'field' => 'slug',
                                'terms' => $seg3
                            )
                        )
                    ) );
                    ?>
                    <div class="blog_listing">
                        <?php while ($wp_query->have_posts()) : $wp_query->the_post();?>
                            <div class="blog_summary">
                                <?php $thumbnail = get_field('thumbnail_image'); ?>
                        <?php if (is_array($thumbnail) && $thumbnail['url'] != '') : ?>
                            <img src="<?php echo $thumbnail['url']; ?>" class="left padding_right40" width="200" height="100"/>
                                    <div class="left width_469">
                                <?php else: ?>
                                    <div class="left">
                                <?php endif;?>
                        <span class="block date"><?php echo date('F j, Y', strtotime($post->post_date));?></span>
                        <a class="uppercase oswald shadow bold size_18 black" href="<?php the_permalink(); ?>"><?php the_title(); ?></a><br/>
                        <span class="content"><?php the_field('summary'); ?></span>
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