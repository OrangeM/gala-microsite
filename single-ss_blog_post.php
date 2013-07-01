<?php
    /**
     * Blog post detail page
     *
     * @package Battery
     */

    get_header();
    $body_class_str = get_body_class_str();
?>


<div id="wrapper" class="<?php echo $body_class_str; ?>">
    <div id="sub_wrapper">
        <div id="body_container">
            <?php get_template_part( 'nav', 'company-top' ); ?>
            <?php get_template_part( 'block', 'promo' ); ?>
            <div id="sub_body" class="<?php echo $body_class_str; ?>">
                <?php get_sidebar('blog'); ?>
                <div class="sub_content content left">
                    <?php while ( have_posts() ) : the_post(); ?>
                        <span class="block date"><?php echo date('F j, Y', strtotime($post->post_date));?></span>
                        <h1 class="uppercase oswald shadow bold" ><?php the_title(); ?></h1>
                        <?php the_content(); ?>
                    <?php endwhile; ?>
		    <div id="disqus_thread"></div>
    <script type="text/javascript">
        /* * * CONFIGURATION VARIABLES: EDIT BEFORE PASTING INTO YOUR WEBPAGE * * */
        var disqus_shortname = 'samasource'; 
                
        /* * * DON'T EDIT BELOW THIS LINE * * */
        (function() {
            var dsq = document.createElement('script'); dsq.type = 'text/javascript'; dsq.async = true;
            dsq.src = '//' + disqus_shortname + '.disqus.com/embed.js';
            (document.getElementsByTagName('head')[0] || document.getElementsByTagName('body')[0]).appendChild(dsq);
        })();
    </script>
    <noscript>Please enable JavaScript to view the <a href="http://disqus.com/?ref_noscript">comments powered by Disqus.</a></noscript>
    <a href="http://disqus.com" class="dsq-brlink">comments powered by <span class="logo-disqus">Disqus</span></a>
                </div>
    
                <div class="clear"></div>
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
