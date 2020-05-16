<?php
/**
 * The template for displaying holiday packages archive page
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package travcon
 */

get_header();
?>

  <div class="inner-banner style-6 background-block" style="background-image: url('<?php echo get_template_directory_uri(); ?>/assets/img/travcon/search/search-package.jpg');">
		<img class="center-image" src="<?php echo get_template_directory_uri(); ?>/assets/img/travcon/search/search-package.jpg" alt="" style="display: none;">
		<!-- <div class="vertical-align">
			<div class="container-fluid">
				<div class="row">
					<div class="col-xs-12 col-md-8 col-md-offset-2">
						<h2 class="color-white heading-text-shadow">Search Packages</h2>
					</div>
				</div>
			</div>
		</div> -->
	</div>

  <div class="main-wraper">
		<div class="container-fluid">
      <div class="row">
        <div class="col-sm-12">
          <h3 class="color-blue-2">Search Packages</h3>
        </div>
      </div>
			<div class="holiday-packages tour-item-grid row">
      <?php if(have_posts()) : while(have_posts()) : the_post();  ?>
          <div class="col-md-4 col-sm-6 col-xs-12">
              <div class="tour-item style-4">
              <?php
                  $package_details = get_field('package_details');
                  $discount = $package_details['package_discount'];
                  $discount_color = $package_details['package_discount_colour'];
                  $nights = $package_details['package_duration'];
                  $days = $nights + 1;
                  $package_image = $package_details['package_grid_image'];
                  $custom_duration = $package_details['custom_duration'];
                  $is_custom = get_field('is_custom_package');
              ?>
                  <div class="radius-top">
                      <img src="<?php echo $package_image['url']; ?>" alt="<?php echo $package_image['alt']; ?>">
                      <div class="tour-weather red" style="background: <?php echo $discount_color; ?>">Save <?php echo $discount; ?></div>
                  </div>
                  <div class="tour-desc bg-white">
                      <a href="<?php echo get_post_permalink(); ?>" class="c-button bg-red-3 hv-red-3-o delay-2 b-40"><span>view more</span></a>
                      <h4><a class="tour-title color-dark-2 link-blue-2" href="<?php echo get_post_permalink(); ?>"><?php the_title(); ?></a></h4>
                      <?php if(!$is_custom): ?>
                        <div class="tour-price"><span class="color-red-3"><?php echo $nights; ?> Nights</span> / <span class="color-red-3"><?php echo $days; ?> Days</span></div>
                      <?php else: ?>
                        <div class="tour-price"><span class="color-red-3"><?php echo $custom_duration; ?></span></div>
                      <?php endif; ?>
                  </div>
              </div>
          </div>
      <?php endwhile; else : ?>
          <p>There are no Holiday Packages matches your search criteria!</p>
      <?php endif;
      wp_reset_postdata(); ?>
      </div>
    </div>
  </div>
	
<?php
//get_sidebar();
get_footer();
