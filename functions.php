<?php

add_theme_support( 'menus' );

add_filter("gform_user_notification_attachments", "add_attachment", 10, 3);
function add_attachment($attachments, $lead, $form){
    $upload = wp_upload_dir();
    $upload_path = $upload['basedir'] . '/white_papers/';
    $attachments = array();

    $fileupload_fields = GFCommon::get_fields_by_type($form, array("hidden"));

    if(!is_array($fileupload_fields))
        return $attachments;

    foreach($fileupload_fields as $field){
        $file_path = $upload_path . $lead[$field["id"]];
        if (file_exists($file_path)) {
            $attachments[] = $file_path;
        }
    }

    return $attachments;
}


// HubSpot: https://developers.hubspot.com/docs/methods/forms/submit_form
add_action("gform_after_submission", "do_hubspot_contact", 10, 2);
function do_hubspot_contact($entry, $form) {

  function get_value_by_label($key, $form, $entry) {
    foreach ($form['fields'] as &$field) {
      $lead_key = $field['label'];
      if ($lead_key == $key) {
        return $entry[$field['id']];
      }
    }
    return false;
  }
  $guid = get_value_by_label("hubspot_guid", $form, $entry);

  $hubspotutk = $_COOKIE['hubspotutk'];  //grab the cookie from the visitors browser.
  $ip_addr = $_SERVER['REMOTE_ADDR'];    //IP address too.
  $hs_context = array(
    'hutk' => $hubspotutk,
    'ipAddress' => $ip_addr
  );
  $hs_context_json = json_encode($hs_context);

  //Need to populate these varilables with values from the form.
  $str_post = "firstname=" . urlencode(get_value_by_label("First Name", $form, $entry))
            . "&lastname=" . urlencode(get_value_by_label("Last Name", $form, $entry))
            . "&email=" . urlencode(get_value_by_label("Email", $form, $entry))
            . "&phone=" . urlencode(get_value_by_label("Phone", $form, $entry))
            . "&company=" . urlencode(get_value_by_label("Organization", $form, $entry))
            . "&describe_your_project=" . urlencode(get_value_by_label("Describe Your Project", $form, $entry))
            . "&hs_context=" . urlencode($hs_context_json);  //Leave this one be :)

   //replace the values in this URL with your portal ID and your form GUID
  $endpoint = 'https://forms.hubspot.com/uploads/form/v2/210939/' . urlencode($guid);

  $ch = @curl_init();
  @curl_setopt($ch, CURLOPT_POST, true);
  @curl_setopt($ch, CURLOPT_POSTFIELDS, $str_post);
  @curl_setopt($ch, CURLOPT_URL, $endpoint);
  @curl_setopt($ch, CURLOPT_HTTPHEADER, array('application/x-www-form-urlencoded'));
  @curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
  $response = @curl_exec($ch);  //Log the response from HubSpot as needed.
  @curl_close($ch);
}


function my_scripts_method() {
	global $wp;
	$post_id = get_the_ID();

    wp_deregister_script( 'jquery' );
    wp_register_script( 'jquery', get_template_directory_uri() . '/js/jquery-1.8.0.min.js');
    wp_enqueue_script( 'jquery' );

	wp_enqueue_script('ss_main',get_template_directory_uri() . '/js/main.js',array('jquery'), false, true);

    /*
	//Filter scripts
	if ($post_id == 4 || $post_id == 7 || $post_id == 11) {
		//quicksand
		wp_enqueue_script('battery_quicksand',get_template_directory_uri() . '/js/js_quicksand.js',array('jquery'), false, true);
		//lazy load
		wp_enqueue_script('battery_lazyload',get_template_directory_uri() . '/js/jquery.lazyload.min.js',array('jquery'), false, true);
	}*/
}

add_action('wp_enqueue_scripts', 'my_scripts_method');


if ( function_exists('register_sidebars') ) {
	register_sidebar(array('name'=>'Careers','id'=>'ss_careers'));
}



