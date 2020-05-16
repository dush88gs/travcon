<?php
/**
 * The template for displaying single posts of Excursion Packages
 *
 *
 * @package travcon
 */

get_header();

$args = array(
		'post_type' => 'tlc_excursions',
		'orderby' => 'ASC',
	);
	$the_query = new WP_Query( $args );
	?>

	<?php if ( $the_query->have_posts() ) : ?>

  <?php
    $excursion_details = get_field('excursion_details');
    $excursion_featured_image = $excursion_details['excursion_featured_image'];
		$excursion_distance = $excursion_details['excursion_distance'];
		$exc_locations_list = $excursion_details['exc_locations_list'];
		$locations_count = count($exc_locations_list);
		$exc_trav_time = $excursion_details['exc_trav_time'];
		$exc_visit_time = $excursion_details['exc_visit_time'];
		$i = 1;
	?>

		<div class="inner-banner style-6 background-block" style="background-image: url('<?php echo $excursion_featured_image; ?>');"></div>

		<div class="main-wraper">
			<div class="container-fluid">
				<div class="row single-excursion">
					<div class="col-md-12">
            <h3 class="color-blue-2 single-heading"><?php the_title(); ?></h3>
          </div>
          <div class="row padd-15">
            <div class="col-md-6">
              <div class="detail-block bg-blue-2">
                <h4 class="color-white">Excursion Details</h4>
                <div class="details-desc">
                  <p class="color-blue-4">Package:
                    <span class="color-white"><?php the_title(); ?></span>
                  </p>
                  <p class="color-blue-4">Distance:
                    <span class="color-white"><?php echo $excursion_distance; ?></span>
                  </p>
                  <p class="color-blue-4">Locations:
                    <?php if( have_rows('excursion_details') ): ?>
                    <?php while( have_rows('excursion_details') ): the_row(); ?>
                      <?php if( have_rows('exc_locations_list') ): ?>
                        <?php while( have_rows('exc_locations_list') ): the_row();
                            $excursion_location = get_sub_field('excursion_location');
                          ?>
                        <span class="color-white"><?php echo $excursion_location; ?>
                          <?php if ($i < $locations_count) : ?>
                            <?php 
                              echo " / ";
                            ?>
                          <?php endif; ?>
                        </span>
                        <?php $i++; endwhile; ?>
                      <?php endif; ?>
                    <?php endwhile; ?>
                    <?php endif; ?>
                  </p>
                  <p class="color-blue-4">Travelling Time:
                    <span class="color-white"><?php echo $exc_trav_time; ?></span>
                  </p>
                  <p class="color-blue-4">Visiting Time:
                    <span class="color-white"><?php echo $exc_visit_time; ?></span>
                  </p>
                </div>
                <div class="details-btn">
                  <a href="" data-toggle="modal" data-target="#formModal" class="c-button b-40 bg-white hv-transparent">
                    <span>Book this tour</span>
                  </a>
                </div>
              </div>
            </div>
            <div class="col-md-6">
              <div class="help-contact bg-grey-2">
                <?php
                  $exc_need_help = get_field('exc_need_help');
                  $exc_need_help_description = $exc_need_help['exc_need_help_description'];
                  $exc_need_help_phone = $exc_need_help['exc_need_help_phone'];
                  $exc_need_help_phone_trimmed = str_replace(' ', '', $exc_need_help_phone);
                  $exc_need_help_email = $exc_need_help['exc_need_help_email'];
                ?>
                <h4 class="color-dark-2">Need Help?</h4>
                <p>
                  <?php echo $exc_need_help_description; ?>
                </p>
                <a class="help-phone color-dark-2 link-blue" href="tel:<?php echo $exc_need_help_phone_trimmed; ?>">
                  <img src="<?php echo get_template_directory_uri(); ?>/assets/img/travcon/contact/phone.svg" alt=""><?php echo $exc_need_help_phone; ?></a>
                <a class="help-mail color-dark-2 link-blue" href="mailto:<?php echo $exc_need_help_email; ?>">
                  <img src="<?php echo get_template_directory_uri(); ?>/assets/img/travcon/contact/email.svg" alt=""><?php echo $exc_need_help_email; ?></a>
              </div>
            </div>
          </div>
          <?php if( have_rows('exc_locations_info') ): ?>
            <div class="row padd-15 excursion-details">
              <?php while( have_rows('exc_locations_info') ): the_row();
                $exc_location_name = get_sub_field('exc_location_name');
                $exc_location_des = get_sub_field('exc_location_des');
                $exc_location_img_one = get_sub_field('exc_location_img_one');
                $exc_location_img_two = get_sub_field('exc_location_img_two');
                $exc_location_img_three = get_sub_field('exc_location_img_three');
              ?>
              <div class="col-md-12">
                <h3 class="color-blue-2"><?php echo $exc_location_name; ?></h3>
                <?php echo $exc_location_des; ?>
              </div>
              <div class="col-md-4">
                <img src="<?php echo $exc_location_img_one['url']; ?>" width="100%" height="auto" alt="<?php echo $exc_location_img_one['alt']; ?>">
              </div>
              <div class="col-md-4">
                <img src="<?php echo $exc_location_img_two['url']; ?>" width="100%" height="auto" alt="<?php echo $exc_location_img_two['alt']; ?>">
              </div>
              <div class="col-md-4">
                <img src="<?php echo $exc_location_img_three['url']; ?>" width="100%" height="auto" alt="<?php echo $exc_location_img_three['alt']; ?>">
              </div>
              <?php endwhile; ?>
            </div>
          <?php endif; ?>
          <div class="row include-exclude-section padd-15">
            <div class="include-exclude col-md-12">
              <h3><span class="include-icon">In</span>cludes</h3>
              <div class="include-list">
                <ul class="fa-ul">
                  <?php if( have_rows('exc_includes') ): ?>
                    <?php while( have_rows('exc_includes') ): the_row();
                      $exc_include = get_sub_field('exc_include');
                    ?>
                    <li>
                        <i class="fa-li fa fa-check"></i> <?php echo $exc_include; ?>
                    </li>
                    <?php endwhile; ?>
                  <?php endif; ?>
                </ul>
              </div>
            </div>
          </div>
				</div>
			</div>
			<div class="call-to-action">
				<div class="confirm-label bg-dr-blue-2">
					<div class="confirm-title color-white">
						<h2>Love this excursion?</h2>
						<a href="" data-toggle="modal" data-target="#formModal" class="animated infinite pulse confirm-print c-button b-40 bg-white hv-white-o"><img
							src="<?php echo get_template_directory_uri(); ?>/assets/img/travcon/book-now.svg" alt="" width="30" height="auto"> Inquire Now</a>
					</div>
				</div>
			</div>
		</div>

	<?php else:  ?>
		<p><?php _e( 'Sorry, No Excursion Packages matched your criteria.' ); ?></p>
	<?php endif; ?>

<?php get_footer(); ?>

<!-- Inquiry Form Modal -->
	<div class="modal fade" id="formModal" role="dialog">
		<div class="modal-dialog modal-lg">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal">&times;</button>
					<h4 class="modal-title">Inquiry Form</h4>
				</div>
				<div class="modal-body">
					<?php echo do_shortcode( '[contact-form-7 id="237" title="Booking form" html_class="form-horizontal"]' ); ?>
				</div>
			</div>
		</div>
	</div>
	<script src="https://www.google.com/recaptcha/api.js?render=6LdD44YUAAAAACAJXzeovgljspKNdyxB_It_yhLB"></script>

<?php
