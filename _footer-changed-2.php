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
  $footer_sl_address = get_field('footer_sl_address', 'option');
  $footer_sl_mobile_no = get_field('footer_sl_mobile_no', 'option');
  $footer_sl_mobile_no_trimmed = str_replace(' ', '', $footer_sl_mobile_no);
  $footer_sl_office_no = get_field('footer_sl_office_no', 'option');
  $footer_sl_office_no_trimmed = str_replace(' ', '', $footer_sl_office_no);
  $footer_sl_email = get_field('footer_sl_email', 'option');

  $fw_three_heading = get_field('fw_three_heading', 'option');
  $footer_mv_address = get_field('footer_mv_address', 'option');
  $footer_mv_mobile_no = get_field('footer_mv_mobile_no', 'option');
  $footer_mv_mobile_no_trimmed = str_replace(' ', '', $footer_mv_mobile_no);
  $footer_mv_office_no = get_field('footer_mv_office_no', 'option');
  $footer_mv_office_no_trimmed = str_replace(' ', '', $footer_mv_office_no);
  $footer_mv_email = get_field('footer_mv_email', 'option');

  $fw_four_heading = get_field('fw_four_heading', 'option');
?>

	<footer class="bg-dark type-2">
    <div class="container-fluid">
      <div class="row">
        <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
          <div class="footer-block">
            <h6><?php echo $fw_one_heading; ?></h6>
            <div class="f_text color-grey-7"><?php echo $fw_one_descripton; ?></div>
          </div>
        </div>
        <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12">
          <div class="row">
            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
              <div class="footer-block">
                <h6><?php echo $fw_two_heading; ?></h6>
                <div class="contact-info">
                  <div class="contact-line color-grey-3">
                    <i class="fa fa-map-marker"></i>
                    <span><?php echo $footer_sl_address; ?></span>
                  </div>
                  <div class="contact-line color-grey-3">
                    <i class="fa fa-mobile"></i>
                    <a href="tel:<?php echo $footer_sl_mobile_no_trimmed; ?>"><?php echo $footer_sl_mobile_no; ?></a>
                  </div>
                  <div class="contact-line color-grey-3">
                    <i class="fa fa-phone"></i>
                    <a href="tel:<?php echo $footer_sl_office_no_trimmed; ?>"><?php echo $footer_sl_office_no; ?></a>
                  </div>
                  <div class="contact-line color-grey-3">
                    <i class="fa fa-envelope-o"></i>
                    <a href="mailto:<?php echo $footer_sl_email; ?>"><?php echo $footer_sl_email; ?></a>
                  </div>
                </div>
              </div>
            </div>
            <!-- <div class="visible-sm clearfix"></div> -->
            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
              <div class="footer-block">
                <h6><?php echo $fw_three_heading; ?></h6>
                <div class="contact-info">
                  <div class="contact-line color-grey-3">
                    <i class="fa fa-map-marker"></i>
                    <span><?php echo $footer_mv_address; ?></span>
                  </div>
                  <div class="contact-line color-grey-3">
                    <i class="fa fa-mobile"></i>
                    <a href="tel:<?php echo $footer_mv_mobile_no_trimmed; ?>"><?php echo $footer_mv_mobile_no; ?></a>
                  </div>
                  <div class="contact-line color-grey-3">
                    <i class="fa fa-phone"></i>
                    <a href="tel:<?php echo $footer_mv_office_no_trimmed; ?>"><?php echo $footer_mv_office_no; ?></a>
                  </div>
                  <div class="contact-line color-grey-3">
                    <i class="fa fa-envelope-o"></i>
                    <a href="mailto:<?php echo $footer_mv_email; ?>"><?php echo $footer_mv_email; ?></a>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
          <div class="footer-block">
            <!-- <h6><?php //echo $fw_four_heading; ?></h6> -->
            <div class="footer-share text-center">
              <?php if( have_rows('fw_four_social', 'option') ): ?>
                <?php while( have_rows('fw_four_social', 'option') ): the_row(); ?>
                <?php
                  $footer_social_icon = get_sub_field('footer_social_icon');
                  $footer_social_link = get_sub_field('footer_social_link');
                ?>
                <a href="<?php echo $footer_social_link; ?>" target="_blank"><?php echo $footer_social_icon; ?>
                </a>
                <?php endwhile; ?>
              <?php endif; ?>
            </div>
          </div>
        </div>
      </div>

    </div>
    <div class="footer-link bg-black">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-6">
            <div class="copyright">
              <p>&copy; <?php echo date('Y'); ?> <?php bloginfo('name'); ?> &bull; Solution by
                <a href="https://digitecz.com">
                  <img class="digitecz-logo" src="<?php echo get_bloginfo('template_directory'); ?>/assets/img/travcon/digitecz.png">
                </a>
              </p>
            </div>
          </div>
          <div class="col-md-6">
            <div class="copyright">
              <div class="visa-master">
                <span>We accept</span>
                <img src="<?php echo get_bloginfo('template_directory'); ?>/assets/img/travcon/logo-visa.jpg" width="auto" height="25" alt="visa logo">
                <img src="<?php echo get_bloginfo('template_directory'); ?>/assets/img/travcon/logo-mastercard.jpg" width="auto" height="25" alt="mastercard logo">
            </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </footer>

  <script src="<?php echo get_bloginfo('template_directory'); ?>/assets/js/jquery-2.1.4.min.js"></script>
  <script src="<?php echo get_bloginfo('template_directory'); ?>/assets/js/bootstrap.min.js"></script>
  <script src="<?php echo get_bloginfo('template_directory'); ?>/assets/js/select2.min.js"></script>
  <script src="<?php echo get_bloginfo('template_directory'); ?>/assets/js/jClocksGMT.js"></script>
  <script src="<?php echo get_bloginfo('template_directory'); ?>/assets/js/jquery.rotate.js"></script>
  <script src="<?php echo get_bloginfo('template_directory'); ?>/assets/js/owl.carousel.min.js"></script>
  <script src="<?php echo get_bloginfo('template_directory'); ?>/assets/js/jquery-ui.min.js"></script>
  <script src="<?php echo get_bloginfo('template_directory'); ?>/assets/js/moment.min.js"></script>
  <script src="<?php echo get_bloginfo('template_directory'); ?>/assets/js/daterangepicker.min.js"></script>
  <script src="<?php echo get_bloginfo('template_directory'); ?>/assets/js/idangerous.swiper.min.js"></script>
  <script src="<?php echo get_bloginfo('template_directory'); ?>/assets/js/jquery.viewportchecker.min.js"></script>
  <script src="<?php echo get_bloginfo('template_directory'); ?>/assets/js/isotope.pkgd.min.js"></script>
  <script src="<?php echo get_bloginfo('template_directory'); ?>/assets/js/jquery.mousewheel.min.js"></script>
  <script src="<?php echo get_bloginfo('template_directory'); ?>/assets/js/jquery.magnific-popup.min.js"></script>
  <script src="<?php echo get_bloginfo('template_directory'); ?>/assets/js/jquery.matchHeight.js"></script>
  <script src="<?php echo get_bloginfo('template_directory'); ?>/assets/js/jquery.gridder.min.js"></script>
  <script src="<?php echo get_bloginfo('template_directory'); ?>/assets/js/ScrollMagic.min.js"></script>
  <script src="<?php echo get_bloginfo('template_directory'); ?>/assets/js/all.js"></script>

<?php wp_footer(); ?>

</body>
</html>
