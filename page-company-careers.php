<?php
/**
 * Template Name: Company - Careers Page
 * Careers page template.
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
                <?php get_sidebar('simple'); ?>
                <div class="sub_content content left">
                    <?php while ( have_posts() ) : the_post(); ?>
                        <?php the_content(); ?>

                        <?php
                        $upload = wp_upload_dir();
                        $xml_file = $upload['basedir'] . '/careers_feed/careers.xml';

                        $feed_updated = filemtime($xml_file);
                        $current_time = time();

                        if($current_time - $feed_updated >= 3600) {
                            $ch = curl_init();
                            curl_setopt($ch, CURLOPT_URL, get_field('resumator_feed_url'));
                            curl_setopt($ch, CURLOPT_HEADER, false);
                            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                            $xmlString = curl_exec($ch);
                            curl_close($ch);
                            if($xmlString != '') {
                                file_put_contents($xml_file,$xmlString);
                            } else {
                                $xmlString = file_get_contents($xml_file);
                            }
                        } else {
                            $xmlString = file_get_contents($xml_file);
                        }

                        $xml = simplexml_load_string($xmlString);

                        ?>

                        <ul>
                            <?php foreach ($xml->job as $job) : ?>
                            <li><a href="<?php echo $job->url; ?>"><?php echo $job->title; ?></a></li>
                            <?php endforeach; ?>
                        </ul>
                    <?php endwhile; ?>


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