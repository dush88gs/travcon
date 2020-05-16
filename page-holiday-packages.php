<?php
/*
Template Name: Holiday Packages
*/
?>

<?php get_header(); ?>

<?php
	$holiday_featured_image = get_field('holiday_featured_image');
?>

  <div class="inner-banner style-6 background-block" style="background-image: url('<?php echo $holiday_featured_image['url']; ?>');">
		<img class="center-image" src="<?php echo $holiday_featured_image['url']; ?>" alt="<?php echo $holiday_featured_image['alt']; ?>" style="display: none;">
		<!-- <div class="vertical-align">
			<div class="container">
				<div class="row">
					<div class="col-xs-12 col-md-8 col-md-offset-2">
						<h2 class="color-white heading-text-shadow">Holiday Packages</h2>
					</div>
				</div>
			</div>
		</div> -->
	</div>

	<?php
		$paged = ( get_query_var('paged') ) ? get_query_var('paged') : 1;
		$args = array(
			'post_type' => 'tlc_holiday_packages',
			'post_status' => 'publish',
			'orderby'=> 'title',
			'order' => 'ASC',
			'posts_per_page' => 9,
			'paged' => $paged
		);

		$the_query = new WP_Query( $args );
	?>

	<div class="main-wraper">
		<div class="container-fluid">
			<div class="row tlc-holiday-packages">
				<div class="col-sm-12">
					<h3 class="color-blue-2">Choose your dream holidays</h3>
				</div>
			</div>
			<div class="holiday-packages tour-item-grid row">
			<?php if ( $the_query->have_posts() ) : while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
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
							<a href="<?php echo get_post_permalink(); ?>" class="c-button bg-red-3 hv-red-3-o delay-2 b-40"><span>Write to us</span></a>
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
						<p>There are no Holiday Packages exist</p>
				<?php endif;
				wp_reset_postdata(); ?>	
			</div>
			<?php if (function_exists(custom_pagination)): ?>
				<?php if ($the_query->max_num_pages > 1): ?>
					<div class="c_pagination clearfix">
							<?php
								custom_pagination($the_query->max_num_pages,"",$paged);
							?>
					</div>
				<?php endif; ?>
			<?php endif; ?>
		</div>
	</div>

<?php get_footer(); ?>