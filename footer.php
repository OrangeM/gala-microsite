    <?php
    /**
     * @package Battery
     */
        global $acs;
        $home_url = home_url();
    ?>
    <div class="clear"></div>
<div id="footer2">
    <div id="global_footer">
        <div class="footer_inner uppercase oswald black_shadow">
            <?php wp_nav_menu( array(menu => 'Global Footer Menu', container => false) ); ?>
        </div>
    </div> <div class="clear"></div>
</div>

    <script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0];if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src="//platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>

    <!-- Start of Async HubSpot Analytics Code -->
    <script type="text/javascript">
        (function(d,s,i,r) {
            if (d.getElementById(i)){return;}
            var n=d.createElement(s),e=d.getElementsByTagName(s)[0];
            n.id=i;n.src='//js.hubspot.com/analytics/'+(Math.ceil(new Date()/r)*r)+'/210939.js';
            e.parentNode.insertBefore(n, e);
        })(document,"script","hs-analytics",300000);
    </script>
    <!-- End of Async HubSpot Analytics Code -->

	<?php wp_footer(); ?>
</body>
</html>