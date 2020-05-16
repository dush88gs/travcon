<?php
/**
 * The template for displaying single posts of Holiday Packages
 *
 *
 * @package travcon
 */

get_header();

$args = array(
		'post_type' => 'tlc_holiday_packages',
		'orderby' => 'ASC',
	);
	$the_query = new WP_Query( $args );
	?>

	<?php if ( $the_query->have_posts() ) : ?>

	<?php
		$package_details = get_field('package_details');
		$discount = $package_details['package_discount'];
		$locations = $package_details['package_locations'];
		$locations_count = count($locations);
		$custom_duration = $package_details['custom_duration'];
		$nights = $package_details['package_duration'];
		$days = $nights + 1;
		$package_featured_image = $package_details['package_featured_image'];
    $package_max_people = $package_details['package_max_people'];
    $is_custom = get_field('is_custom_package');
		$i = 1;
	?>

		<div class="inner-banner style-6 background-block" style="background-image: url('<?php echo $package_featured_image; ?>');">
			<!-- <div class="vertical-align">
				<div class="container">
					<div class="row">
						<div class="col-xs-12 col-md-8 col-md-offset-2">
							<h2 class="color-white heading-text-shadow"><?php //the_title(); ?></h2>
						</div>
					</div>
				</div>
			</div> -->
		</div>

  <?php if (!$is_custom): ?>
		<div class="main-wraper">
			<div class="container-fluid">
				<div class="row tlc-single-package">
					<div class="col-md-12 col-sm-12 col-xs-12">
						<h3 class="color-blue-2 single-heading"><?php the_title(); ?></h3>
						<div class="simple-tab type-2 tab-wrapper">
							<div class="tab-nav-wrapper">
								<div class="nav-tab  clearfix">
									<div class="nav-tab-item active pull-left">
										Tour Itinerary
									</div>
									<div class="nav-tab-item">
										Tour Info
									</div>
									<div class="nav-tab-item pull-right">
										Photos
									</div>
								</div>
							</div>
							<div class="tabs-content tabs-wrap-style clearfix">
								<div class="tab-info active">
									<div class="acc-body">
										<section class="itinerary-section">
											<div class="row">
												<div class="col-md-12">
													<div class="itinerary-title">
														<!-- <h1 class="text-center">TOUR ITINERARY</h1> -->
														<p class="text-center">Highlights of Your Journey</p>
													</div>
												</div>
											</div>

											<div class="tube">
												<span class="start">START</span>
												<span class="end">END</span>
											</div>
											<div id="car"></div>

											<div class="itinerary-wrapper">
												<div class="line"></div>

												<?php if( have_rows('itinerary_details') ): ?>
												<?php while( have_rows('itinerary_details') ): the_row(); ?>
												<?php
													$itinerary_day = get_sub_field('itinerary_day');
													$itinerary_location = get_sub_field('itinerary_location');
													$itinerary_description = get_sub_field('itinerary_description');
													$itinerary_image = get_sub_field('itinerary_image');
													$itinerary_hotel = get_sub_field('itinerary_hotel');
													$itinerary_basis = get_sub_field('itinerary_basis');
												?>
												<div class="tlc-day equal-column-wrapper">
													<div class="tlc-itinerary-img-wrapper equal-column">
														<div class="tlc-itinerary-image" style="background-image: url('<?php echo $itinerary_image; ?>')">
														</div>
													</div>
													<div class="tlc-itinerary-info equal-column">
														<div class="tlc-itinerary-day"><?php echo $itinerary_day; ?></div>
														<h2><?php echo $itinerary_location; ?></h2>
														<?php echo $itinerary_description; ?>
														<ul class="tlc-feature-list">
															<li><i class="fa fa-building"></i>
																<h6>Hotel:</h6>
																<p><?php echo $itinerary_hotel; ?></p>
															</li>
															<li><i class="fa fa-cutlery"></i>
																<h6>Basis:</h6>
																<p><?php echo $itinerary_basis; ?></p>
															</li>
														</ul>
													</div>
												</div>
												<?php endwhile; ?>
											<?php endif; ?>
											</div>
										</section>
									</div>
                </div>
								<div class="tab-info">
									<div class="acc-body">
										<div class="row">
											<div class="col-md-6">
												<div class="detail-block bg-blue-2">
													<h4 class="color-white">Tour Details</h4>
													<div class="details-desc">
														<p class="color-blue-4">Package:
															<span class="color-white"><?php the_title(); ?></span>
														</p>
														<p class="color-blue-4">Duration:
															<span class="color-white"><?php echo $nights; ?> Nights / <?php echo $days; ?> Days</span>
														</p>
														<p class="color-blue-4">Discount:
															<span class="color-white"><?php echo $discount; ?></span>
														</p>
														<p class="color-blue-4">Locations:
															<?php if( have_rows('package_details') ): ?>
															<?php while( have_rows('package_details') ): the_row(); ?>
																<?php if( have_rows('package_locations') ): ?>
																	<?php while( have_rows('package_locations') ): the_row();
																			$package_location = get_sub_field('package_location');
																		?>
																	<span class="color-white"><?php echo $package_location; ?>
																		<?php if ($i < $locations_count) : ?>
																			<?php 
																				echo " - ";
																			?>
																		<?php endif; ?>
																	</span>
																	<?php $i++; endwhile; ?>
																<?php endif; ?>
															<?php endwhile; ?>
															<?php endif; ?>
														</p>
														<p class="color-blue-4">Max no. of people:
															<span class="color-white"><?php echo $package_max_people; ?></span>
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
														$need_help = get_field('need_help');
														$need_help_description = $need_help['need_help_description'];
														$need_help_phone = $need_help['need_help_phone'];
														$need_help_phone_trimmed = str_replace(' ', '', $need_help_phone);
														$need_help_email = $need_help['need_help_email'];
													?>
													<h4 class="color-dark-2">Need Help?</h4>
													<p>
														<?php echo $need_help_description; ?>
													</p>
													<a class="help-phone color-dark-2 link-blue" href="tel:<?php echo $need_help_phone_trimmed; ?>">
														<img src="<?php echo get_template_directory_uri(); ?>/assets/img/travcon/contact/phone.svg" alt=""><?php echo $need_help_phone; ?></a>
													<a class="help-mail color-dark-2 link-blue" href="mailto:<?php echo $need_help_email; ?>">
														<img src="<?php echo get_template_directory_uri(); ?>/assets/img/travcon/contact/email.svg" alt=""><?php echo $need_help_email; ?></a>
												</div>
											</div>
										</div>
										<div class="row tlc-tour-summary">
											<div class="col-md-12">
												<?php
													$tour_summary = get_field('tour_summary');
													$tour_summary_heading = $tour_summary['tour_summary_heading'];
													$tour_summary_description = $tour_summary['tour_summary_description'];
												?>
												<h3 class="color-blue-2"><?php echo $tour_summary_heading; ?></h3>
												<div class="tlc-summary-table table-responsive">
													<?php echo $tour_summary_description; ?>
												</div>
											</div>
										</div>
										<div class="row include-exclude-section tlc-tour-in-ex">
											<div class="include-exclude col-md-6">
												<h3><span class="include-icon">In</span>cludes</h3>
												<div class="include-list">
													<ul class="fa-ul">
														<?php if( have_rows('tour_summary') ): ?>
															<?php while( have_rows('tour_summary') ): the_row(); ?>
																<?php if( have_rows('tour_includes') ): ?>
																	<?php while( have_rows('tour_includes') ): the_row();
																		$tour_include = get_sub_field('tour_include');
																	?>
																	<li>
																			<i class="fa-li fa fa-check"></i> <?php echo $tour_include; ?>
																	</li>
																	<?php endwhile; ?>
																<?php endif; ?>
															<?php endwhile; ?>
														<?php endif; ?>
													</ul>
												</div>
											</div>
											<div class="include-exclude col-md-6">
												<h3><span class="exclude-icon">Ex</span>cludes</h3>
												<div class="exclude-list">
													<ul class="fa-ul">
														<?php if( have_rows('tour_summary') ): ?>
															<?php while( have_rows('tour_summary') ): the_row(); ?>
																<?php if( have_rows('tour_excludes') ): ?>
																	<?php while( have_rows('tour_excludes') ): the_row();
																		$tour_exclude = get_sub_field('tour_exclude');
																	?>
																	<li>
																		<i class="fa-li fa fa-times"></i> <?php echo $tour_exclude; ?>
																	</li>
																	<?php endwhile; ?>
																<?php endif; ?>
															<?php endwhile; ?>
														<?php endif; ?>
													</ul>
												</div>
											</div>
										</div>
									</div>
								</div>
								<div class="tab-info">
									<div class="acc-body">
										<div class="row popup-gallery">
											<!-- <div class="grid-sizer col-mob-12 col-xs-6 col-sm-4"></div> -->
											<?php if( have_rows('tour_images') ): ?>
												<?php while( have_rows('tour_images') ): the_row();
													$tour_image = get_sub_field('tour_image');
												?>
												<div class="item g-cat-1 gal-item style-3 col-mob-12 col-xs-6 col-sm-4">
													<a class="black-hover" href="<?php echo $tour_image['url']; ?>">
														<img class="img-full img-responsive" src="<?php echo $tour_image['url']; ?>" alt="<?php echo $tour_image['alt']; ?>">
														<div class="tour-layer delay-1"></div>
													</a>
												</div>
												<?php endwhile; ?>
											<?php endif; ?>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="call-to-action">
				<div class="confirm-label bg-dr-blue-2">
					<div class="confirm-title color-white">
						<h2>Love this tour?</h2>
						<a href="" data-toggle="modal" data-target="#formModal" class="animated infinite pulse confirm-print c-button b-40 bg-white hv-white-o"><img
							src="<?php echo get_template_directory_uri(); ?>/assets/img/travcon/book-now.svg" alt="" width="30" height="auto"> Inquire Now</a>
					</div>
				</div>
			</div>
		</div>
  <?php else: ?>
    <div class="main-wraper">
			<div class="container-fluid">
				<div class="row tlc-single-package tlc-custom-package">
					<div class="col-md-12 col-sm-12 col-xs-12">
						<h3 class="color-blue-2 single-heading"><?php the_title(); ?></h3>
            <div class="row">
              <div class="col-md-6">
                <div class="detail-block bg-blue-2">
                  <h4 class="color-white">Tour Details</h4>
                  <div class="details-desc">
                    <p class="color-blue-4">Package:
                      <span class="color-white"><?php the_title(); ?></span>
                    </p>
                    <p class="color-blue-4">Duration:
                      <span class="color-white"><?php echo $custom_duration; ?></span>
                    </p>
                    <p class="color-blue-4">Discount:
                      <span class="color-white"><?php echo $discount; ?></span>
                    </p>
                    <p class="color-blue-4">Locations:
                      <?php if( have_rows('package_details') ): ?>
                      <?php while( have_rows('package_details') ): the_row(); ?>
                        <?php if( have_rows('package_locations') ): ?>
                          <?php while( have_rows('package_locations') ): the_row();
                              $package_location = get_sub_field('package_location');
                            ?>
                          <span class="color-white"><?php echo $package_location; ?>
                            <?php if ($i < $locations_count) : ?>
                              <?php 
                                echo " - ";
                              ?>
                            <?php endif; ?>
                          </span>
                          <?php $i++; endwhile; ?>
                        <?php endif; ?>
                      <?php endwhile; ?>
                      <?php endif; ?>
                    </p>
                    <p class="color-blue-4">Max no. of people:
                      <span class="color-white"><?php echo $package_max_people; ?></span>
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
                    $need_help = get_field('need_help');
                    $need_help_description = $need_help['need_help_description'];
                    $need_help_phone = $need_help['need_help_phone'];
                    $need_help_phone_trimmed = str_replace(' ', '', $need_help_phone);
                    $need_help_email = $need_help['need_help_email'];
                  ?>
                  <h4 class="color-dark-2">Need Help?</h4>
                  <p>
                    <?php echo $need_help_description; ?>
                  </p>
                  <a class="help-phone color-dark-2 link-blue" href="tel:<?php echo $need_help_phone_trimmed; ?>">
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/img/travcon/contact/phone.svg" alt=""><?php echo $need_help_phone; ?></a>
                  <a class="help-mail color-dark-2 link-blue" href="mailto:<?php echo $need_help_email; ?>">
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/img/travcon/contact/email.svg" alt=""><?php echo $need_help_email; ?></a>
                </div>
              </div>
            </div>
            <div class="row tlc-tour-summary">
              <div class="col-md-12">
                <?php
                  $tour_summary = get_field('tour_summary');
                  $tour_summary_heading = $tour_summary['tour_summary_heading'];
                  $tour_summary_description = $tour_summary['tour_summary_description'];
                ?>
                <h3 class="color-blue-2"><?php echo $tour_summary_heading; ?></h3>
                <?php echo $tour_summary_description; ?>
              </div>
            </div>
            <div class="row include-exclude-section tlc-tour-in-ex">
              <div class="include-exclude col-md-6">
                <h3><span class="include-icon">In</span>cludes</h3>
                <div class="include-list">
                  <ul class="fa-ul">
                    <?php if( have_rows('tour_summary') ): ?>
                      <?php while( have_rows('tour_summary') ): the_row(); ?>
                        <?php if( have_rows('tour_includes') ): ?>
                          <?php while( have_rows('tour_includes') ): the_row();
                            $tour_include = get_sub_field('tour_include');
                          ?>
                          <li>
                              <i class="fa-li fa fa-check"></i> <?php echo $tour_include; ?>
                          </li>
                          <?php endwhile; ?>
                        <?php endif; ?>
                      <?php endwhile; ?>
                    <?php endif; ?>
                  </ul>
                </div>
              </div>
              <div class="include-exclude col-md-6">
                <h3><span class="exclude-icon">Ex</span>cludes</h3>
                <div class="exclude-list">
                  <ul class="fa-ul">
                    <?php if( have_rows('tour_summary') ): ?>
                      <?php while( have_rows('tour_summary') ): the_row(); ?>
                        <?php if( have_rows('tour_excludes') ): ?>
                          <?php while( have_rows('tour_excludes') ): the_row();
                            $tour_exclude = get_sub_field('tour_exclude');
                          ?>
                          <li>
                            <i class="fa-li fa fa-times"></i> <?php echo $tour_exclude; ?>
                          </li>
                          <?php endwhile; ?>
                        <?php endif; ?>
                      <?php endwhile; ?>
                    <?php endif; ?>
                  </ul>
                </div>
              </div>
            </div>
					</div>
				</div>
			</div>
			<div class="call-to-action">
				<div class="confirm-label bg-dr-blue-2">
					<div class="confirm-title color-white">
						<h2>Love this tour?</h2>
						<a href="" data-toggle="modal" data-target="#formModal" class="animated infinite pulse confirm-print c-button b-40 bg-white hv-white-o"><img
							src="<?php echo get_template_directory_uri(); ?>/assets/img/travcon/book-now.svg" alt="" width="30" height="auto"> Inquire Now</a>
					</div>
				</div>
			</div>
		</div>
  <?php endif; ?>

	<?php else: ?>
		<p><?php _e( 'Sorry, no Holiday Packages matched your criteria.' ); ?></p>
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
  <script>
  $(document).ready(function () {
  /* Start Tour itinerary car animation */
    // init controller CAR
    var controller = new ScrollMagic.Controller();
    var tube = $(".tube").height();
    // console.log(tube);
    var greyHgt = tube - 175;
    // create a scene
    var scene = new ScrollMagic.Scene({ triggerElement: "#car", duration: greyHgt })
      .setPin("#car") // pins the element for the the scene's duration
      .addTo(controller); // assign the scene to the controller
  });
  /* End Tour itinerary car animation */
  </script>

<?php