/* CUSTOM POST TYPES */
add_action( 'init', 'create_post_types_and_taxonomies' );

function create_post_types_and_taxonomies() {
    create_ss_blog_post();
    create_blog_taxonomy();
    create_ss_news_article();
    create_news_taxonomy();
    create_ss_press_release();
    create_press_taxonomy();
}

function create_ss_blog_post() {

    $post_type = 'ss_blog_post';

    $labels = array(
        'name' => __( 'Blog Posts' ),
        'singular_name' => __( 'Blog Post' )
    );

    $args = array(
        'labels' => $labels,
        'public' => true,
        'publicly_queryable' => true,
        'capability_type' => 'post',
        'hierarchical' => false,
        'has_archive' => true,
        'rewrite' => array('slug' => 'company/blog')
    );

    register_post_type( $post_type, $args);

}

function create_blog_taxonomy() {

    $labels = array(
        'name' => _x( 'Blog Categories', 'taxonomy general name' ),
        'singular_name' => _x( 'Blog Category', 'taxonomy singular name' )
    );

    register_taxonomy('ss_blog_taxonomy', array('ss_blog_post'), array(
        'hierarchical' => true,
        'labels' => $labels,
        'show_ui' => true,
        'query_var' => true,
        'rewrite' => array('slug'=>'company/the-blog')
    ));

}

function create_ss_news_article() {

    $post_type = 'ss_news_article';

    $labels = array(
        'name' => __( 'News Articles' ),
        'singular_name' => __( 'News Article' )
    );

    $args = array(
        'labels' => $labels,
        'public' => true,
        'publicly_queryable' => true,
        'capability_type' => 'post',
        'hierarchical' => false,
        'has_archive' => true,
        'rewrite' => array('slug' => 'company/latest-news')
    );

    register_post_type( $post_type, $args);
}

function create_news_taxonomy() {
    $labels = array(
        'name' => _x( 'News Categories', 'taxonomy general name' ),
        'singular_name' => _x( 'News Category', 'taxonomy singular name' )
    );

    register_taxonomy('ss_news_taxonomy', array('ss_news_article'), array(
        'hierarchical' => true,
        'labels' => $labels,
        'show_ui' => true,
        'query_var' => true,
        'rewrite' => array('slug'=>'company/news')
    ));
}

function create_ss_press_release() {

    $post_type = 'ss_press_release';

    $labels = array(
        'name' => __( 'Press Releases' ),
        'singular_name' => __( 'Press Release' )
    );

    $args = array(
        'labels' => $labels,
        'public' => true,
        'publicly_queryable' => true,
        'capability_type' => 'post',
        'hierarchical' => false,
        'has_archive' => true,
        'rewrite' => array('slug' => 'company/press')
    );

    register_post_type( $post_type, $args);
}

function create_press_taxonomy() {
    $labels = array(
        'name' => _x( 'Press Categories', 'taxonomy general name' ),
        'singular_name' => _x( 'Press Category', 'taxonomy singular name' )
    );

    register_taxonomy('ss_press_taxonomy', array('ss_press_release'), array(
        'hierarchical' => true,
        'labels' => $labels,
        'show_ui' => true,
        'query_var' => true,
        'rewrite' => array('slug'=>'company/press-releases')
    ));
}

function remove_parent_links($params) {
    $params['echo'] = 0;

    $pages = wp_list_pages($params);
    $pages = explode("</li>", $pages);
    $count = 0;
    foreach($pages as $page) {
        if(strstr($page,"<ul class='children'>")) {
            $page = explode("<ul class='children'>", $page);
            //echo $page[0];
            $page[0] = str_replace('</a>','',$page[0]);
            $page[0] = preg_replace('/\<a(.*)\>/','',$page[0]);
            if(count($page) == 3) {
                $page[1] = str_replace('</a>','',$page[1]);
                $page[1] = preg_replace('/\<a(.*)\>/','',$page[1]);
            }
            $page = implode("<ul class='children'>", $page);
        }
        $pages[$count] = $page;
        $count++;
    }
    $pages = implode('</li>',$pages);
    echo $pages;
}

