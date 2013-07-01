<?php
/**
 * Include template used for CTA button block in sidebar.
 *
 * @package WordPress
 * @subpackage Samasource
 */
?>


<?php if( get_field('sidebar_button_text') && get_field('sidebar_button_link') ): ?>
  <div class="sidebar_button">
    <a href="<?php the_field('sidebar_button_link'); ?>" <?php if (get_field('sidebar_button_target') == 'true'): ?>target="_blank"<?php endif;?> class="sidebar_btn oswald size_18">
      <span class="btn_left"></span>
      <span class="btn_center">
        <?php the_field('sidebar_button_text'); ?>
        <span class="carret">&raquo;</span>
      </span>
      <span class="btn_right"></span>
      <span class="clear"></span>
    </a>
  </div>
<?php endif; ?>
