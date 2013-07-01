<?php
/**
 * Include template used for blog posts in sidebar.
 *
 * @package WordPress
 * @subpackage Samasource
 */
?>


<span class="header uppercase oswald">related <b>blog posts</b></span>
<?php
    if (get_field('sidebar_blog_category')){
      $category_query = array(
                          array(
                            'taxonomy' => 'ss_blog_taxonomy',
                            'field' => 'slug',
                            'terms' => get_field('sidebar_blog_category')
                          )
                        );
    }
    $blog_query = new WP_Query( array(
        'post_type' => 'ss_blog_post',
        'posts_per_page' => 2,
        'orderby' => 'date',
        'order' => 'DESC',
        'tax_query' => $category_query
    ));
?>

<?php while ($blog_query->have_posts()) : $blog_query->the_post();?>
    <div class="blog_post">
        <span class="date block"><?php echo date('F j, Y', strtotime($post->post_date));?></span>
        <a href="<?php the_permalink(); ?>" class="external"><?php the_title(); ?></a>
    </div>
<?php
    endwhile;

    // Prevent weirdness
    wp_reset_postdata();
?>
<a class="uppercase blue size_18 oswald full_blog_link" href="<?php echo site_url('company/the-blog/'); ?>">view full blog &raquo;</a>