function uri_segments($n) {
    $segments = explode('/', $_SERVER['REQUEST_URI']);

    return $segments[$n];
}

function get_body_class_str() {
    $body_class_str = '';

    while (have_posts()) {
        the_post();
        $sub_banner_img = get_field('header_image');
        if (!has_sub_field('quote_block')) $body_class_str .= 'no_quote ';

        if (!has_sub_field('promotion')) {
            if (is_array($sub_banner_img)) $body_class_str .= 'no_promo_header';
            else $body_class_str .= 'no_promo';
        }

        while (has_sub_field('promotion')) {}
        while (has_sub_field('quote_block')) {}
    }

    return $body_class_str;
}

/*
add_filter('post_link', 'category_permalink', 10, 3);
add_filter('post_type_link', 'category_permalink', 10, 3);

function category_permalink($permalink, $post_id, $leavename) {
    if (strpos($permalink, '%category%') === FALSE) return $permalink;

    echo 'TESTINGGGGGGGG';
    // Get post
    $post = get_post($post_id);
    if (!$post) return $permalink;

    // Get taxonomy terms
    $terms = wp_get_object_terms($post->ID, 'category');
    if (!is_wp_error($terms) && !empty($terms) && is_object($terms[0])) $taxonomy_slug = $terms[0]->slug;
    else $taxonomy_slug = 'no-catgeory';

    return str_replace('%category%', $taxonomy_slug, $permalink);
}*/


//Custom Theme Settings
add_action('admin_menu', 'add_gcf_interface');
function add_gcf_interface() {
    add_options_page('Global Custom Fields', 'Global Custom Fields', '8', 'functions', 'editglobalcustomfields');
}

function editglobalcustomfields() {
    ?>
<div class='wrap'>
    <h2>Global Custom Fields</h2>
    <form method="post" action="options.php">
        <?php wp_nonce_field('update-options') ?>

        <p><strong>Facebook URL:</strong><br />
            <input type="text" name="facebook_url" size="45" value="<?php echo get_option('facebook_url'); ?>" /></p>

        <p><strong>Twitter URL:</strong><br />
            <input type="text" name="twitter_url" size="45" value="<?php echo get_option('twitter_url'); ?>" /></p>

        <p><strong>LinkedIn URL:</strong><br />
            <input type="text" name="linkedin_url" size="45" value="<?php echo get_option('linkedin_url'); ?>" /></p>

        <p><strong>Google+ URL:</strong><br />
            <input type="text" name="google_plus_url" size="45" value="<?php echo get_option('google_plus_url'); ?>" /></p>

        <p><strong>Youtube URL:</strong><br />
            <input type="text" name="youtube_url" size="45" value="<?php echo get_option('youtube_url'); ?>" /></p>

        <p><input type="submit" name="Submit" value="Update Options" /></p>

        <input type="hidden" name="action" value="update" />
        <input type="hidden" name="page_options" value="facebook_url,twitter_url,linkedin_url,google_plus_url,youtube_url" />

    </form>
</div>
<?php
}


// HIDE THE EDITOR ON CERTAIN CUSTOM POST TYPES
add_action('admin_head', 'hide_editor');
function hide_editor() {
    $post_type = get_post_type();
    $id = get_the_ID();
    $template = get_page_template();

    //return substr($haystack, -strlen($needle))===$needle;

    if($post_type == 'ss_video' || $post_type == 'ss_feature' || get_permalink($id) == home_url().'/') {
        ?>
    <style>
        #postdivrich { display:none; }
    </style>
    <?php
    }


    if($post_type != 'ss_testimonial') {
        ?>
    <style>
        #p2p-to-testimonial_to_page { display:none; }
    </style>
    <?php
    }

    //Hide these connection fields for all entries but the homepage
    if (get_permalink($id) != home_url().'/') {
        ?>
    <style>
        #p2p-from-video_to_page { display:none; }
        #p2p-from-feature_to_page { display:none; }
        #p2p-to-video_to_page { display:none; }
        #p2p-to-feature_to_page { display:none; }
    </style>

    <?php
    }
}


