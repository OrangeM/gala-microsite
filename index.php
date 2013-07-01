<?php
/* WordPress uses this file as the blog index page. We're using a custom blog taxonomy instead, so let's redirect to that page. */
wp_redirect( get_permalink(254), 301 );
exit;
?>
