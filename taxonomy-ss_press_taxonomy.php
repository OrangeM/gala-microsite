<?php
/**
 * Template Name: Taxonomy - Press Listing Page
 * Press listing page template (Taxonomy).
 *
 * @package Samasource
 */

get_header();

$template_dir = get_bloginfo('template_directory');
$body_class_str = get_body_class_str();
?>

<div id="wrapper"class="<?php echo $body_class_str; ?>">
    <div id="sub_wrapper">
        <div id="body_container">
            <?php get_template_part( 'nav', 'company-top' ); ?>
            <?php get_template_part( 'block', 'promo' ); ?>
            <div id="sub_body"class="<?php echo $body_class_str; ?>">
                <?php get_sidebar('press'); ?>

                <div class="sub_content content left">
                    <div class="blog_listing">
                    <?php
                    $seg3 = uri_segments(3);
                    $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
                    $wp_query = new WP_Query( array(
                        'post_type' => 'ss_press_release',
                        'posts_per_page' => 4,
                        'orderby' => 'date',
                        'order' => 'DESC',
                        'paged'=>$paged,
                        'tax_query' => array(
                            array(
                                'taxonomy' => 'ss_press_taxonomy',
                                'field' => 'slug',
                                'terms' => $seg3
                            )
                        )
                    ) );
                    ?>

                    <?php while ($wp_query->have_posts()) : $wp_query->the_post();?>
                    <?php $pdf = get_field('pdf_file');?>
                    <div class="blog_summary">
                        <span class="block date"><?php echo date('F j, Y', strtotime($post->post_date));?></span>
                        <?php if (is_array($pdf)) : ?>
                        <a class="uppercase oswald shadow bold size_18 black" target="_blank" href="<?php echo $pdf['url'] ?>"><?php the_title(); ?></a><br/>
                        <?php else : ?>
                        <a class="uppercase oswald shadow bold size_18 black" href="<?php the_permalink(); ?>"><?php the_title(); ?></a><br/>
                        <?php endif; ?>
                        <span class="content"><?php the_field('summary'); ?></span>
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