if(function_exists('register_field')) {
  register_field('Gravity_Forms_field', dirname(__File__).'/Custom-Fields/gravity_forms.php');
}


/*Add unique icons to the custom post types in the admin menu */
add_action( 'admin_head', 'cpt_icons' );
function cpt_icons() {
    ?>
<style type="text/css" media="screen">
    #adminmenu #menu-posts-ss_employee .wp-menu-image {
        background: url(<?php bloginfo('template_directory') ?>/images/user-detective.png) no-repeat 6px -17px !important;
    }
    #adminmenu #menu-posts-ss_employee:hover .wp-menu-image, #menu-posts-ss_employee.wp-has-current-submenu .wp-menu-image {
        background-position:6px 7px!important;
    }

    #adminmenu #menu-posts-ss_promotion .wp-menu-image {
        background: url(<?php bloginfo('template_directory') ?>/images/document-pdf-text.png) no-repeat 6px -17px !important;
    }
    #adminmenu #menu-posts-ss_promotion:hover .wp-menu-image, #menu-posts-ss_promotion.wp-has-current-submenu .wp-menu-image {
        background-position:6px 7px!important;
    }

    #adminmenu #menu-posts-ss_news_article .wp-menu-image {
        background: url(<?php bloginfo('template_directory') ?>/images/newspapers.png) no-repeat 6px -17px !important;
    }
    #adminmenu #menu-posts-ss_news_article:hover .wp-menu-image, #menu-posts-ss_news_article.wp-has-current-submenu .wp-menu-image {
        background-position:6px 7px!important;
    }

    #adminmenu #menu-posts-ss_feature .wp-menu-image {
        background: url(<?php bloginfo('template_directory') ?>/images/slides-stack.png) no-repeat 6px -17px !important;
    }
    #adminmenu #menu-posts-ss_feature:hover .wp-menu-image, #menu-posts-ss_feature.wp-has-current-submenu .wp-menu-image {
        background-position:6px 7px!important;
    }

    #adminmenu #menu-posts-ss_blog_post .wp-menu-image {
        background: url(<?php bloginfo('template_directory') ?>/images/blogs-stack.png) no-repeat 6px -17px !important;
    }
    #adminmenu #menu-posts-ss_blog_post:hover .wp-menu-image, #menu-posts-ss_blog_post.wp-has-current-submenu .wp-menu-image {
        background-position:6px 7px!important;
    }

    #adminmenu #menu-posts-ss_testimonial .wp-menu-image {
         background: url(<?php bloginfo('template_directory') ?>/images/thumb-up.png) no-repeat 6px -17px !important;
     }
    #adminmenu #menu-posts-ss_testimonial:hover .wp-menu-image, #menu-posts-ss_testimonial.wp-has-current-submenu .wp-menu-image {
        background-position:6px 7px!important;
    }

    #adminmenu #menu-posts-ss_press_release .wp-menu-image {
        background: url(<?php bloginfo('template_directory') ?>/images/microphone.png) no-repeat 6px -17px !important;
    }
    #adminmenu #menu-posts-ss_press_release:hover .wp-menu-image, #menu-posts-ss_press_release.wp-has-current-submenu .wp-menu-image {
        background-position:6px 7px!important;
    }

    #adminmenu #menu-posts-ss_video .wp-menu-image {
        background: url(<?php bloginfo('template_directory') ?>/images/film.png) no-repeat 6px -17px !important;
    }
    #adminmenu #menu-posts-ss_video:hover .wp-menu-image, #menu-posts-ss_video.wp-has-current-submenu .wp-menu-image {
        background-position:6px 7px!important;
    }
</style>
<?php }

