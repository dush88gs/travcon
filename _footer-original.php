<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package travcon
 */

?>

<?php
  $fw_one_heading = get_field('fw_one_heading', 'option');
  $fw_one_descripton = get_field('fw_one_descripton', 'option');

  $fw_two_heading = get_field('fw_two_heading', 'option');
  $footer_address = get_field('footer_address', 'option');
  $footer_mobile_no = get_field('footer_mobile_no', 'option');
  $footer_mobile_no_trimmed = str_replace(' ', '', $footer_mobile_no);
  $footer_office_no = get_field('footer_office_no', 'option');
  $footer_office_no_trimmed = str_replace(' ', '', $footer_office_no);
  $footer_email = get_field('footer_email', 'option');

  $fw_three_heading = get_field('fw_three_heading', 'option');
?>

	<footer class="bg-dark type-2">
    <div class="container">
      <div class="row">
        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
          <div class="footer-block">
            <h6><?php echo $fw_one_heading; ?></h6>
            <div class="f_text color-grey-7"><?php echo $fw_one_descripton; ?></div>
          </div>
        </div>
        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
          <div class="footer-block">
            <h6><?php echo $fw_two_heading; ?></h6>
            <div class="contact-info">
              <div class="contact-line color-grey-3">
                <i class="fa fa-map-marker"></i>
                <span><?php echo $footer_address; ?></span>
              </div>
              <div class="contact-line color-grey-3">
                <i class="fa fa-mobile"></i>
                <a href="tel:<?php echo $footer_mobile_no_trimmed; ?>"><?php echo $footer_mobile_no; ?></a>
              </div>
              <div class="contact-line color-grey-3">
                <i class="fa fa-phone"></i>
                <a href="tel:<?php echo $footer_office_no_trimmed; ?>"><?php echo $footer_office_no; ?></a>
              </div>
              <div class="contact-line color-grey-3">
                <i class="fa fa-envelope-o"></i>
                <a href="mailto:<?php echo $footer_email; ?>"><?php echo $footer_email; ?></a>
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
          <div class="footer-block">
            <h6><?php echo $fw_three_heading; ?></h6>
            <div class="footer-share">
              <?php if( have_rows('fw_three_social', 'option') ): ?>
                <?php while( have_rows('fw_three_social', 'option') ): the_row(); ?>
                <?php
                  $footer_social_icon = get_sub_field('footer_social_icon');
                  $footer_social_link = get_sub_field('footer_social_link');
                ?>
                <a href="<?php echo $footer_social_link; ?>"><?php echo $footer_social_icon; ?>
                </a>
                <?php endwhile; ?>
              <?php endif; ?>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="footer-link bg-black">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="copyright">
              <p>&copy; <?php echo date('Y'); ?> <?php bloginfo('name'); ?> &bull; Solution by
                <a href="https://digitecz.com">
                  <img class="digitecz-logo" src="<?php echo get_bloginfo('template_directory'); ?>/assets/img/travcon/digitecz.png">
                </a>
              </p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </footer>

  <script src="<?php echo get_bloginfo('template_directory'); ?>/assets/js/jquery-2.1.4.min.js"></script>
  <script src="<?php echo get_bloginfo('template_directory'); ?>/assets/js/bootstrap.min.js"></script>
  <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/3.5.4/select2.min.js"></script> -->
  <script src="<?php echo get_bloginfo('template_directory'); ?>/assets/js/select2.min.js"></script>
  <script src="<?php echo get_bloginfo('template_directory'); ?>/assets/js/owl.carousel.min.js"></script>
  <script src="<?php echo get_bloginfo('template_directory'); ?>/assets/js/jquery-ui.min.js"></script>
  <script src="<?php echo get_bloginfo('template_directory'); ?>/assets/js/idangerous.swiper.min.js"></script>
  <script src="<?php echo get_bloginfo('template_directory'); ?>/assets/js/jquery.viewportchecker.min.js"></script>
  <script src="<?php echo get_bloginfo('template_directory'); ?>/assets/js/isotope.pkgd.min.js"></script>
  <script src="<?php echo get_bloginfo('template_directory'); ?>/assets/js/jquery.mousewheel.min.js"></script>
  <script src="<?php echo get_bloginfo('template_directory'); ?>/assets/js/jquery.magnific-popup.min.js"></script>
  <script src="<?php echo get_bloginfo('template_directory'); ?>/assets/js/jquery.matchHeight.js"></script>
  <!-- <script src="http://cdnjs.cloudflare.com/ajax/libs/ScrollMagic/2.0.5/ScrollMagic.min.js"></script> -->
  <script src="<?php echo get_bloginfo('template_directory'); ?>/assets/js/ScrollMagic.min.js"></script>
  <script src="<?php echo get_bloginfo('template_directory'); ?>/assets/js/all.js"></script>

<?php wp_footer(); ?>

</body>
</html>
